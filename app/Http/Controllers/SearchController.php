<?php

namespace App\Http\Controllers;

use App\Category;
use App\CatProduct;
use App\Filter;
use App\Http\Requests\ReviewRequest;
use App\Product;
use App\Search;
use App\Slider;
use Illuminate\Http\Request;
use View;
use App\lib\Mobile_Detect;
use DB;
class SearchController extends Controller
{
    protected  $view;
    public function __construct()
    {
        $cat=Category::where('parent_id',0)->get();
        View::share('category',$cat);
        $detect = new Mobile_Detect();
        if($detect->isMobile() || $detect->isTablet())
        {
            $this->view='mobile.';
        }
        else
        {
            $this->view='';
        }
    }
    public function search(Request $request,$cat1,$cat2,$cat3)
    {
        $category1=Category::where(['cat_ename'=>$cat1])->firstOrFail();
        $category2=Category::where(['cat_ename'=>$cat2,'parent_id'=>$category1->id])->firstOrFail();
        $category3=Category::where(['cat_ename'=>$cat3,'parent_id'=>$category2->id])->firstOrFail();
        $get=$request->all();
        if(sizeof($get)>0)
        {
            $price=CatProduct::get_search_price($category3->id);
            $cat_url=$cat1.'/'.$cat2.'/'.$cat3;
            $filter=Filter::get_search_filter($category1->id,$category2->id,$category3->id);
            $Search=new Search($get);
            $data=$Search->get_product();
            return View('site.search',[
                'filter'=>$filter,
                'product'=>$data['product'],
                'filter_id'=>$data['filter_id'],
                'cat_url'=>$cat_url,
                'category1'=>$category1,
                'category2'=>$category2,
                'category3'=>$category3,
                'total_product'=>$data['total_product'],
                'price'=>$price
            ]);

        }
    }
    public function ajax_search(Request $request)
    {
        if($request->ajax())
        {
            $type=$request->get('type',1);
            $search_text=$request->get('search_text');
            $filter_product=$request->get('filter_product');
            $cat_id=$request->get('cat_id',0);
            $first_price=$request->get('first_price');
            $last_price=$request->get('last_price');

            $cat_url=$request->get('cat_url');
            $product_status=$request->get('product_status',1);
            $array=array();
            $filter_ename=array();
            $e=explode(',',$filter_product);
            foreach ($e as $key=>$value)
            {
                $e2=explode('_',$value);
                if(sizeof($e2)==2)
                {
                    if(array_key_exists($e2[0],$filter_ename))
                    {
                        $k=$filter_ename[$e2[0]];
                        $s=sizeof($array[$k]);
                        $array[$k][$s]=$e2[1];
                    }
                    else
                    {
                        $array[$e2[0]][0]=$e2[1];
                        $filter_ename[$e2[0]]=$e2[0];

                    }
                }
            }
            $search=new Search($array,$product_status,$type,$search_text,$first_price,$last_price,$cat_id);
            $data=$search->get_product();
            $view_name=$this->view.'/include/product_list';

            return view($view_name,['product'=>$data['product'],'cat_url'=>$cat_url,'total_product'=>$data['total_product']]);
        }

    }
    public function show_cat1($cat1,$cat2)
    {
        $category1=Category::where(['cat_ename'=>$cat1])->firstOrFail();
        $category2=Category::where(['cat_ename'=>$cat2,'parent_id'=>$category1->id])->firstOrFail();
        if($this->view=='')
        {
            $cat_list=Category::where('parent_id',$category2->id)->get();
            $price=CatProduct::get_search_price($category2->id);
            $data=Search::get_product_cat($category2->id);
            $cat_url='category/'.$category1->cat_ename.'/'.$category2->cat_ename;

            return View('site.product_cat2',['data'=>$data,'category1'=>$category1,'price'=>$price,'cat_url'=>$cat_url,'cat_list'=>$cat_list,'category2'=>$category2]);
        }
        else
        {
            $slider=Slider::orderBy('id','DESC')->limit(5)->get();
            $view_name=$this->view.'/search/show_cat';
            $cat_list=Category::get_show_child_cat($category2->id);

            $product_id=array();
            $get_product_id=DB::table('cat_product')->where('cat_id',$category2->id)->get();
            foreach ($get_product_id as $key=>$value)
            {
                $product_id[$value->product_id]=$value->product_id;
            }



            $view_product=Product::with('get_img')->whereIn('id',$product_id)->where('product_status',1)->orderBy('view','DESC')->limit(15)->get();
            $order_product=Product::with('get_img')->whereIn('id',$product_id)->where('product_status',1)->orderBy('order_product','DESC')->limit(15)->get();
            $product=Product::with('get_img')->whereIn('id',$product_id)->where('product_status',1)->orderBy('id','DESC')->limit(15)->get();
            return View($view_name,['slider'=>$slider,'category2'=>$category2,'cat_list'=>$cat_list,
                'category1'=>$category1,'view_product'=>$view_product,'order_product'=>$order_product,'product'=>$product]);
        }

    }
    public function show_cat_product($cat1,$cat2,$cat3)
    {
        $category1=Category::where(['cat_ename'=>$cat1])->firstOrFail();
        $category2=Category::where(['cat_ename'=>$cat2,'parent_id'=>$category1->id])->firstOrFail();
        $category3=Category::where(['cat_ename'=>$cat3,'parent_id'=>$category2->id])->firstOrFail();
        if($this->view=='')
        {
            $cat_list=Category::where('parent_id',$category3->id)->get();
            $price=CatProduct::get_search_price($category3->id);
            $data=Search::get_product_cat($category3->id);
            $cat_url='category/'.$category1->cat_ename.'/'.$category2->cat_ename.'/'.$category3->cat_ename;
            return View('site.product_cat3',['data'=>$data,'category1'=>$category1,'price'=>$price,'cat_url'=>$cat_url,'cat_list'=>$cat_list,'category2'=>$category2,'category3'=>$category3]);

        }
        else
        {
            $view_name=$this->view.'/search/product';
            $products=Product::get_product_cat($category3->id);
            $filter=Filter::get_search_filter($category1->id,$category2->id,$category3->id);
            $price=CatProduct::get_search_price($category3->id);

            return View($view_name,['products'=>$products,'filter'=>$filter,'category3'=>$category3,'price'=>$price]);

        }

    }
    public function cat1($cat)
    {
        $category=Category::where('cat_ename',$cat)->firstOrFail();
        $cat_list=Category::where('parent_id',$category->id)->get();
        $price=CatProduct::get_search_price($category->id);
        $data=Search::get_product_cat($category->id);
        $cat_url='category/'.$cat;
        return View('site.product_cat1',['data'=>$data,'category1'=>$category,'price'=>$price,'cat_url'=>$cat_url,'cat_list'=>$cat_list]);
    }
    public function show_cat4($cat1,$cat2,$cat3,$cat4)
    {
        $category1=Category::where(['cat_ename'=>$cat1])->firstOrFail();
        $category2=Category::where(['cat_ename'=>$cat2,'parent_id'=>$category1->id])->firstOrFail();
        $category3=Category::where(['cat_ename'=>$cat3,'parent_id'=>$category2->id])->firstOrFail();
        $category4=Category::where(['cat_ename'=>$cat4,'parent_id'=>$category3->id])->firstOrFail();

        $cat_list=Category::where('parent_id',$category4->id)->get();
        $price=CatProduct::get_search_price($category4->id);
        $data=Search::get_product_cat($category4->id);
        $cat_url='category/'.$category1->cat_ename.'/'.$category2->cat_ename.'/'.$category3->cat_ename.'/'.$category4->cat_ename;
        return View('site.product_cat4',['data'=>$data,'category1'=>$category1,'price'=>$price,'cat_url'=>$cat_url,'cat_list'=>$cat_list,'category2'=>$category2,'category3'=>$category3,'category4'=>$category4]);

    }
}

<?php

namespace App;
use DB;
class Search
{
    protected  $data;
    protected  $product_status;
    protected  $type=1;
    protected  $search_text=null;
    protected  $first_price=0;
    protected  $last_price=0;
    protected  $cat_id=0;
    public $android=0;
    public function __construct($data,$product_status=null,$type=null,$search_text=null,$first_price=null,$last_price=null,$cat_id=0)
    {
        $this->data=$data;
        $this->product_status=$product_status;
        if($type!=null)
        {
            $this->type=$type;
        }
        if(!empty($search_text))
        {
            $this->search_text=$search_text;
        }
        if(!empty($first_price))
        {
            $this->first_price=$first_price;
        }
        if(!empty($last_price))
        {
            $this->last_price=$last_price;
        }
        $this->cat_id=$cat_id;
    }

    public function get_product()
    {
        if(is_array($this->data))
        {
            $array=array();
            $product_filter=array();
            $i=0;
            foreach ($this->data as $key=>$value)
            {
                $filter=$this->check_filter_name($key);
                if($filter)
                {
                    $j=0;
                    foreach ($value as $key2=>$value2)
                    {
                       $get_filter=DB::table('filter')->where(['id'=>$value2])->first();
                       if($get_filter)
                       {
                           $parent_id=$get_filter->parent_id;
                           $filter_name=$get_filter->name;
                       }
                       else
                       {
                           $filter_name='';
                           $parent_id='';
                       }
                       $product_filter[$value2]['name']=$filter_name;
                        $product_filter[$value2]['parent_id']=$parent_id;

                       $row=DB::table('filter_product')->where(['value'=>$value2])->get();
                       foreach ($row as $key3=>$value3)
                       {
                           $array[$i][$j]=$value3->product;
                           $j++;
                       }


                    }
                    $i++;
                }
            }
        }
        $product=$this->product($array,$product_filter);
        return $product;
    }
    public function check_filter_name($enme)
    {
        $row=Filter::where(['ename'=>$enme])->first();
        if($row)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }
    public function product($array,$product_filter)
    {
        $t=array();
        $t[1]=array('id','DESC');
        $t[2]=array('view','DESC');
        $t[3]=array('order_product','DESC');
        $t[4]=array('price','ASC');
        $t[5]=array('price','DESC');

        $product_id=array();
        if(sizeof($array)>1)
        {

            $product_id=call_user_func_array('array_intersect',$array);
        }
        else
        {
            if(sizeof($array)==1)
            {
                 $product_id=$array[0];
            }

        }

        if(sizeof($product_id)>0)
        {
            $product=Product::with($this->load())
                ->select(['title','code','id','price','title_url','code_url','discounts','product_status','show_product'])
                ->whereIn('id',$product_id)
                ->where(['show_product'=>1]);
        }
        else
        {
            $product_id=DB::table('cat_product')->where('cat_id',$this->cat_id)->pluck('product_id','id')->toArray();
            $product=Product::with($this->load())
                ->select(['title','code','id','price','title_url','code_url','discounts','product_status','show_product'])
                ->whereIn('id',$product_id)
                ->where(['show_product'=>1]);
        }

        if($this->product_status==1)
        {
            $product=$product->where(['product_status'=>$this->product_status]);
        }

        if(!empty($this->search_text))
        {
            $product=$product->where('title','like','%'.$this->search_text.'%');
        }

        if(!empty($this->first_price) && !empty($this->last_price))
        {
           $product=$product->where('price','>=',$this->first_price)
              ->where('price','<=',$this->last_price);
        }

        $total_product=$product->count();

        if(array_key_exists($this->type,$t))
        {
            $product=$product->orderBy($t[$this->type][0],$t[$this->type][1])
                ->paginate(20);
        }
        else
        {
            $product=$product->orderBy('id','DESC')
                ->paginate(20);
        }




        $array2['product']=$product;
        $array2['filter_id']=$product_filter;
        $array2['total_product']=$total_product;
        return $array2;
    }


    public static function get_product_cat($cat_id)
    {
        $array=array();
        $product_id=DB::table('cat_product')->where('cat_id',$cat_id)->pluck('product_id','id')->toArray();

        $product=Product::with(['get_img','get_colors','get_score'])
            ->whereIn('id',$product_id)
            ->where(['show_product'=>1])
            ->orderBy('id','DESC')
            ->paginate(20);
        $array['product']=$product;
        $total_product=$product=Product::whereIn('id',$product_id)
            ->where(['show_product'=>1])->count();
        $array['total_product']=$total_product;
        return $array;
    }
    public function load()
    {
        $array1=['get_img','get_colors','get_score'];
        $array2=['get_img'];
        if($this->android)
        {
            return $array2;
        }
        return $array1;
    }
}

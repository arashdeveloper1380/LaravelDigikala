<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Item;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ItemController extends Controller
{
    public function index(Request $request)
    {
        $cat_list=Product::get_cat_list();
        $id=$request->get('id');
        $item=Item::with('get_child')->where(['cat_id'=>$id,'parent_id'=>0])->orderBy('id','ASC')->get();
        return View('item.create',['id'=>$id,'cat_list'=>$cat_list,'item'=>$item]);
    }
    public function create(Request $request)
    {
        $cat_id=$request->get('id');
        $cat=Category::findOrFail($cat_id);
        $item_name=$request->get('item_name');
        $child_item=$request->get('child_item');
        $child_filed=$request->get('child_filed');
        if(is_array($item_name))
        {
            foreach ($item_name as $key=>$value)
            {
                if($key<0)
                {
                    if(!empty($value))
                    {
                        $id=DB::table('item')->insertGetId(['name'=>$value,'cat_id'=>$cat_id,'filed'=>0,'parent_id'=>0]);

                        if(is_array($child_item))
                        {
                            if(array_key_exists($key,$child_item))
                            {
                                foreach ($child_item[$key] as $key2=>$value2)
                                {
                                    if(!empty($value2))
                                    {
                                       $filed=1;
                                       if(array_key_exists($key,$child_filed))
                                       {
                                           if(array_key_exists($key2,$child_filed[$key]))
                                           {
                                               $filed=$child_filed[$key][$key2];
                                           }
                                       }
                                        DB::table('item')->insert(['name'=>$value2,'cat_id'=>$cat_id,'filed'=>$filed,'parent_id'=>$id]);

                                    }
                                }
                            }
                        }
                    }
                }
                else
                {
                    if(!empty($value))
                    {
                        DB::table('item')->where('id',$key)->update(['name'=>$value]);
                        if(is_array($child_item))
                        {
                            if(array_key_exists($key,$child_item))
                            {
                                foreach ($child_item[$key] as $key2=>$value2)
                                {
                                    $filed=1;
                                    if(array_key_exists($key,$child_filed))
                                    {
                                        if(array_key_exists($key2,$child_filed[$key]))
                                        {
                                            $filed=$child_filed[$key][$key2];
                                        }
                                    }

                                    if($key2<0)
                                    {
                                        DB::table('item')->insert(['name'=>$value2,'cat_id'=>$cat_id,'filed'=>$filed,'parent_id'=>$key]);

                                    }
                                    else
                                    {
                                        if(!empty($value2))
                                        {
                                            DB::table('item')->where('id',$key2)->update(['name'=>$value2,'filed'=>$filed]);

                                        }
                                        else
                                        {
                                            DB::table('item')->where('id',$key2)->delete();
                                        }
                                    }
                                }
                            }
                        }
                    }
                    else
                    {
                        DB::table('item')->where('id',$key)->delete();
                        DB::table('item')->where('parent_id',$key)->delete();
                    }
                }
            }
        }

        return redirect()->back();
    }
}

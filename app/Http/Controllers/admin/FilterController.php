<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Filter;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class FilterController extends Controller
{
    public function index(Request $request)
    {
        $cat_list=Product::get_cat_list();
        $id=$request->get('id');
        $filter=Filter::with('get_child')->where(['cat_id'=>$id,'parent_id'=>0])->get();
        return View('filter.create',['cat_list'=>$cat_list,'id'=>$id,'filter'=>$filter]);

    }
    public function create(Request $request)
    {
       $cat_id=$request->get('id');
       $cat=Category::findOrFail($cat_id);
       $filter_name=$request->get('filter_name');
       $filter_ename=$request->get('filter_ename');
       $filter_filed=$request->get('filter_filed');
       $filter_child=$request->get('filter_child',array());
       $filter_color=$request->get('filter_color',array());
       if(is_array($filter_name))
       {
           foreach ($filter_name as $key=>$value)
           {
               $ename=array_key_exists($key,$filter_ename) ? $filter_ename[$key] : '';
               $filed=array_key_exists($key,$filter_filed) ? $filter_filed[$key] : 1;
               if($key<0)
               {
                   if(!empty($value) && !empty($ename))
                   {
                       $id=DB::table('filter')->insertGetId(['cat_id'=>$cat_id,'name'=>$value,'ename'=>$ename,'filed'=>$filed,'parent_id'=>0]);
                       if(is_array($filter_child))
                       {
                           if(array_key_exists($key,$filter_child))
                           {
                               foreach ($filter_child[$key] as $key2=>$value2)
                               {
                                   if(!empty($value2))
                                   {
                                       $name=$value2;
                                       if(array_key_exists($key,$filter_color))
                                       {
                                           if(array_key_exists($key2,$filter_color[$key]))
                                           {
                                               $name=$value2.'@'.$filter_color[$key][$key2];
                                           }
                                       }
                                       DB::table('filter')->insert(['cat_id'=>$cat_id,'name'=>$name,'filed'=>$filed,'parent_id'=>$id]);
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
                       DB::table('filter')->where('id',$key)->update(['name'=>$value,'ename'=>$ename,'filed'=>$filed]);
                       if(is_array($filter_child))
                       {
                           if(array_key_exists($key,$filter_child))
                           {
                               foreach ($filter_child[$key] as $key2=>$value2)
                               {
                                   if($key2<0)
                                   {
                                       if(!empty($value2))
                                       {
                                           $name=$value2;
                                           if(array_key_exists($key,$filter_color))
                                           {
                                               if(array_key_exists($key2,$filter_color[$key]))
                                               {
                                                   $name=$value2.'@'.$filter_color[$key][$key2];
                                               }
                                           }
                                           DB::table('filter')->insert(['cat_id'=>$cat_id,'name'=>$name,'filed'=>$filed,'parent_id'=>$key]);
                                       }
                                   }
                                   else
                                   {
                                       if(!empty($value2))
                                       {
                                           $name=$value2;
                                           if(array_key_exists($key,$filter_color))
                                           {
                                               if(array_key_exists($key2,$filter_color[$key]))
                                               {
                                                   $name=$value2.'@'.$filter_color[$key][$key2];
                                               }
                                           }

                                           DB::table('filter')->where('id',$key2)->update(['name'=>$name,'filed'=>$filed]);
                                       }
                                       else
                                       {
                                           DB::table('filter')->where('id',$key2)->delete();
                                       }
                                   }
                               }
                           }
                       }
                   }
                   else
                   {
                       DB::table('filter')->where('id',$key)->delete();
                       DB::table('filter')->where('parent_id',$key)->delete();
                   }
               }
           }
       }

       return redirect()->back();
    }
}

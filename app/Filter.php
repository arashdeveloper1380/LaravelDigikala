<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Filter extends Model
{
    protected $table='filter';
    protected $fillable=['parent_id','cat_id','name','ename','filed'];
    public $timestamps=false;
    public function get_child()
    {
        return $this->hasMany(Filter::class,'parent_id','id')->orderBy('id','ASC');
    }
    public static function get_product_filter($id)
    {
        $filters=array();
        $cats=DB::table('cat_product')->where(['product_id'=>$id])->get();
        foreach ($cats as $cat)
        {
            if(sizeof($filters)==0)
            {
                $filter=Filter::with('get_child')->where(['cat_id'=>$cat->cat_id,'parent_id'=>0])->get();
                if(sizeof($filter)>0)
                {
                    $filters=$filter;
                }
            }
        }
        return $filters;
    }
    public static function get_value($product_id)
    {
        $array=array();
        $filter_value=DB::table('filter_product')->where('product',$product_id)->get();
        foreach ($filter_value as $key=>$value)
        {
            $array_key=$value->filter_id.'_'.$value->value;
            $array[$array_key]=$value->value;
        }
        return  $array;
    }
    public static function get_search_filter($cat1_id,$cat2_id,$cat3_id)
    {
        $array=array();
        $filter=Filter::with('get_child')->where(['cat_id'=>$cat1_id,'parent_id'=>0])->get();
        if(sizeof($filter)>0)
        {
            $array=$filter;
        }
        else
        {
            $filter=Filter::with('get_child')->where(['cat_id'=>$cat2_id,'parent_id'=>0])->get();
            if(sizeof($filter)>0)
            {
                $array=$filter;
            }
            else
            {
                $filter=Filter::with('get_child')->where(['cat_id'=>$cat3_id,'parent_id'=>0])->get();
                if(sizeof($filter)>0)
                {
                    $array=$filter;
                }
            }
        }
        return $array;
    }


}

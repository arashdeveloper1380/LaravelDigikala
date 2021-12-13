<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Item extends Model
{
    protected $table='item';
    protected $fillable=['parent_id','cat_id','name','filed'];
    public $timestamps=false;
    public function get_child()
    {
        return $this->hasMany(Item::class,'parent_id','id')->orderBy('id','ASC');
    }
    public static function get_product_item($id)
    {
        $items=array();
        $cats=DB::table('cat_product')->where(['product_id'=>$id])->get();
        foreach ($cats as $cat)
        {
            if(sizeof($items)==0)
            {
                $item=Item::with('get_child_item')->where(['cat_id'=>$cat->cat_id,'parent_id'=>0])->get();
                if(sizeof($item)>0)
                {
                    $items=$item;
                }
            }
        }
        return $items;
    }
    public function get_child_item()
    {
        return $this->hasMany(Item::class,'parent_id','id')->orderBy('id','ASC');
    }


    public static function check_item_product($data)
    {
        $array=array();
        foreach ($data as $key=>$value)
        {
            $product = Product::with('get_cats')->where(['id' => $value, 'show_product' => 1])->first();
            if ($product)
            {
                $id=self::get_first_item($product->get_cats);
                $array[$product->id]=$id;
            }
        }
        return $array;
    }
    public static function get_first_item($cats_id)
    {
        $item_id=0;
        foreach ($cats_id as $cat)
        {
            if($item_id==0)
            {
                $item=Item::where(['cat_id'=>$cat->cat_id,'parent_id'=>0])->first();
                if($item)
                {
                    $item_id=$item->id;
                }
            }
        }
        return $item_id;
    }
}

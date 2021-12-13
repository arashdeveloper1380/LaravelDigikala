<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Product extends Model
{
    protected $table='product';
    protected $fillable=['title','code','title_url','code_url','price',
        'discounts','view','text','product_status','bon','show_product','product_number',
        'order_product','keywords','description','special'];
    public static function get_cat_list()
    {
        $cat_list=array();
        $cat=Category::where('parent_id',0)->get();
        foreach ($cat as $key=>$value)
        {
            $cat_list[$value->id]=$value->cat_name;
            foreach ($value->getChild as $key2=>$value2)
            {
                $cat_list[$value2->id]=' - '.$value2->cat_name;
                foreach ($value2->getChild as $key3=>$value3)
                {
                    $cat_list[$value3->id]=' - - '.$value3->cat_name;
                    foreach ($value3->getChild as $key4=>$value4)
                    {
                        $cat_list[$value4->id]=' - - - '.$value4->cat_name;
                    }
                }
            }
        }
        return $cat_list;
    }
    public static function get_cat($id)
    {
        $cat_list=DB::table('cat_product')->where('product_id',$id)->pluck('cat_id','id')->toArray();
        return $cat_list;
    }
    public function get_colors()
    {
        return $this->hasMany(Color::class,'product_id','id');
    }
    public static function search($data)
    {
        $product=Product::orderBy('id','DESc');
        $string='';

        $product=$product->with('get_img');
        $product=$product->paginate(10);
        $product->withPath($string);
        return $product;
    }
    public function get_img()
    {
        return $this->hasOne(ProductImage::class,'product_id','id')->orderBy('id','ASC')->withDefault(['url'=>'-']);
    }
    public function get_images()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function get_service_name()
    {
        return $this->hasMany(Service::class,'product_id','id')->where('parent_id',0);
    }
    public static function get_product_cat($cat_id)
    {
        $product_id=DB::table('cat_product')->where('cat_id',$cat_id)->pluck('product_id','id')->toArray();
        $product=Product::with('get_img')->whereIn('id',$product_id)->where('show_product',1)->paginate(10);
        return $product;
    }
    public function get_cats()
    {
        return $this->hasMany(CatProduct::class,'product_id','id')->orderBy('cat_id','ASC');
    }
    public function get_score()
    {
        return $this->hasMany(ProductScore::class,'product_id','id');
    }
}

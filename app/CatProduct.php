<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatProduct extends Model
{
    protected $table='cat_product';
    protected $fillable=['product_id','cat_id'];
    public $timestamps=false;
    public function get_min_price()
    {
        return $this->hasMany(Product::class,'id','product_id')->select('price','id')->orderBy('price','ASC')->limit(1);
    }
    public function get_max_price()
    {
        return $this->hasMany(Product::class,'id','product_id')->select('price','id')->orderBy('price','DESC')->limit(1);
    }
    public static function get_search_price($cat_id)
    {
        $array=array();
        $array['price1']=0;
        $array['price2']=0;
        $rows=CatProduct::with(['get_min_price','get_max_price'])->where('cat_id',$cat_id)->get();
        foreach ($rows as $key=>$value)
        {
            if(sizeof($value->get_min_price)==1)
            {
                $array['price1']=$value->get_min_price[0]->price;
            }
            if(sizeof($value->get_max_price)==1)
            {
                $array['price2']=$value->get_max_price[0]->price;
            }
        }

        return $array;

    }
}

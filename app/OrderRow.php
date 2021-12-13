<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderRow extends Model
{
    protected $table='order_row';
    protected $fillable=['order_id','product_id','color_id','service_id','number'];
    public $timestamps=false;
    public function get_product()
    {
        return $this->hasOne(Product::class,'id','product_id')->withDefault(['title'=>'','code'=>'','title_url'=>'','code_url'=>'','price'=>0,'discounts'=>0]);
    }
    public function get_product_img()
    {
        return $this->hasOne(ProductImage::class,'product_id','product_id')->withDefault([
            'url'=>'-'
        ]);
    }
    public function get_color()
    {
        return $this->hasOne(Color::class,'id','color_id');
    }
    public function get_service()
    {
        return $this->hasOne(Service::class,'id','service_id');
    }
}

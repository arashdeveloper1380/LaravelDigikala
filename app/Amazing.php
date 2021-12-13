<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amazing extends Model
{
    protected $table='amazing';
    protected $fillable=['m_title','title','tozihat','price1','price2','product_id','time','timestamp'];
    public $timestamps=false;
    public function get_img()
    {
        return $this->hasOne(ProductImage::class,'product_id','product_id')->withDefault(['url'=>'-']);
    }
    public function get_product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
}

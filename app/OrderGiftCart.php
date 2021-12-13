<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderGiftCart extends Model
{
    protected $table='order_gift_cart';
    public $timestamps=false;
    protected $fillable=['order_id','cart_id','price'];
    public function getGiftCart()
    {
        return $this->hasOne(
          GiftCart::class,
          'id',
            'cart_id'
        )->withDefault(['code'=>'']);
    }
}

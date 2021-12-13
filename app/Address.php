<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table='user_address';
    protected $fillable=['user_id','name','ostan_id','shahr_id','tell','tell_code','mobile','zip_code','address'];
    public $timestamps=false;
    public function get_shahr()
    {
        return $this->hasOne(Shahr::class,'id','shahr_id')->withDefault(['shahr_name'=>'']);
    }
    public function get_ostan()
    {
        return $this->hasOne(Ostan::class,'id','ostan_id')->withDefault(['ostan_name'=>'']);
    }
}

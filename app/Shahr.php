<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shahr extends Model
{
    protected $table='shahr';
    protected $fillable=['shahr_name','parent_id'];
    public $timestamps=false;
    public function get_ostan_name()
    {
        return $this->hasOne(Ostan::class,'id','parent_id')->withDefault(['ostan_name'=>'حذف شده']);
    }
}

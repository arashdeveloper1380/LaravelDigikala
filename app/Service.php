<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table='service';
    protected $fillable=['service_name','product_id','parent_id','time','date','color_id','price'];
    public $timestamps=false;
}

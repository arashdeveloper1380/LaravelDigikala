<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table='file';
    protected $fillable=['product_id','url','type'];
    public $timestamps=false;
}

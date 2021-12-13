<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReView extends Model
{
    protected $table='review';
    protected $fillable=['product_id','review_tozihat'];
    public $timestamps=false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ostan extends Model
{
    protected $table='ostan';
    protected $fillable=['ostan_name'];
    public $timestamps=false;
}

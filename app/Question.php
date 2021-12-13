<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table='question';
    protected $fillable=['time','product_id','user_id','question','parent_id','status'];
    public $timestamps=false;
    public function get_user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function get_parent()
    {
        return $this->hasMany(Question::class,'parent_id','id')->where('status',1);
    }
    public function get_product()
    {
        return $this->hasOne(Product::class,'id','product_id')->withDefault(['title'=>'حذف شده','id'=>0]);
    }


}

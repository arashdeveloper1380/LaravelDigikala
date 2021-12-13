<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductScore extends Model
{
    protected $table='product_score';
    protected $fillable=['product_id','value','user_id','time'];
    public $timestamps=false;
    public function get_user()
    {
        return $this->hasOne(User::class,'id','user_id')->withDefault(['name'=>'']);
    }
    public function get_comment()
    {
        return $this->hasOne(Comment::class,'user_id','user_id');
    }
    public static function get_score($product_id)
    {
        $data=array();
        $array=array();
        $array[1]=0;
        $array[2]=0;
        $array[3]=0;
        $array[4]=0;
        $array[5]=0;
        $array[6]=0;
        $scores=ProductScore::where('product_id',$product_id)->get();
        foreach ($scores as $score)
        {
            $score_value=explode('@#',$score->value);
            foreach ($score_value as $key=>$value)
            {
                if(!empty($value))
                {
                    $e=explode('_',$value);
                    if(sizeof($e)==2)
                    {
                       if(array_key_exists($e[0],$array))
                       {
                           $array[$e[0]]=$array[$e[0]]+$e[1];
                       }
                    }
                }
            }
        }
        $n=sizeof($scores);
        foreach ($array as $key=>$value)
        {
            if($n>0)
            {
                $v=$value/$n;
                $array[$key]=$v;
            }

        }

        $data['score']=$array;
        $data['total']=$n;

        return $data;
    }
    public function get_product()
    {
        return $this->hasOne(Product::class,'id','product_id')->withDefault(['title'=>'حذف شده']);
    }
}

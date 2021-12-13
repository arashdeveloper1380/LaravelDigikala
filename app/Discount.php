<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class Discount extends Model
{
    protected $table='discounts';
    protected $fillable=['code','value','time','price','code_time'];
    public $timestamps=false;
    public static function check_discount($data,$price)
    {

        if(self::check_time($data))
        {
            $v=self::check_price($data,$price);
            if($v)
            {
                 return $v;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }

    }
    public static function check_time($data)
    {
        if($data[0]->time>0)
        {
            if($data[0]->time>time())
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return true;
        }
    }
    public static function check_price($data,$price)
    {
        $price_list=[];
        $price_list[0]='0';
        $price_list[1]=200000;
        $price_list[2]=500000;
        $price_list[3]=1000000;
        $price_list[4]=2000000;
        $price_list[5]=3000000;
        $price_list[6]=4000000;
        $price_list[7]=5000000;
        $s=0;
        foreach ($data as $key=>$value)
        {
            if($value->price==0)
            {
                if($s!=0)
                {
                    $s=$value->value;
                }
            }
            if($price>$price_list[$value->price])
            {
                $s=$value->value;
            }
        }
        return $s;
    }

}

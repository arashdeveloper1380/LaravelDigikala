<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 6/27/18
 * Time: 6:36 PM
 */

namespace App;

class IndexSearch
{
    public static function get_product($text,$type,$product_status)
    {
        $t=array();
        $t[1]=array('id','DESC');
        $t[2]=array('view','DESC');
        $t[3]=array('order_product','DESC');
        $t[4]=array('price','ASC');
        $t[5]=array('price','DESC');

        $Product=Product::with(['get_img','get_colors','get_score'])
            ->where(['show_product'=>1])
            ->where('title','like','%'.$text.'%');
        if($product_status==1)
        {
            $Product=$Product->where(['product_status'=>$product_status]);
        }

        $Product=$Product->orWhere('code','like','%'.$text.'%')->where(['show_product'=>1]);
        if($product_status==1)
        {
              $Product=$Product->where(['product_status'=>$product_status]);
        }

        if(array_key_exists($type,$t))
        {
            $Product=$Product->orderBy($t[$type][0],$t[$type][1])
                ->paginate(20);
        }
        else
        {
            $Product=$Product->orderBy('id','DESC')
                ->paginate(20);
        }
        return $Product;
    }
}
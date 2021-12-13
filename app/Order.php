<?php

namespace App;

use App\lib\Jdf;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
use DB;
class Order extends Model
{
    protected $table='order';
    protected $fillable=['user_id','address_id','time','date','pay_type','pay_status','order_status','total_price','price',
        'code1','code2','order_read','order_type','order_id'];
    public $timestamps=false;
    public function add_order($pay_type,$refid=null)
    {
        $array=array();
        $order_data=Session::get('order_data');
        $address_id=array_key_exists('address_id',$order_data) ? $order_data['address_id'] : null;
        $order_type=array_key_exists('order_type',$order_data) ? $order_data['order_type'] :1;
        if($address_id)
        {
            $price=Cart::getPriceWithOutGitCart();
            $total_price=Session::get('total_price',0);
            if($price && $total_price)
            {
                $Jdf=new Jdf();
                $user_id=Auth::user()->id;
                $this->user_id=$user_id;
                $this->order_read='no';
                $this->time=time();

                $order_code=substr($this->time,1,5).$user_id.substr($this->time,5,10);
                $this->order_id=$order_code;
                $this->pay_type=$pay_type;
                $this->pay_status=0;
                $this->date=$Jdf->tr_num($Jdf->jdate('Y-n-j'));
                $this->order_status=1;
                $this->order_type=$order_type;
                $this->address_id=$address_id;
                $this->price=$price;
                $this->total_price=$total_price;
                $this->code1=$refid;
                if($this->save())
                {
                    $i=1;
                     foreach (Cart::get() as $key=>$value)
                     {
                       $product_data=array_key_exists('product_data',$value) ? $value['product_data'] : array();
                       foreach ($product_data as $key2=>$value2)
                       {
                           $s_c=explode('_',$key2);
                           $service_id=$s_c[0];
                           $color_id=$s_c[1];
                           $row=DB::table('order_row')->insert([
                               'order_id'=>$this->id,
                               'product_id'=>$key,
                               'service_id'=>$service_id,
                               'color_id'=>$color_id,
                               'number'=>$value2
                           ]);
                           if(!$row)
                           {
                              $i=0;
                           }
                       }
                     }


                     if($row==0)
                     {
                         DB::table('order_row')->where('order_id',$this->id)->delete();
                         $this->delete();
                     }
                     else
                     {
                         $array['id']=$this->id;
                     }

                     Session::forget('cart');
                }
                else
                {
                    $array['error']='خطا در ثبت اطلاعات';
                }
            }
            else
            {
                $array['error']='خطا در ثبت اطلاعات';
            }
        }
        else
        {
            $array['error']='خطا در ثبت اطلاعات';
        }

        return $array;
    }
    public function get_address_data()
    {
        return $this->hasOne(Address::class,'id','address_id')->withDefault(
            [
             'name'=>'-',
             'osatn_id'=>0,
             'shahr_id'=>0,
             'mobile'=>'-',
             'tell_code'=>'-',
             'tell'=>'-'
            ]
        );
    }
    public function get_order_row()
    {
        return  $this->hasMany(OrderRow::class,'order_id','id');
    }
    public function get_user()
    {
        return $this->hasOne(User::class,'id','user_id')->withDefault(['username'=>'حذف شده']);
    }
    public static function search($data)
    {
        $Jdf=new Jdf();
        $order=Order::with('get_user')->orderBy('id','DESC');
        $string='';
        if(sizeof($data)>0)
        {
            if(array_key_exists('order_id',$data))
            {
                $order=$order->where('order_id','like','%'.$data['order_id'].'%');
                $string.='?order_id='.$data['order_id'];
            }
            if(array_key_exists('first_date',$data))
            {
                if(!empty($data['first_date']))
                {
                    $e=explode('/',$data['first_date']);
                    if(sizeof($e)==3)
                    {
                        $y=$e[0];
                        $m=$e[1];
                        $d=$e[2];
                        $time=$Jdf->jmktime(0,0,0,$m,$d,$y);
                        $order=$order->where('time','>=',$time);
                    }
                }
                $string.='&first_date='.$data['first_date'];
            }
            if(array_key_exists('end_date',$data))
            {
                if(!empty($data['end_date']))
                {
                    $e=explode('/',$data['end_date']);
                    if(sizeof($e)==3)
                    {
                        $y=$e[0];
                        $m=$e[1];
                        $d=$e[2];
                        $time=$Jdf->jmktime(23,59,59,$m,$d,$y);
                        $order=$order->where('time','<=',$time);
                    }
                }
                $string.='&end_date='.$data['end_date'];
            }

        }
        $order=$order->paginate(10);
        $order->withPath($string);
        return $order;

    }
    public function create_order_code($code)
    {
        $user_id=Auth::user()->id;
        $order_code=substr($code,1,5).$user_id.substr($code,5,10);
        return $order_code;
    }
    public function getOrderGiftCart()
    {
        return $this->hasMany(
            OrderGiftCart::class,
            'order_id',
            'id'
        );
    }
}

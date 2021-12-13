<?php

namespace App\Http\Controllers;

use App\Category;
use App\GiftCart;
use App\lib\Barcode;
use App\lib\Jdf;
use App\Order;
use Illuminate\Http\Request;
use Auth;
use View;
use Response;
use DB;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create_barcode');
        $cat=Category::where('parent_id',0)->get();
        View::share('category',$cat);

    }
    public function index()
    {
        $this->report_data();
        return View('user.index');
    }
    public function orders()
    {
        $this->report_data();
        $user_id=Auth::user()->id;
        $orders=Order::where(['user_id'=>$user_id])->orderBy('id','DESC')->paginate(10);
        return View('user.orders',['orders'=>$orders]);
    }
    public function show_order(Request $request)
    {
        $order_id=$request->get('id');
        $user_id=Auth::user()->id;
        $order=Order::with('get_address_data')->with('get_order_row')->where(['id'=>$order_id,'user_id'=>$user_id])->firstOrFail();
        return View('user.show_order',['order'=>$order]);
    }
    public function print_order(Request $request)
    {
        $user=Auth::user();
        $id=$request->get('id');
        $order=Order::with('get_address_data')->with('get_order_row')->where(['id'=>$id,'user_id'=>$user->id,'pay_status'=>1])->firstOrFail();
        return view('user.print',['order'=>$order]);
    }
    public function create_barcode(Request $request)
    {
        $code=$request->get('order_code').'1';
        $fontSize = 10;
        $marge    = 10;
        $x        = 100;
        $y        = 40;
        $height   = 50;
        $width    = 2;
        $angle    = 0;

        $type     = 'ean13';


        $im     = imagecreatetruecolor(200, 80);
        $black  = ImageColorAllocate($im,0x00,0x00,0x00);
        $white  = ImageColorAllocate($im,247,249,250);

        imagefilledrectangle($im, 0, 0, 200, 80, $white);

        $data =Barcode::gd($im, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);

       // header('Content-type: image/png');
        imagepng($im);
        return Response::make('',200)->header('Content-type','image/png');
       // imagedestroy($im);
    }
    public function create_pdf(Request $request)
    {
        $order_id=$request->get('id');
        $user_id=Auth::user()->id;
        $order=Order::where(['user_id'=>$user_id,'id'=>$order_id])->firstOrFail();

        $code=$order->time;
        $user_id=Auth::user()->id;
        $order_code=substr($code,1,5).$user_id.substr($code,5,10);
        $Jdf=new \App\lib\Jdf();

        function add_span($s)
        {
            $a=preg_replace('/\s+/','-',$s);
            $b=explode('-',$a);
            foreach ($b as $key=>$value)
            {
                if(!preg_match('/[^A-Za-z0-9-]+/',$value))
                {
                    $new_value='<span style="font-family:DejaVuSansCondensed">'.$value.'</span>';
                    $s=str_replace($value,$new_value,$s);
                }
            }

            return $s;
        }

        $html = '<div class="header">

        <div class="col-md-6">
            <p>
                <span>شماره سفارش : </span>
                <span style="font-family:DejaVuSansCondensed">'.$order_code.'</span>
            </p>
            <p>
                <span>نام و نام خانوادگی خریدار : </span>
                <span>'.$order->get_address_data->name.'</span>
            </p>
            <p>
                <span>تاریخ ثبت سفارش : </span>
                <span style="font-family:DejaVuSansCondensed">'.$Jdf->tr_num($Jdf->jdate('H:i:s',$order->time)).' - '.$Jdf->tr_num($Jdf->jdate('d-m-Y',$order->time)).'</span>

            </p>
        </div>

        <div class="col-md-6" style="text-align:left">
            <img style="margin-top:30px" src="'.url('user/order/create_barcode').'?order_code='.$order_code.'">
        </div>


        <div style="clear:both"></div>
    </div>';

        $html.='<div style="width:100%;float:right;margin-top:20px">';
        $toatl_price=0;
        foreach($order->get_order_row as $key=>$value)
        {
            $product=$value->get_product;
            $html.=' <div class="product_row">
                <div class="col-md-3">
                    <img class="cart_img" src="'.url('upload/'.$value->get_product_img->url).'">

                </div>';

            $html.='<div class="col-md-9">

<div style="padding-top:20px">'.add_span($product->title).'</div>
<div style="font-family:DejaVuSansCondensed">'.$product->code.'</div>
';
            if($value->get_color)
            {
                $html.='<div>
                            <span>رنگ : </span>
                            <span>'.$value->get_color->color_name.'</span>
                        </div>';
            }
            if($value->get_service)
            {
                $html.='<div><span>گارانتی : </span>'.$value->get_service->service_name.'</div>';
            }

            $html.='<div>
                        <span>تعداد : </span>
                        <span style="font-family:DejaVuSansCondensed">'.$value->number.'</span>
                    </div>
                    <div>
                        <span>قیمت واحد : </span>
                        <span style="font-family:DejaVuSansCondensed">'.number_format($product->price-$product->discounts).'</span>
                        <span>تومان</span>
                    </div>';
            $p=($product->price-$product->discounts)*$value->number;
            $toatl_price+=$p;
            $html.='<div >
                        <span>قیمت کل : </span>
                        
                        <span style="font-family:DejaVuSansCondensed">'.number_format($p).'</span>
                        <span>تومان</span>
                    </div>';
            $html.='</div></div>';
        }

        if($order->order_type==1)
        {
            $post_type='تحويل اکسپرس ديجي‌کالا';
        }
        else
        {
            $post_type=' باربري (پس کرايه | لوازم خانگي سنگين)';
        }
        $html.='<div style="width:100%;float:right;margin-top:20px">

         <table class="table table-bordered" style="font-size:13px">
         <tr>
                 <td style="text-align:center">شیوه ارسال محصول</td>
                 <td>
                     '.$post_type.'
                 </td>
             </tr>
         ';

        $html.=' <tr>
                 <td style="text-align:center">استان - شهر</td>
                 <td>
                    '.$order->get_address_data->get_ostan->ostan_name.' - '.$order->get_address_data->get_shahr->shahr_name.'
                 </td>
             </tr>

             <tr>
                 <td style="text-align:center">شماره تماس</td>
                 <td style="font-family:DejaVuSansCondensed">
                     '.$order->get_address_data->mobile.' -
                     '.$order->get_address_data->tell_code.'-'.$order->get_address_data->tell.'
                 </td>
             </tr>

             <tr>
                 <td style="text-align:center">هزینه پرداخت شده</td>
                 <td>
                         <span style="font-family:DejaVuSansCondensed">'.number_format($toatl_price).'  </span>
                         تومان
                    </td>
             </tr>';

        $html.='</table></div>';


        require_once("../app/lib/mpdf/mpdf.php");

        $mpdf=new \mPDF('','a4');

        $mpdf->SetDisplayMode('fullpage');

        $stylesheet = file_get_contents('css/pdf_style.css');
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->SetDirectionality('rtl');

        $mpdf->WriteHTML($html);

        $mpdf->Output();

        //$mpdf->Output('name.pdf','d');
    }
    private function report_data()
    {
        $user_id=Auth::user()->id;
        $total_user_orders=Order::where(['user_id'=>$user_id])->count();
        View::share('total_user_orders',$total_user_orders);
    }

    public function gift_cart()
    {
        $this->report_data();
        $user_id=Auth::user()->id;
        $t=time();
        $gift_cart=GiftCart::orderBy('id','DESC')->where('user_id',$user_id)->paginate(10);
        return View('user.gift_cart',['gift_cart'=>$gift_cart]);
    }
}

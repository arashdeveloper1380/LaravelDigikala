<?php

namespace App\Http\Controllers;

use App\Address;
use App\Cart;
use App\Category;
use App\lib\Mellat_Bank;
use App\lib\zarinpal;
use App\Order;
use App\Ostan;
use App\Shahr;
use Illuminate\Http\Request;
use View;
use Validator;
use Auth;
use Session;
use Mail;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $cat=Category::where('parent_id',0)->get();
        View::share('category',$cat);
    }

    public function Shipping()
    {
        if(Cart::has())
        {
            $ostan=Ostan::get();
            $user_id=Auth::user()->id;
            $address=Address::with('get_shahr')->with('get_ostan')->where('user_id',$user_id)->orderBy('id','DESC')->paginate(20);
            return View('shop.shipping',['ostan'=>$ostan,'address'=>$address]);
        }
        else
        {
            return redirect('Cart');
        }

    }
    public function get_ajax_shahr(Request $request)
    {
        if($request->ajax())
        {
            $ostan_id=$request->get('ostan_id');
            $shahr=\App\Shahr::select(['id','shahr_name'])->where('parent_id',$ostan_id)->get()->toJson();
            return $shahr;
        }
    }
    public function add_address(Request $request)
    {
        if($request->ajax())
        {
            $Validator=Validator::make($request->all(),
                [
                    'name'=>'required',
                    'ostan_id'=>'required',
                    'tell'=>'required',
                    'shahr_id'=>'required',
                    'tell_code'=>'required',
                    'mobile'=>'required',
                    'zip_code'=>'required',
                    'address'=>'required'
                ]
                ,[],[
                    'name'=>'نام و نام خانوادگی',
                    'ostan_id'=>'استان',
                    'tell'=>'تلفن ثابت',
                    'shahr_id'=>'شهر',
                    'tell_code'=>'کد شهر',
                    'mobile'=>'شماره موبایل',
                    'zip_code'=>'کد پستی',
                    'address'=>'آدرس '
                ]);

            if($Validator->fails())
            {

               return $Validator->messages()->toJson();
            }
            else
            {
                $user_id=Auth::user()->id;
                $address=new Address($request->all());
                $address->user_id=$user_id;
                if($address->save())
                {
                    return 'ok';
                }
                else
                {
                   return 'error';
                }

            }
        }
        else
        {
            return redirect('/');
        }

    }
    public function edit_address_form(Request $request)
    {
        $address_id=$request->get('address_id');
        $address=Address::find($address_id);
        $ostan=Ostan::get();
        if($address)
        {
            $shahr=\App\Shahr::where('parent_id',$address->ostan_id)->pluck('shahr_name','id')->toArray();
            return View('include.edit_address',['address'=>$address,'ostan'=>$ostan,'shahr'=>$shahr]);
        }
        else
        {
            return 'error';
        }
    }
    public function edit_address(Request $request,$id)
    {
        if($request->ajax())
        {
            $Validator=Validator::make($request->all(),
                [
                    'name'=>'required',
                    'ostan_id'=>'required',
                    'tell'=>'required',
                    'shahr_id'=>'required',
                    'tell_code'=>'required',
                    'mobile'=>'required',
                    'zip_code'=>'required',
                    'address'=>'required'
                ]
                ,[],[
                    'name'=>'نام و نام خانوادگی',
                    'ostan_id'=>'استان',
                    'tell'=>'تلفن ثابت',
                    'shahr_id'=>'شهر',
                    'tell_code'=>'کد شهر',
                    'mobile'=>'شماره موبایل',
                    'zip_code'=>'کد پستی',
                    'address'=>'آدرس '
                ]);

            if($Validator->fails())
            {

                return $Validator->messages()->toJson();
            }
            else
            {
                $address=Address::find($id);
                if($address)
                {
                    $address->update($request->all());
                    return 'ok';
                }
                else
                {
                    return 'error';
                }
            }
        }
        else
        {
            return redirect('/');
        }
    }
    public function remove_address($id)
    {
        $address=Address::find($id);
        if($address)
        {
            $address->delete();
        }
        return redirect()->back();
    }
    public function review(Request $request)
    {
        if(Cart::has())
        {
            if($request->isMethod('post'))
            {
                $order_address=$request->get('order_address',0);
                $order_type=$request->get('order_type',0);
                $address=Address::find($order_address);
                if($order_address && $order_type)
                {
                    if($address)
                    {
                        if($order_type==1 or $order_type==2)
                        {
                            $data=array();
                            $data['address_id']=$order_address;
                            $data['order_type']=$order_type;
                            $order_data=Session::put('order_data',$data);
                            return view('shop.review',['address'=>$address]);
                        }
                        else
                        {
                            return redirect('Shipping');
                        }
                    }
                    else
                    {
                        return redirect('Shipping');
                    }
                }
                else
                {
                    return redirect('Shipping');
                }
            }
            else
            {
                if(Session::has('order_data'))
                {
                    $order_data=Session::get('order_data',array());
                    $address_id=array_key_exists('address_id',$order_data) ? $order_data['address_id'] : 0;
                    $address=Address::find($address_id);
                    if($address)
                    {
                        return view('shop.review',['address'=>$address]);
                    }
                    else
                    {
                        return redirect('Shipping');
                    }
                }
                else
                {
                    return redirect('Shipping');
                }
            }

        }
        else
        {
            return redirect('Cart');
        }
    }
    public function Payment()
    {
        if(Cart::has())
        {
            if(Session::has('order_data'))
            {
                return View('shop.payment');
            }
            else
            {
                return redirect('Shipping');
            }
        }
        else
        {
            return redirect('cart');
        }
    }
    public function Pay(Request $request)
    {
        if(Cart::has())
        {
            if(Session::has('order_data'))
            {
                $pay_type=$request->get('pay_radio');
                settype($pay_type,'integer');
                $p=Cart::getPrice();
                if(is_integer($pay_type))
                {
                    if($p==0)
                    {
                        $order=new Order();
                        $result=$order->add_order(8);
                        if(array_key_exists('id',$result))
                        {
                            $i = $result['id'];
                            $order = \App\Order::with(['get_address_data', 'get_order_row', 'get_user'])->find($i);
                            Mail::to($order->get_user->username)->queue(new \App\Mail\OrderMail($order));
                            Cart::removeGiftCart($order->price,$order->id);
                            $url = url('user/order?id=') . $result['id'];
                            return redirect($url);
                        }

                    }
                    else
                    {
                        if($pay_type==2 || $pay_type==3 || $pay_type==4)
                        {
                            $price=Cart::getPrice();

                            if($pay_type==3)
                            {
                                require_once '../app/lib/nusoap.php';
                                $mellat_bank=new Mellat_Bank();
                                $refid=$mellat_bank->pay($price);
                                if($refid)
                                {
                                    $order=new Order();
                                    $result=$order->add_order($pay_type,$refid);
                                    if(array_key_exists('id',$result))
                                    {
                                        return view('shop.location1',['res'=>$refid]);
                                    }
                                    else
                                    {
                                        return redirect()->back()->with('error',$result['error']);
                                    }
                                }
                                else
                                {
                                    return redirect()->back()->with('error','خطا در اتصال به درگاه بانک');
                                }
                            }
                            if($pay_type==4)
                            {
                                $zarinpal=new zarinpal();
                                $res=$zarinpal->pay($price,'ali@gmail.com','09141592083');
                                if($res)
                                {
                                    $order=new Order();
                                    $result=$order->add_order($pay_type,$res);
                                    if(array_key_exists('id',$result))
                                    {
                                        $url='https://www.zarinpal.com/pg/StartPay/'.$res;
                                        return redirect($url);
                                    }
                                    else
                                    {
                                        return redirect()->back()->with('error',$result['error']);
                                    }


                                }
                            }

                        }
                        elseif($pay_type==5 || $pay_type==6 || $pay_type==7)
                        {
                            $order=new Order();
                            $result=$order->add_order($pay_type);
                            if(array_key_exists('id',$result))
                            {
                                $i=$result['id'];
                                $order=\App\Order::with(['get_address_data','get_order_row','get_user'])->find($i);
                                Mail::to($order->get_user->username)->queue(new \App\Mail\OrderMail($order));
                                Cart::removeGiftCart($order->price,$order->id);
                                $url=url('user/order?id=').$result['id'];
                                return redirect($url);
                            }
                            else
                            {
                                return redirect()->back()->with('error',$result['error']);
                            }
                        }
                        else
                        {
                            return redirect()->back()->with('error','خطا در ثبت اطلاعات سفارش');
                        }
                    }

                }
                else
                {
                    return redirect()->back();
                }
            }
            else
            {
                return redirect('Shipping');
            }
        }
        else
        {
            return redirect('Cart');
        }

    }
    public function update_order(Request $request)
    {

        $RefId=$request->get('RefId');
        $ResCode=$request->get('ResCode');
        $SaleOrderId=$request->get('SaleOrderId');
        $SaleReferenceId=$request->get('SaleReferenceId');
        if($ResCode==0)
        {
            $order=Order::with(['get_address_data','get_order_row','get_user'])->where('code1',$RefId)->first();
            if($order)
            {
                require_once '../app/lib/nusoap.php';
                $mellat_bank=new Mellat_Bank();
                if($mellat_bank->Verify($SaleOrderId,$SaleReferenceId))
                {
                    $order->code2=$SaleReferenceId;
                    $order->pay_status=1;
                    $order->update();

                    Cart::removeGiftCart($order->price,$order->id);

                    Mail::to($order->get_user->username)->queue(new \App\Mail\OrderMail($order));

                    return View('user.show_order',['order'=>$order]);
                }
                else
                {
                    return View('pay_error');
                }
            }
            else
            {
                return View('pay_error');
            }
        }
        else
        {
            return View('pay_error');
        }

    }
    public function update_order2(Request $request)
    {
        $Authority =$request->get('Authority');
        $Status=$request->get('Status');
        if($Status=='ok')
        {
            $order=Order::with(['get_address_data','get_order_row','get_user'])->where('code1',$Authority)->first();
            if($order)
            {
                if($order->pay_status==0)
                {
                    $zarinpal=new zarinpal();
                    $res=$zarinpal->Verify($order->price,$Authority);
                    if($res)
                    {
                        $order->code2=$res;
                        $order->pay_status=1;
                        $order->update();
                        Cart::removeGiftCart($order->price,$order->id);
                        Mail::to($order->get_user->username)->queue(new \App\Mail\OrderMail($order));

                        return View('user.show_order',['order'=>$order]);
                    }
                    else
                    {
                        return View('pay_error');
                    }
                }
                else
                {
                    return View('pay_error');
                }
            }
            else
            {
                return View('pay_error');
            }
        }
        else
        {
            return View('pay_error');
        }


    }

}

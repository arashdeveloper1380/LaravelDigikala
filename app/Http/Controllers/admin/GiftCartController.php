<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Discount;
use App\GiftCart;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\DiscountRequest;
use App\Http\Requests\GiftCartRequest;
use App\lib\Jdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class GiftCartController extends Controller
{
    public function create()
    {
        return View('gift_cart.create');
    }
    public function store(GiftCartRequest $request)
    {
        $Jdf=new Jdf();
        $e=explode('/',$request->get('code_time'));
        if(sizeof($e)==3)
        {
            $y=$e[0];
            $m=$e[1];
            $d=$e[2];
            $time=$Jdf->jmktime(23,59,59,$m,$d,$y);

            $t=time();
            $t=substr($t,5,5);
            $code='digiGift'.$request->get('user_id').$t;

            $gift_cart=new GiftCart($request->all());
            $gift_cart->time=$time;
            $gift_cart->code=$code;
            $gift_cart->date=$request->get('code_time');
            $gift_cart->status=0;
            $gift_cart->value2=0;
            $gift_cart->saveOrFail();

            $url='admin/order/gift_cart/'.$gift_cart->id.'/edit';
            return redirect($url);
        }
        else
        {
            //error
        }
    }
    public function destroy($id)
    {
        $gift_cart=GiftCart::findOrFail($id);
        $gift_cart->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $gift_cart=GiftCart::findOrFail($id);
        return View('gift_cart.edit',['gift_cart'=>$gift_cart]);
    }
    public function update(GiftCartRequest $request,$id)
    {
        $gift_cart=GiftCart::findOrFail($id);
        $data=$request->all();
        $Jdf=new Jdf();
        var_dump($request->get('code_time'));
        $e=explode('/',$request->get('code_time'));
        if(sizeof($e)==3)
        {
            $y=$e[0];
            $m=$e[1];
            $d=$e[2];
            $time=$Jdf->jmktime(23,59,59,$m,$d,$y);
            $data['date']=$request->get('code_time');
            $data['time']=$time;
            $gift_cart->update($data);
             $url='admin/order/gift_cart/'.$gift_cart->id.'/edit';
             return redirect($url);
        }
        else
        {
            echo 'Error';
        }


    }


    public function index(Request $request)
    {
        $gift_cart=GiftCart::with('get_user')->orderBy('id','DESC')->paginate(10);
        return View('gift_cart.index',['gift_cart'=>$gift_cart]);
    }




}

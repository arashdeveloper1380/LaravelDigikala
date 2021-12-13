<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Discount;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\DiscountRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class DiscountController extends Controller
{

    public function index(Request $request)
    {
        $discount=Discount::orderBy('id','DESC')->paginate(10);
        return View('discount.index',['discount'=>$discount]);
    }
    public function create()
    {
        return View('discount.create');
    }
    public function store(DiscountRequest $request)
    {
        var_dump($request->all());
        $discount=new Discount($request->all());
        if(empty($request->get('code_time')) or !is_numeric($request->get('code_time')))
        {
            $discount->time=0;
            $discount->code_time=0;
        }
        else
        {
            $t=time()+$request->get('code_time')*3600*24;
            $discount->time=$t;

        }

        $discount->saveOrFail();

        $url='admin/order/discount/'.$discount->id.'/edit';
        return redirect($url);

    }
    public function edit($id)
    {
        $discount=Discount::findOrFail($id);
        return View('discount.edit',['discount'=>$discount]);
    }
    public function update(DiscountRequest $request,$id)
    {
        $discount=Discount::findOrFail($id);
        $data=$request->all();
        if(empty($request->get('code_time')) or !is_numeric($request->get('code_time')))
        {
            $data['time']=0;
            $data['code_time']=0;
        }
        else
        {
            $t=time()+$request->get('code_time')*3600*24;
            $data['time']=$t;
        }
        $discount->update($data);
        $url='admin/order/discount/'.$discount->id.'/edit';
        return redirect($url);
    }
    public function destroy($id)
    {
        $discount=Discount::findOrFail($id);
        $discount->delete();
        return redirect()->back();
    }
}

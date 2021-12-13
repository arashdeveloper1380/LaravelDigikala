<?php

namespace App\Http\Controllers\admin;

use App\Color;
use App\Http\Requests\ServiceRequest;
use App\lib\Jdf;
use App\Product;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ServiceController extends Controller
{
    public $product;
    public $id;
    public function __construct(Request $request)
    {
        if(!$request->isMethod('DELETE'))
        {
             $id=$request->get('product_id');
             $this->id=$id;
             if(!empty($id))
             {
                 $this->product=Product::findOrFail($id);
             }
        }

    }
    public function index()
    {
        $service=Service::where(['product_id'=>$this->id,'parent_id'=>0])->orderBy('id','DESC')->paginate(10);
        return View('service.index',['product'=>$this->product,'service'=>$service]);
    }
    public function create()
    {
        return View('service.create',['product'=>$this->product]);
    }
    public function store(ServiceRequest $request)
    {
        $service=new Service($request->all());
        $service->parent_id=0;
        $service->saveOrFail();
        $url='admin/service/'.$service->id.'/edit?product_id='.$this->id;
        return redirect($url);
    }
    public function edit($id)
    {
        $service=Service::where(['id'=>$id,'product_id'=>$this->id])->firstOrFail();
        return View('service.edit',['service'=>$service,'product'=>$this->product]);
    }
    public function update(ServiceRequest $request,$id)
    {
        $service=Service::findOrFail($id);
        $message='خطا در ویرایش اطلاعات';
        if($service->update($request->all()))
        {
            $message='ویرایش با موفقیت انجام شد';
        }
        $url='admin/service/'.$service->id.'/edit?product_id='.$this->id;
        return redirect($url)->with(['message'=>$message]);
    }
    public function show($id)
    {
        $service=Service::findOrFail($id);
        return view('service.show',['product'=>$this->product,'service'=>$service]);
    }
    public function destroy($id)
    {
       $service=Service::findOrFail($id);
       $service->delete();
       Service::where(['parent_id'=>$id])->delete();
       return redirect()->back();
    }
    public function get_price(Request $request)
    {
        $product_id=$request->get('product_id');
        $date=$request->get('date');
        $service_id=$request->get('service_id');
        $product_color=Color::where(['product_id'=>$product_id])->get();

        $service_price=Service::where(['parent_id'=>$service_id,'product_id'=>$product_id,'date'=>$date])->pluck('price','color_id')->toArray();
        return View('service.add_price',['product_color'=>$product_color,
            'service_price'=>$service_price,
            'product_id'=>$product_id,
            'date'=>$date,
            'service_id'=>$service_id
        ]);

    }
    public function set_price(Request $request)
    {
        $Jdf=new Jdf();
        $color=$request->get('color');
        $date=$request->get('time');
        $d=explode('-',$date);
        $time=$Jdf->jmktime(0,0,0,$d[1],$d[2],$d[0]);
        $service_id=$request->get('service_id');
        DB::table('service')->where(['parent_id'=>$service_id,'product_id'=>$this->id,'date'=>$date])->delete();
        if(is_array($color))
        {
            foreach ($color as $key=>$value)
            {
              if(!empty($value))
              {
                  DB::table('service')->insert([
                      'product_id'=>$this->id,
                      'parent_id'=>$service_id,
                      'color_id'=>$key,
                      'service_name'=>'-',
                      'price'=>$value,
                      'time'=>$time,
                      'date'=>$date
                  ]);
              }
            }
        }
        return redirect()->back();
    }
}

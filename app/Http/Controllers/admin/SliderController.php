<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\SliderRequest;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SliderController extends Controller
{
    public function index(Request $request)
    {

        $slider=Slider::orderBy('id','DESC')->paginate(10);
        return View('slider.index',['slider'=>$slider]);
    }
    public function create()
    {
        return View('slider.create');
    }
    public function store(SliderRequest $request)
    {
        $Slider=new Slider($request->all());
        if($request->hasFile('pic'))
        {
            $file_name=time().'.'.$request->file('pic')->getClientOriginalExtension();
            if($request->file('pic')->move('upload',$file_name))
            {
                $Slider->img=$file_name;
            }
        }
        $Slider->saveOrFail();

        $url='admin/slider/'.$Slider->id.'/edit';
        return redirect($url);

    }
    public function edit($id)
    {
       $slider=Slider::findOrFail($id);
       return View('slider.edit',['slider'=>$slider]);
    }
    public function update(SliderRequest $request,$id)
    {
        $Slider=Slider::findOrFail($id);
        if($request->hasFile('pic'))
        {
            $file_name=time().'.'.$request->file('pic')->getClientOriginalExtension();
            if($request->file('pic')->move('upload',$file_name))
            {
                $Slider->img=$file_name;
            }
        }
        $Slider->update($request->all());
        $url='admin/slider/'.$Slider->id.'/edit';
        return redirect($url);
    }
    public function destroy($id)
    {
        $Slider=Slider::findOrFail($id);
        $url=$Slider->img;
        $Slider->delete();
        if(!empty($url))
        {
            unlink('upload/'.$url);
        }
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Ostan;
use App\Shahr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
class ShahrController extends Controller
{
    public function index()
    {
        $shahr=Shahr::with('get_ostan_name')->orderBy('id','DESC')->paginate(10);
        return view('shahr.index',['shahr'=>$shahr]);
    }
    public function create()
    {
        $ostan=Ostan::pluck('ostan_name','id')->toArray();
        return View('shahr.create',['ostan'=>$ostan]);
    }
    public function store(Request $request)
    {
        $Validator=Validator::make($request->all(),
            ['shahr_name'=>'required','parent_id'=>'required'],[],['shahr_name'=>'نام شهر','parent_id'=>'استان']);
        if($Validator->fails())
        {
            return redirect()->back()->withErrors($Validator)->withInput();
        }
        else
        {
            $shahr=new Shahr($request->all());
            $shahr->saveOrFail();
            $url='admin/shahr/'.$shahr->id.'/edit';
            return redirect($url);
        }
    }
    public function edit($id)
    {
        $ostan=Ostan::pluck('ostan_name','id')->toArray();
        $shahr=Shahr::findOrFail($id);
        return View('shahr.update',['ostan'=>$ostan,'shahr'=>$shahr]);
    }
    public function update(Request $request,$id)
    {
        $shahr=Shahr::findOrFail($id);
        $Validator=Validator::make($request->all(),
            ['shahr_name'=>'required','parent_id'=>'required'],[],['shahr_name'=>'نام شهر','parent_id'=>'استان']);
        if($Validator->fails())
        {
            return redirect()->back()->withErrors($Validator)->withInput();
        }
        else
        {
            $shahr->update($request->all());
            return redirect()->back()->with('status','ویرایش با موفقیت انجام شد');
        }
    }
    public function destroy($id)
    {
        DB::table('shahr')->where('id',$id)->delete();
        return redirect()->back();
    }
}

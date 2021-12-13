<?php

namespace App\Http\Controllers\admin;

use App\Ostan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
class OstanController extends Controller
{
   public function index()
   {
       $ostan=Ostan::orderBy('id','DESC')->paginate(10);
       return view('ostan.index',['ostan'=>$ostan]);
   }
   public function create()
   {
       return View('ostan.create');
   }
   public function store(Request $request)
   {
       $Validator=Validator::make($request->all(),
           ['ostan_name'=>'required'],[],['ostan_name'=>'نام استان']);
       if($Validator->fails())
       {
           return redirect()->back()->withErrors($Validator)->withInput();
       }
       else
       {
           $ostan=new Ostan($request->all());
           $ostan->saveOrFail();
           $url='admin/ostan/'.$ostan->id.'/edit';
           return redirect($url);
       }
   }
   public function edit($id)
   {
       $ostan=Ostan::findOrFail($id);
       return View('ostan.update',['ostan'=>$ostan]);
   }
   public function update(Request $request,$id)
   {
       $ostan=Ostan::findOrFail($id);
       $Validator=Validator::make($request->all(),
           ['ostan_name'=>'required'],[],['ostan_name'=>'نام استان']);
       if($Validator->fails())
       {
           return redirect()->back()->withErrors($Validator)->withInput();
       }
       else
       {
           $ostan->update($request->all());
           return redirect()->back()->with('status','ویرایش با موفقیت انجام شد');
       }
   }
   public function destroy($id)
   {
      DB::table('ostan')->where('id',$id)->delete();
      DB::table('shahr')->where('parent_id',$id)->delete();
      return redirect()->back();
   }
}

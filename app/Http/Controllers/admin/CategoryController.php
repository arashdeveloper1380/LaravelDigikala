<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $category=Category::search($request->all());
        return View('category.index',['category'=>$category,'data'=>$request->all()]);
    }
    public function create()
    {
        $cat_list=Category::get_cat_list();
        return View('category.create',['cat_list'=>$cat_list]);
    }
    public function store(CategoryRequest $request)
    {
        $Category=new Category($request->all());
        if($request->hasFile('pic'))
        {
            $file_name=time().'.'.$request->file('pic')->getClientOriginalExtension();
            if($request->file('pic')->move('upload',$file_name))
            {
                $Category->img=$file_name;
            }
        }
        $Category->saveOrFail();

        $url='admin/category/'.$Category->id.'/edit';
        return redirect($url);

    }
    public function edit($id)
    {
       $Category=Category::findOrFail($id);
       $cat_list=Category::get_cat_list();
       return View('category.edit',['cat_list'=>$cat_list,'Category'=>$Category]);
    }
    public function update(CategoryRequest $request,$id)
    {
        $Category=Category::findOrFail($id);
        if($request->hasFile('pic'))
        {
            $file_name=time().'.'.$request->file('pic')->getClientOriginalExtension();
            if($request->file('pic')->move('upload',$file_name))
            {
                $Category->img=$file_name;
            }
        }
        $Category->update($request->all());
        $url='admin/category/'.$Category->id.'/edit';
        return redirect($url);
    }
    public function destroy($id)
    {
        $Category=Category::findOrFail($id);
        $url=$Category->img;
        $Category->delete();
        if(!empty($url))
        {
            unlink('upload/'.$url);
        }
        return redirect()->back();
    }
    public function del_img($id)
    {
        $category=Category::findOrFail($id);
        $url=$category->img;
        if(!empty($url))
        {
            if(file_exists('upload/'.$url))
            {
                $category->img='';
                $category->update();
                unlink('upload/'.$url);
            }
        }
       return redirect()->back();
    }
}

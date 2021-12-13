<?php

namespace App\Http\Controllers\admin;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class QuestionController extends Controller
{
    public function index()
    {
        $question=Question::with(['get_product','get_user'])->orderBy('id','DESC')->paginate(10);
        return View('question.index',['question'=>$question]);
    }
    public function set_status(Request $request)
    {
        if($request->ajax())
        {
            $question_id=$request->get('question_id');
            $row=Question::where('id',$question_id)->first();
            if($row)
            {
                $row->status=($row->status==0) ? 1 : 0;
                $row->update();
                $msg=($row->status==1)  ? 'تایید شده' : 'در انتظار تایید';
                return $msg;
            }
            else
            {
                return 'خطا در درخواست ارسالی';
            }
        }
    }
    public function delete($id)
    {
        $row=Question::findOrFail($id);
        $row->delete();
        return redirect()->back();
    }
    public function add(Request $request)
    {
        $user=Auth::user();
        $question=new Question($request->all());
        $question->time=time();
        $question->user_id=$user->id;
        $question->status=1;
        $question->saveOrFail();
        return redirect()->back();
    }
}

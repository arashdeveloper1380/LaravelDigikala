<?php

namespace App\Http\Controllers\admin;

use App\lib\Jdf;
use App\Order;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only('admin_login');
    }
    public function index()
    {
        $Jdf=new Jdf();
        $y=$Jdf->tr_num($Jdf->jdate('Y'));
        $m=$Jdf->tr_num($Jdf->jdate('n'));
        $t=$Jdf->tr_num($Jdf->jdate('t'));
        $date_list=array();
        $total_price=array();
        $order_count=array();
        for ($i=1;$i<=$t;$i++)
        {
            $date=$y.'-'.$m.'-'.$i;
            $date_list[$i]=$date;
            $total_price[$i]=Order::where(['date'=>$date,'pay_status'=>1])->sum('price');
            $order_count[$i]=Order::where(['date'=>$date,'pay_status'=>1])->count();
        }
        return View('admin.index',[
            'total_price'=>$total_price,
            'order_count'=>$order_count,
            'date_list'=>$date_list
        ]);
    }
    public function admin_login()
    {
        return View('admin.login');
    }
    public function statistics()
    {
        $Jdf=new Jdf();
        $date_list=array();
        $y=$Jdf->tr_num($Jdf->jdate('Y'));
        $m=$Jdf->tr_num($Jdf->jdate('n'));
        $t=$Jdf->tr_num($Jdf->jdate('t'));
        $view=array();
        $total_view=array();
        for ($i=1;$i<=$t;$i++)
        {
            $date=$y.'-'.$m.'-'.$i;
            $date_list[$i]=$date;
            $row=DB::table('statistics')->where(['year'=>$y,'month'=>$m,'day'=>$i])->first();
            if($row)
            {
                $view[$i]=$row->view;
                $total_view[$i]=$row->total_view;
            }
            else
            {
                $view[$i]=0;
                $total_view[$i]=0;
            }
        }

        $view_year=DB::table('statistics')->where(['year'=>$y])->sum('total_view');
        $month_year=DB::table('statistics')->where(['year'=>$y,'month'=>$m])->sum('total_view');
        $total=DB::table('statistics')->sum('total_view');
        return View('admin.statistics',['view'=>$view,
            'total_view'=>$total_view,
            'date_list'=>$date_list,
            'view_year'=>$view_year,
            'month_year'=>$month_year,
            'total'=>$total
        ]);
    }
    public function pay_setting_form()
    {
        $TerminalId=Setting::get_value('TerminalId');
        $Username=Setting::get_value('Username');
        $Password=Setting::get_value('Password');
        $MerchantID=Setting::get_value('MerchantID');
        return View('admin.pay_setting',[
            'TerminalId'=>$TerminalId,
            'Username'=>$Username,
            'Password'=>$Password,
            'MerchantID'=>$MerchantID
        ]);
    }
    public function pay_setting(Request $request)
    {
        Setting::set_value($request->all());
        return redirect()->back();
    }
}

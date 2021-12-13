<?php

namespace App\Http\Middleware;

use App\lib\Jdf;
use Closure;
use DB;
class Statistics
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ip=$request->ip();
        $Jdf=new Jdf();
        $year=$Jdf->tr_num($Jdf->jdate('Y'));
        $month=$Jdf->tr_num($Jdf->jdate('n'));
        $day=$Jdf->tr_num($Jdf->jdate('d'));
        $r=null;
        $row=DB::table('statistics_user')->where(['year'=>$year,'month'=>$month,'day'=>$day,'user_ip'=>$ip])->first();
        if(!$row)
        {
            $r=DB::table('statistics_user')->insert(['year'=>$year,'month'=>$month,'day'=>$day,'user_ip'=>$ip]);
        }
        $row2=DB::table('statistics')->where(['year'=>$year,'month'=>$month,'day'=>$day])->first();
        if($row2)
        {
            $view=$row2->view+1;
            $total_view=$row2->total_view+1;
            if($r)
            {
                DB::table('statistics')
                    ->where(['year'=>$year,'month'=>$month,'day'=>$day])
                    ->update(['view'=>$view,'total_view'=>$total_view]);
            }
            else
            {
                DB::table('statistics')
                    ->where(['year'=>$year,'month'=>$month,'day'=>$day])
                    ->update(['total_view'=>$total_view]);
            }
        }
        else
        {
            DB::table('statistics')->insert(['year'=>$year,'month'=>$month,'day'=>$day,'view'=>1,'total_view'=>1]);
        }
        return $next($request);
    }
}

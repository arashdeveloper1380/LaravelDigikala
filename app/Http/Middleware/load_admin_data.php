<?php

namespace App\Http\Middleware;

use Closure;
use View;
use DB;
class load_admin_data
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
        $comment_count=DB::table('comment_product')->where(['status'=>0])->count();
        $question_count=DB::table('question')->where(['status'=>0])->count();
        View::share('comment_count',$comment_count);
        View::share('question_count',$question_count);
        return $next($request);
    }
}

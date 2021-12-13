<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use DB;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('check_username',function ($attr,$value,$params)
        {
            if(filter_var($value,FILTER_VALIDATE_EMAIL))
            {
                return true;
            }
            else
            {
                $len=strlen($value);
                if($len==10)
                {
                    if(substr($value,0,1)=='9')
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
                elseif($len==11)
                {
                    if(substr($value,0,2)=='09')
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
                else
                {
                    return false;
                }
            }
        });

        Validator::extend('unique_username',function ($attr,$value,$params)
        {
           $user=DB::table('users')->where('username',$value)->first();
           if($user)
           {
               return false;
           }
           else
           {
               return true;
           }
        });
        Validator::extend('captcha',function ($attr,$value,$params)
        {
           $captcha=Session::get('Captcha');
           if($value==$captcha)
           {
               return true;
           }
           else
           {
               return false;
           }
        });



    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

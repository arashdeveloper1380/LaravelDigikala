@extends('layouts.site')

@section('content')


    <div class="row content_box">






        <div class="row">

            <div class="col-md-6">

               <div style="text-align:center;margin-top:60px;">
                   <div class="icon login_icon"></div>

                   <p style="font-weight:bold">عضو دیجی‌ آنلاین هستید؟</p>
                   <p>برای تکمیل فرآیند خرید خود وارد شوید</p>
                   <button onclick="show_login_form()" class="btn btn-primary">ورود به دیجی آنلاین</button>
               </div>
            </div>
            <div class="col-md-6" >

                <div class="right_login_box">

                    <div style="text-align:center;padding-top: 60px;">
                        <div class="icon register_icon"></div>
                        <p style="font-weight:bold">تازه وارد هستید؟</p>
                        <p>برای تکمیل فرآیند خرید خود ثبت نام کنید</p>
                        <a class="btn btn-success" href="{{ url('register') }}">ثبت نام در دیجی آنلاین</a>

                        <div style="padding-top:30px;padding-bottom:30px;width:80%;margin:auto">
                            با عضویت در دیجی‌کالا تجربه متفاوتی از خرید اینترنتی داشته باشید. وضعیت سفارش خود را پیگیری نموده و سوابق خریدتان را مشاهده کنید.
                        </div>
                    </div>

                </div>


            </div>

        </div>

    </div>



    <div id="show_data"></div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="myModalLabel">ورود به دیجی آنلاین</h5>
                </div>
                <div class="modal-body">

                    <div class="register_form">
                        <form method="post" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <span>شماره همراه یا پست الکترونیک</span>
                                <input type="text" value="{{ old('username') }}" class="form-control" name="username" placeholder="Phone number or Email">
                                @if($errors->has('username'))
                                    <span class="has-error">{{ $errors->first('username') }}</span>
                                @endif
                            </div>


                            <div class="form-group">
                                <span>کلـــمه عبــور</span>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                @if($errors->has('password'))
                                    <span class="has-error">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> مرا به خاطر بسپار

                            </div>

                            <div class="form-group">
                                <input type="submit" style="width:150px" class="register_btn" value="ورود به دیجی آنلاین">
                                <a style="color: blue;padding-right: 10px;" href="">بازیابی کلمه عبور</a>
                            </div>


                        </form>
                    </div>



                </div>
                <div class="login_footer">

                      <span>
            قبلاً در دیجی آنلاین ثبت نام نکرده اید؟</span>
                    <a href="{{ url('register') }}">ثبت نام در دیجی آنلاین</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <?php
    $url1=url('site/ajax_check_login');
    ?>
<script>
show_login_form=function ()
{
    $.ajaxSetup(
        {
            'headers':{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
    $.ajax({
        url:'{{ $url1 }}',
        type:'POST',
        success:function (data) {
           $("#show_data").html(data);
        }
    });
};

</script>
@if($errors->has('username') or $errors->has('password'))
<script>
 $("#myModal").modal('show');
</script>
@endif
@endsection
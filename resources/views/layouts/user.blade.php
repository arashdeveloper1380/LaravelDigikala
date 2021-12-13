@extends('layouts.site')

@section('content')
    <div class="row content_box" style="padding-top:30px">

        <div class="col-md-3 col-xs-12 col-sm-3">

            <ul class="user_panel_ul">
                <li  class="active"><a href="{{ url('user/orders') }}">سفارشات من</a></li>
                <li><a href="{{ url('user/gift_cart') }}">کارت های هدیه</a></li>
                <li><a href="{{ url('user') }}">لیست مورد علاقه</a></li>
                <li><a href="{{ url('user') }}">نقد های من</a></li>
                <li><a href="{{ url('user') }}">نظرات من</a></li>
                <li><a href="{{ url('user') }}">دیجی بن های من</a></li>
                <li><a href="{{ url('user') }}">آدرس ها</a></li>
                <li><a href="{{ url('user') }}">پیغام های من</a></li>
            </ul>
        </div>

        <div class="col-md-9 col-xs-12 col-sm-9">

            <p>گزارش عملکرد</p>
            <table class="table table-bordered report_info">
                <tr>
                    <td>
                        <span>تعداد کل سفارشات:</span>
                        <span>{{ $total_user_orders }}</span>
                    </td>
                    <td>
                        <span>کل دیجی بن دریافتی: </span>
                        <span>0</span>
                    </td>
                    <td>
                        <span>تعداد نظرات ارسال شده: </span>
                        <span>0</span>
                    </td>
                    <td>
                        <span>سفارشات در انتظار تایید: </span>
                        <span>0</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span>کل دیجی بن مصرفی :</span>
                        <span>0</span>
                    </td>
                    <td>
                        <span>تعداد نقد‌های ارسال شده: </span>
                        <span>0</span>
                    </td>
                    <td>
                        <span>سفارشات در حال پردازش:</span>
                        <span>0</span>
                    </td>
                    <td>
                        <span>کل دیجی بن باطل شده: </span>
                        <span>0</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span>تعداد پیغام‌های خوانده نشده:</span>
                        <span>0</span>
                    </td>
                    <td>
                        <span>سفارشات انصراف داده شده</span>
                        <span>0</span>
                    </td>
                    <td>
                        <span>دیجی بن مانده قابل مصرف: </span>
                        <span>0</span>
                    </td>
                    <td>
                        <span>سفارشات ارسال شده:</span>
                        <span>0</span>
                    </td>
                </tr>
            </table>
            @yield('panel_content')
        </div>
    </div>
@endsection
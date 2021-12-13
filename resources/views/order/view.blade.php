@extends('layouts/admin')
@section('header')
    <title>سفارش - {{ $order->id }}</title>
@endsection

@section('style')
    <link href="{{ url('css/bootstrap-select.css') }}" rel="stylesheet" >
@endsection
@section('content')

    <div class="box_title">
        <span>سفارش - {{ $order->id }}</span>
    </div>
    <?php

    $array=array();
    $array[0]='در انتظار پرداخت';
    $array[1]='در انتظار تایید مدیریت';
    $array[2]='پردازش انبار';
    $array[3]='آماده ارسال';
    $array[4]='تحویل داده شده';
    $array[5]='عدم دریافت محصول';
    $array[-1]='عدم پرداخت'
    ?>
    <div style="width:95%;margin:auto">
        <table class="table table-bordered table-striped" id="order_data">
            <tr>
                <td colspan="2">خلاصه وضعیت سفارش</td>
            </tr>
            <tr>
                <td>شماره سفارش</td>
                <?php
                $code=$order->time;
                $user_id=Auth::user()->id;
                $order_code=substr($code,1,5).$user_id.substr($code,5,10);
                ?>
                <td>{{ $order_code }}</td>
            </tr>

            <tr>
                <td>قیمت کل </td>
                <td>{{ number_format($order->total_price) }} تومان</td>
            </tr>

            <tr>
                <td>مبلغ واریز شده</td>
                <td>{{ number_format($order->price) }} تومان</td>
            </tr>

            <tr>
                <td>وضعیت پرداخت</td>
                <td>
                    @if($order->pay_status==1)
                        <span style="color:red">پرداخت شده</span>
                    @else
                        در انتظار پرداخت
                    @endif
                </td>
            </tr>

            <tr>
                <td>وضعیت سفارش</td>
                <td style="color:red">
                  <select class="selectpicker" onchange="set_status(<?= $order->id ?>)" id="order_status">
                      @foreach($array as $key=>$value)
                          <option value="{{ $key }}" @if($key==$order->order_status) selected="selected" @endif >{{ $value }}</option>
                      @endforeach
                  </select>
                </td>
            </tr>
        </table>

        <table class="table table-bordered table-striped">

            <tr>
                <td colspan="2">اطلاعات ارسال سفارش</td>
            </tr>

            <tr>
                <td>نام و نام خانوادگی</td>
                <td>
                    {{ $order->get_address_data->name }}
                </td>
            </tr>

            <tr>
                <td>استان - شهر</td>
                <td>
                    {{ $order->get_address_data->get_ostan->ostan_name.' - '.$order->get_address_data->get_shahr->shahr_name }}
                </td>
            </tr>

            <tr>
                <td>شماره تماس</td>
                <td>
                    <p>{{ $order->get_address_data->mobile }}</p>
                    <p>{{ $order->get_address_data->tell_code.'-'.$order->get_address_data->tell }}</p>
                </td>
            </tr>
            <tr>
                <td>شیوه ارسال محصول</td>
                <td>
                    @if($order->order_type==1)
                        تحويل اکسپرس ديجي‌کالا
                    @else
                        باربري (پس کرايه | لوازم خانگي سنگين)
                    @endif
                </td>
            </tr>
        </table>

        @if(sizeof($order->getOrderGiftCart)>0)
            <?php $i=1; ?>
            <p style="color:red;padding-top:20px;padding-bottom:15px;">کارت های هدیه استفاده شده</p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ردیف</th>
                    <th>کد کارت هدیه</th>
                    <th>مبلغ استفاده شده</th>
                </tr>

                @foreach($order->getOrderGiftCart as $key=>$value)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $value->getGiftCart->code }}</td>
                        <td>{{ number_format($value->price).' تومان' }}</td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </table>
        @endif

        <p style="color:red;padding-top:20px;padding-bottom:15px;">محصولات خریداری شده</p>
        <table id="cart_table" class="table table-bordered">

            <tr>
                <th>شرح محصول</th>
                <th>تعداد</th>
                <th>قیمت واحد</th>
                <th colspan="2">قیمت کل</th>
            </tr>

            @foreach($order->get_order_row as $key=>$value)

                <?php
                $product=$value->get_product;
                ?>
                <tr>
                    <td>
                        <div style="width:100%" class="cart_div">
                            <div class="col-md-4">
                                <img class="cart_img" src="{{ url('upload/'.$value->get_product_img->url) }}">
                            </div>
                            <div class="col-md-8">
                                <p><a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}">{{ $product->title }}</a></p>
                                <p><a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}">{{ $product->code }}</a></p>
                                @if($value->get_color)
                                    <p style="color:#777">
                                        <span>رنگ : </span>
                                        <label style="background:#{{ $value->get_color->color_code }}" class="color_product"></label>
                                        <span>{{ $value->get_color->color_name }}</span>
                                    </p>
                                @endif
                                @if($value->get_service)
                                    <p style="color:#777"><span>گارانتی : </span> {{ $value->get_service->service_name }}</p>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="cart_number">
                        <p> {{ $value->number }}</p>
                    </td>
                    <td class="cart_price">
                        <p>
                            <span class="p1">{{ number_format($product->price-$product->discounts) }}</span>
                            <span class="p2">تومان</span>
                        </p>
                    </td>
                    <td class="cart_price">
                        <p>
                            <?php
                            $price=$value->number*($product->price-$product->discounts);
                            ?>
                            <span class="p1">{{ number_format($price) }}</span>
                            <span class="p2">تومان</span>
                        </p>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection

@section('footer')
<script type="text/javascript" src="{{ url('js/bootstrap-select.js') }}"></script>
<script type="text/javascript" src="{{ url('js/defaults-fa_IR.js') }}"></script>
<script>
    <?php
        $url=url('admin/order/set_status')
     ?>
set_status=function (order_id)
{
  var order_status=document.getElementById('order_status').value;
    $.ajaxSetup(
        {
            'headers':{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
    $.ajax({
        url:'{{ $url }}',
        type:'POST',
        data:'order_id='+order_id+'&status='+order_status,
        success:function (data) {
           alert(data);
        }
    });
}
</script>
@endsection

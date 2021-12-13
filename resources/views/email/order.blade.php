<html>
<head>
    <style>
        .col-md-6
        {
            width:45%;
            float:right;
            font-family:Tahoma;
            text-align:right;
            margin-right:5%;
        }
        .header
        {
            width:100%;
            padding:20px;
            background-color: #F7F9FA;
        }
        .col-md-3
        {
          width:30%;
            font-family:Tahoma;
            text-align:right;
            float:right;
        }
        .col-md-9
        {
           width:67%;
            margin-right:3%;
            font-family:Tahoma;
            text-align:right;
            float:right;
        }
        .cart_img
        {
            width:80%;
            margin-right:10%;
            margin-top:15px;
            margin-bottom:15px;
        }
        .product_row {
            border: 1px solid gainsboro;
            width: 98%;
            float: right;
        }
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
            border-spacing:0px;
            direction:rtl;
        }
        .table tr td
        {
            border: 1px solid #ddd;
            padding:10px;
            font-family:Tahoma;
        }
    </style>
</head>

<body>


<?php
$code=$order->time;
$user_id=$order->user_id;
$order_code=substr($code,1,5).$user_id.substr($code,5,10);
$Jdf=new \App\lib\Jdf();
?>

<div class="header">

    <div class="col-md-6">
        <p>
            <span>شماره سفارش : </span>
            <span>{{ $order_code }}</span>
        </p>
        <p>
            <span>نام و نام خانوادگی خریدار : </span>
            <span>{{ $order->get_address_data->name }}</span>
        </p>
        <p>
            <span>تاریخ ثبت سفارش : </span>
            <span>{{ $Jdf->tr_num($Jdf->jdate('H:i:s',$order->time)) }} - {{ $Jdf->tr_num($Jdf->jdate('d-m-Y',$order->time)) }}</span>

        </p>
    </div>

    <div class="col-md-6" style="text-align:left">
        <img src="{{ url('user/order/create_barcode').'?order_code='.$order_code }}">
    </div>


    <div style="clear:both"></div>
</div>


<div style="width:100%;float:right;margin-top:20px">
    <?php
    $toatl_price=0;
    ?>
    @foreach($order->get_order_row as $key=>$value)
        <?php
        $product=$value->get_product;
        ?>
        <div class="product_row">
            <div class="col-md-3">
                <img class="cart_img" src="{{ url('upload/'.$value->get_product_img->url) }}">

            </div>
            <div class="col-md-9">
                <p style="padding-top:20px">{{ $product->title }}</p>
                <p>{{ $product->code }}</p>
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
                <p style="color:#777">
                    <span>تعداد : </span>
                    <span >{{ $value->number }}</span>
                </p>
                <p style="color:#777">
                    <span>قیمت واحد : </span>
                    <span>{{ number_format($product->price-$product->discounts) }}</span>
                    <span>تومان</span>
                </p>

                <p style="color:#777">
                    <span>قیمت کل : </span>
                    <?php
                    $p=($product->price-$product->discounts)*$value->number;
                    $toatl_price+=$p;
                    ?>
                    <span>{{ number_format($p) }}</span>
                    <span>تومان</span>
                </p>
            </div>
        </div>
    @endforeach


</div>


<div style="width:100%;float:right;margin-top:20px">

    <table class="table table-bordered" style="font-size:13px">


        <tr>
            <td style="text-align:center">شیوه ارسال محصول</td>
            <td>
                @if($order->order_type==1)
                    تحويل اکسپرس ديجي‌کالا
                @else
                    باربري (پس کرايه | لوازم خانگي سنگين)
                @endif
            </td>
        </tr>

        <tr>
            <td style="text-align:center">استان - شهر</td>
            <td>
                {{ $order->get_address_data->get_ostan->ostan_name.' - '.$order->get_address_data->get_shahr->shahr_name }}
            </td>
        </tr>

        <tr>
            <td style="text-align:center">شماره تماس</td>
            <td>
                {{ $order->get_address_data->mobile }} -
                {{ $order->get_address_data->tell_code.'-'.$order->get_address_data->tell }}
            </td>
        </tr>

        <tr>
            <td style="text-align:center">هزینه پرداخت شده</td>
            <td>
                <span>{{ number_format($toatl_price) }} تومان </span>
            </td>
        </tr>





    </table>

</div>


</body>
</html>
@extends('layouts.user')


@section('panel_content')

<?php
$Jdf=new \App\lib\Jdf();
?>
    <table class="table table-bordered user_table table-striped">

        <tr>
            <th>ردیف</th>
            <th>کد</th>
            <th>تاریخ</th>
            <th>مبلغ کل</th>
            <th>عملیات پرداخت</th>
            <th>جزئیات</th>
        </tr>
        <?php
        $i=1;
        ?>
        @foreach($orders as $order)

            <tr>
                <td>{{ $i  }}</td>
                <td style="color:deepskyblue;">{{ $order->create_order_code($order->time) }}</td>
                <td>
                    {{ $Jdf->tr_num($Jdf->jdate('Y-m-d',$order->time)) }}
                    {{ $Jdf->tr_num($Jdf->jdate('H:i:s',$order->time)) }}</td>

                <td style="color:#4CAF50">{{ number_format($order->price) }} تومان</td>
                <td style="color:red">@if($order->pay_status==1)
                        <span>پرداخت شده</span>
                    @else
                        <span style="color:red">در انتظار پرداخت</span>
                    @endif</td>
                <td>
                   <a href="{{ url('user/order?id=').$order->id  }}"> <span class="fa fa-eye"></span></a>
                </td>
            </tr>
            <?php $i++ ?>
        @endforeach
    </table>

    {{ $orders->links() }}

@endsection
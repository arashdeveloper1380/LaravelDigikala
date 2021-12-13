@extends('layouts/admin')

@section('header')
    <title>{{ $user->username }}</title>
@endsection


@section('content')

    <div class="box_title">
        <span>{{ $user->username }}</span>
    </div>

    <div style="width:95%;margin:auto">

        <?php
        $Jdf=new \App\lib\Jdf();
        $e=explode(' ',$user->created_at);
        $e2=explode('-',$e[0]);
        $date=$Jdf->tr_num($Jdf->gregorian_to_jalali($e2[0],$e2[1],$e2[2],'-'));
        ?>

        <a href="{{ url('admin/user').'/'.$user->id.'/edit' }}" class="btn btn-primary">ویرایش</a>
       <a  onclick="del_row('<?= $user->id ?>','<?= url('admin/user') ?>','<?= Session::token() ?>')" class="btn btn-danger">حذف کاربر</a>

        <table class="table  table-striped table-bordered">
            <tr>
                <td>نام کاربری</td>
                <td>{{ $user->username }}</td>
            </tr>
            <tr>
                <td>تاریخ عضویت</td>
                <td>{{ $date }}</td>
            </tr>
            <tr>
                <td>نقش کاربری</td>
                <td>  @if($user->role=='admin')
                        مدیر
                    @else
                        کاربر عادی
                    @endif</td>
            </tr>

            <tr>
                <td>مجموع خرید کاربر</td>
                <td>{{ number_format($total_price) }} تومان</td>
            </tr>
        </table>

        <p style="color:red;padding-top:20px;padding-bottom:15px">سفارش های کاربر</p>


            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>شماره سفارش</th>
                    <th>نام کاربری</th>
                    <th>زمان خرید</th>
                    <th>مبلغ سفارش</th>
                    <th>وضعیت پرداخت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <?php $i=1; $Jdf=new \App\lib\Jdf(); ?>
                @foreach($order as $key=>$value)

                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $value->order_id }}</td>
                        <td>{{ $value->get_user->username }}</td>
                        <td>{{ $Jdf->tr_num($Jdf->jdate('Y-m-d',$value->time)) }}- {{ $Jdf->tr_num($Jdf->jdate('H:i:s',$value->time)) }}</td>
                        <td>{{ number_format($value->price) }} تومان</td>
                        <td>
                            @if($value->pay_status==1)
                                <span>پرداخت شده</span>
                            @else
                                <span style="color:red">در انتظار پرداخت</span>
                            @endif
                        </td>
                        <td>
                            <a style="color: #368bff" href="{{ url('admin/order').'/'.$value->id }}"><span class="fa fa-eye"></span></a>
                            <a style="color:red;cursor:pointer;padding-right:5px" onclick="del_row('<?= $value->id ?>','<?= url('admin/order') ?>','<?= Session::token() ?>')">
                                <span class="fa fa-trash"></span>
                            </a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                @endforeach

                @if(sizeof($order)==0)
                    <tr>
                        <td colspan="7">
                            رکوردی یافت نشد
                        </td>
                    </tr>
                @endif

            </table>

    </div>

@endsection
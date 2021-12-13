@extends('layouts/admin')
@section('header')
    <title>مدیریت سفارشات</title>
@endsection
@section('style')
    <link href="{{ url('css/js-persian-cal.css') }}" rel="stylesheet">
@endsection
@section('content')

    <div class="box_title">
        <span>مدیریت سفارشات</span>
    </div>


    <form class="order_search" method="get">
        <div class="form-group">
            <label>شماره سفارش : </label>
            <input type="text" value="@if(array_key_exists('order_id',$search_data)){{ $search_data['order_id'] }}@endif" name="order_id" class="form-control">
        </div>

        <div class="form-group">
            <label for="pcal4">شروع از تاریخ : </label>
            <input value="@if(array_key_exists('first_date',$search_data)){{ $search_data['first_date'] }}@endif" type="text" name="first_date" id="pcal4" class="pdate form-control">
        </div>

        <div class="form-group">
            <label for="pcal5">تا تاریخ</label>
            <input value="@if(array_key_exists('end_date',$search_data)){{ $search_data['end_date'] }}@endif" type="text" name="end_date" id="pcal5" class="pdate form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">جست و جو</button>
        </div>
    </form>

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
                <td>{{ $Jdf->tr_num($Jdf->jdate('Y-m-d',$value->time)) }} {{ $Jdf->tr_num($Jdf->jdate('H:i:s',$value->time)) }}</td>
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

    </table>

    {{ $order->links() }}

@endsection

@section('footer')
    <script type="text/javascript" src="{{ url('js/js-persian-cal.min.js') }}"></script>
    <script type="text/javascript">
        var objCal4 = new AMIB.persianCalendar( 'pcal4');
        var objCal5 = new AMIB.persianCalendar( 'pcal5');
    </script>
@endsection
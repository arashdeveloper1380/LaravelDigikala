@extends('layouts/admin')
@section('header')
    <title>مدیریت تخفیف ها</title>
@endsection

@section('content')

    <div class="box_title">
        <span>مدیریت تخفیف ها</span>
    </div>

    <div>
        <a href="{{ url('admin/order/discount/create') }}" class="btn btn-success">ثبت کد تخفیف</a>
  <table class="table table-striped table-bordered">
      <thead>
      <tr>
          <th>ردیف</th>
          <th>کد تخفیف </th>
          <th>مقدار تخفیف</th>
          <th>تخفیف برای</th>
          <th>عملیات</th>
      </tr>
      </thead>

      <?php

      $price_list=[];
      $price_list[0]='برای تمام سفارش ها';
      $price_list[1]='برای سفارش های بالای 200 هزار تومان';
      $price_list[2]='برای سفارش های بالای 500 هزار تومان';
      $price_list[3]='برای سفارش های بالای یک میلیون تومان';
      $price_list[4]='برای سفارش های بالای دو میلیون تومان';
      $price_list[5]='برای سفارش های بالای سه میلیون تومان';
      $price_list[6]='برای سفارش های بالای چهار میلیون تومان';
      $price_list[7]='برای سفارش های بالای پنج میلیون تومان';
      ?>

      <?php $i=1; ?>
    @foreach($discount as $key=>$value)

        <tr>
            <td>{{ $i }}</td>
            <td>{{ $value->code }}</td>
            <td>{{ $value->value }}</td>
            <td>{{ $price_list[$value->price] }}</td>
            <td>
                <a style="color: #368bff" href="{{ url('admin/order/discount').'/'.$value->id.'/edit' }}"><span class="fa fa-edit"></span></a>
                <a style="color:red;cursor:pointer;padding-right:5px" onclick="del_row('<?= $value->id ?>','<?= url('admin/order/discount') ?>','<?= Session::token() ?>')">
                    <span class="fa fa-trash"></span>
                </a>
            </td>
        </tr>
        <?php $i++; ?>
    @endforeach

      @if(sizeof($discount)==0)
      <tr>
          <td colspan="5">رکوردی یافت نشد</td>
      </tr>
      @endif
  </table>

        {{ $discount->links() }}
    </div>
@endsection

@section('footer')

@endsection
@extends('layouts.user')


@section('panel_content')

<?php
$Jdf=new \App\lib\Jdf();
?>
  <table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>ردیف</th>
        <th>کد کارت</th>
        <th>مبلغ هدیه</th>
        <th>مبلغ استفاده شده</th>
        <th>معتبر تا تاریخ</th>
        <th>وضعیت</th>
    </tr>
    </thead>


    <?php $i=1; ?>
    @foreach($gift_cart as $key=>$value)

        <tr>
            <td>{{ $i }}</td>
            <td>{{ $value->code }}</td>
            <td>{{ number_format($value->value).' تومان' }}</td>

            <td>
                <span class="alert alert-success">
                    {{ number_format($value->value2).' تومان' }}
                </span>
            </td>
            <td>{{ $value->date }}</td>
            <td>
                @if($value->status==0)
                    استفاده نشده
                @else
                    استفاده شده
               @endif
            </td>

        </tr>
        <?php $i++; ?>
    @endforeach

    @if(sizeof($gift_cart)==0)
        <tr>
            <td colspan="5">رکوردی یافت نشد</td>
        </tr>
    @endif
</table>

    {{ $gift_cart->links() }}

@endsection
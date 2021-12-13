@extends('layouts/admin')
@section('header')
    <title>مدیریت تخفیف ها</title>
@endsection

@section('content')

    <div class="box_title">
        <span>مدیریت تخفیف ها</span>
    </div>

    <div>
        <a href="{{ url('admin/order/gift_cart/create') }}" class="btn btn-success">ثبت کارت هدیه</a>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>کد کارت</th>
                <th>مبلغ هدیه</th>
                <th>کاربر</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
            </thead>


            <?php $i=1; ?>
            @foreach($gift_cart as $key=>$value)

                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $value->code }}</td>
                    <td>{{ $value->value }}</td>
                    <td>{{ $value->get_user->username }}</td>
                    <td>
                        @if($value->status==0)
                            استفاده نشده
                        @else
                            استفاده شده
                        @endif
                    </td>
                    <td>
                        <a style="color: #368bff" href="{{ url('admin/order/gift_cart').'/'.$value->id.'/edit' }}"><span class="fa fa-edit"></span></a>
                        <a style="color:red;cursor:pointer;padding-right:5px" onclick="del_row('<?= $value->id ?>','<?= url('admin/order/gift_cart') ?>','<?= Session::token() ?>')">
                            <span class="fa fa-trash"></span>
                        </a>
                    </td>

                </tr>
                <?php $i++; ?>
            @endforeach

            @if(sizeof($gift_cart)==0)
                <tr>
                    <td colspan="6">رکوردی یافت نشد</td>
                </tr>
            @endif
        </table>

        {{ $gift_cart->links() }}
    </div>
@endsection

@section('footer')

@endsection
@extends('layouts/admin')
@section('header')
    <title>مدیریت گارانتی ها</title>
@endsection

@section('content')

    <div class="box_title">
        <span>مدیریت گارانتی ها  - {{ $product->title }}</span>
    </div>

    <a class="btn btn-success" href="{{ url('admin/service/create?product_id=').$product->id }}">افزودن گارانتی</a>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ردیف</th>
            <th>نام گرانتی</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <?php $i=1; ?>

        @foreach($service as $key=>$value)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $value->service_name }}</td>
                <td>
                    <a class="fa fa-eye" href="{{ url('admin/service/'.$value->id.'?product_id='.$product->id) }}"></a>
                    <a style="color: #368bff" href="{{ url('admin/service').'/'.$value->id.'/edit?product_id='.$product->id }}"><span class="fa fa-edit"></span></a>
                    <a style="color:red;cursor:pointer;padding-right:5px" onclick="del_row('<?= $value->id ?>','<?= url('admin/service') ?>','<?= Session::token() ?>')">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>
            <?php $i++ ?>
        @endforeach
    </table>

    {{ $service->appends(['product_id'=>$product->id]) }}

@endsection
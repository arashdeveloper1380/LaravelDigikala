@extends('layouts.admin')

@section('header')
    <title>مدیریت پشنهاد شگفت انگیز</title>
@endsection

@section('content')

    <div class="box_title">
        <span>مدیریت پشنهاد شگفت انگیز</span>
    </div>

    <div>
        <a href="{{ url('admin/amazing/create') }}" class="btn btn-success">افزودن پشنهاد شگفت انگیز</a>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>عنوان</th>
                <th>عنوانک</th>
                <th>هزینه اصلی محصول</th>
                <th>هزینه با تخفیف</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <?php $i=1; ?>
            @foreach($amazing as $key=>$value)

                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->m_title }}</td>
                    <td>{{ number_format($value->price1) }} تومان</td>
                    <td>{{ number_format($value->price2) }} تومان</td>
                    <td>
                        <a style="color: #368bff" href="{{ url('admin/amazing').'/'.$value->id.'/edit' }}"><span class="fa fa-edit"></span></a>
                        <a style="color:red;cursor:pointer;padding-right:5px" onclick="del_row('<?= $value->id ?>','<?= url('admin/amazing') ?>','<?= Session::token() ?>')">
                            <span class="fa fa-trash"></span>
                        </a>
                    </td>
                </tr>
                <?php $i++ ?>
            @endforeach

        </table>
    </div>
@endsection
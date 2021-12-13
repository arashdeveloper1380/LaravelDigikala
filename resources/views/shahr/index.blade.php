@extends('layouts/admin')

@section('header')
    <title>مدیریت شهر ها</title>
@endsection

@section('content')

    <div class="box_title">
        <span>مدیریت شهر ها</span>
    </div>

    <div>
        <a href="{{ url('admin/shahr/create') }}" class="btn btn-success">افزودن شهر</a>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام شهر</th>
                    <th>نام استان</th>
                    <th>عملیات</th>
                </tr>
                </thead>



                <?php $i=1; ?>
                @foreach($shahr as $key=>$value)

                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $value->shahr_name }}</td>

                        <td>{{ $value->get_ostan_name->ostan_name }}</td>
                        <td>
                            <a style="color: #368bff" href="{{ url('admin/shahr').'/'.$value->id.'/edit' }}"><span class="fa fa-edit"></span></a>
                            <a style="color:red;cursor:pointer;padding-right:5px" onclick="del_row('<?= $value->id ?>','<?= url('admin/shahr') ?>','<?= Session::token() ?>')">
                                <span class="fa fa-trash"></span>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach

                @if(sizeof($shahr)==0)
                    <tr>
                        <td colspan="3">رکوردی یافت نشد</td>
                    </tr>
                @endif
            </table>
        {{ $shahr->links() }}
    </div>
@endsection

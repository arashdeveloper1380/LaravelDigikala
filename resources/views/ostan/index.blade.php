@extends('layouts/admin')

@section('header')
    <title>مدیریت استان ها</title>
@endsection

@section('content')

    <div class="box_title">
        <span>مدیریت استان ها</span>
    </div>

    <div>
        <a href="{{ url('admin/ostan/create') }}" class="btn btn-success">افزودن استان</a>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام استان</th>
                    <th>عملیات</th>
                </tr>
                </thead>



                <?php $i=1; ?>
                @foreach($ostan as $key=>$value)

                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $value->ostan_name }}</td>


                        <td>
                            <a style="color: #368bff" href="{{ url('admin/ostan').'/'.$value->id.'/edit' }}"><span class="fa fa-edit"></span></a>
                            <a style="color:red;cursor:pointer;padding-right:5px" onclick="del_row('<?= $value->id ?>','<?= url('admin/ostan') ?>','<?= Session::token() ?>')">
                                <span class="fa fa-trash"></span>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach

                @if(sizeof($ostan)==0)
                    <tr>
                        <td colspan="3">رکوردی یافت نشد</td>
                    </tr>
                @endif
            </table>
        {{ $ostan->links() }}
    </div>
@endsection

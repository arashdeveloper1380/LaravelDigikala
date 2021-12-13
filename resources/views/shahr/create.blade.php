@extends('layouts/admin')

@section('style')
    <link href="{{ url('css/bootstrap-select.css') }}" rel="stylesheet" >
@endsection

@section('header')
    <title>افزودن شهر</title>
@endsection

@section('content')

    <div class="box_title" >
        <span>افزودن شهر</span>
    </div>

    {!! Form::open(['url'=>'admin/shahr']) !!}

    <div class="form-group">
        {!! Form::label('shahr_name','نام شهر : ') !!}
        {!! Form::text('shahr_name',null,['class'=>'form-control']) !!}
        @if($errors->has('shahr_name'))
            <span style="color:red;font-size:13px">{{ $errors->first('shahr_name') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('parent_id','انتخاب استان : ') !!}
        {!! Form::select('parent_id',$ostan,null,['class'=>'selectpicker','data-live-search'=>'true']) !!}
        @if($errors->has('parent_id'))
            <span style="color:red;font-size:13px">{{ $errors->first('parent_id') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit('ثبت',['class'=>'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}


@endsection


@section('footer')

<script type="text/javascript" src="{{ url('js/bootstrap-select.js') }}"></script>
<script type="text/javascript" src="{{ url('js/defaults-fa_IR.js') }}"></script>

@endsection
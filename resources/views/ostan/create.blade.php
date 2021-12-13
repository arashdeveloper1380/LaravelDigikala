@extends('layouts/admin')

@section('header')
    <title>افزودن استان</title>
@endsection

@section('content')

    <div class="box_title" >
        <span>افزودن استان</span>
    </div>

    {!! Form::open(['url'=>'admin/ostan']) !!}

    <div class="form-group">
        {!! Form::label('ostan_name','نام استان : ') !!}
        {!! Form::text('ostan_name',null,['class'=>'form-control']) !!}
        @if($errors->has('ostan_name'))
            <span style="color:red;font-size:13px">{{ $errors->first('ostan_name') }}</span>
        @endif
    </div>


    <div class="form-group">
        {!! Form::submit('ثبت',['class'=>'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}


@endsection
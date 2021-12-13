@extends('layouts/admin')
@section('header')
    <title>افزودن گارانتی</title>
@endsection

@section('content')

    <div class="box_title" >
        <span>افزودن گارانتی - {{ $product->title }}</span>
    </div>

    {!! Form::open(['url'=>'admin/service?product_id='.$product->id]) !!}
    <div class="form-group">
        {!! Form::label('service_name','نام گارانتی : ') !!}
        {!! Form::text('service_name',null,['class'=>'form-control']) !!}
        @if($errors->has('service_name'))
            <span style="color:red;font-size:13px">{{ $errors->first('service_name') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit('ثبت',['class'=>'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}


@endsection
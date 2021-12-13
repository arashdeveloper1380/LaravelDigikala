@extends('layouts/admin')
@section('header')
    <title>ویرایش گارانتی</title>
@endsection

@section('content')

    <div class="box_title" >
        <span>ویرایش گارانتی - {{ $product->title }}</span>
    </div>

    <p style="color:red;padding-right:30px">
        {{ Session::get('message') }}
    </p>
    {!! Form::model($service,['url'=>'admin/service/'.$service->id.'?product_id='.$product->id]) !!}
   {{ method_field('PUT') }}
    <div class="form-group">
        {!! Form::label('service_name','نام گارانتی : ') !!}
        {!! Form::text('service_name',null,['class'=>'form-control']) !!}
        @if($errors->has('service_name'))
            <span style="color:red;font-size:13px">{{ $errors->first('service_name') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit('ویرایش',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}


@endsection
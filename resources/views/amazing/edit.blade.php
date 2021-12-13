@extends('layouts.admin')

@section('header')
    <title>ویرایش پشنهاد شگفت انگیز</title>
@endsection

@section('content')
    <div class="box_title">
        <span>ویرایش پشنهاد شگفت انگیز - {{ $Amazing->title }}</span>
    </div>

    {!! Form::model($Amazing,['url'=>'admin/amazing'.'/'.$Amazing->id]) !!}
    {{ method_field('PUT') }}
    <div class="form-group">
        {!! Form::label('m_title','عنوانک : ') !!}
        {!! Form::text('m_title',null,['class'=>'form-control']) !!}
        @if($errors->has('m_title'))
            <span style="color:red;font-size:13px">{{ $errors->first('m_title') }}</span>
        @endif
    </div>


    <div class="form-group">
        {!! Form::label('title','عنوان : ') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
        @if($errors->has('title'))
            <span style="color:red;font-size:13px">{{ $errors->first('title') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('tozihat','توضیحات : ') !!}
        {!! Form::textArea('tozihat',null,['class'=>'form-control','style'=>'height:150px;']) !!}
        @if($errors->has('tozihat'))
            <span style="color:red;font-size:13px">{{ $errors->first('tozihat') }}</span>
        @endif
    </div>



    <div class="form-group">
        {!! Form::label('price1','هزینه اصلی محصول : ') !!}
        {!! Form::text('price1',null,['class'=>'form-control']) !!}
        @if($errors->has('price1'))
            <span style="color:red;font-size:13px">{{ $errors->first('price1') }}</span>
        @endif
    </div>


    <div class="form-group">
        {!! Form::label('price2','هزینه محصول با تخفیف : ') !!}
        {!! Form::text('price2',null,['class'=>'form-control']) !!}
        @if($errors->has('price2'))
            <span style="color:red;font-size:13px">{{ $errors->first('price2') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('time','مدت زمان شگفت انگیز بودن : ') !!}
        {!! Form::text('time',null,['class'=>'form-control','placeholder'=>'مدت زمان بر حسب ساعت']) !!}
        @if($errors->has('time'))
            <span style="color:red;font-size:13px">{{ $errors->first('time') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('product_id','شناسه محصول : ') !!}
        {!! Form::text('product_id',null,['class'=>'form-control']) !!}
        @if($errors->has('product_id'))
            <span style="color:red;font-size:13px">{{ $errors->first('product_id') }}</span>
        @endif
    </div>

    <div class="form-group" >

        {!! Form::submit('ویرایش',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection
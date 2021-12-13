@extends('layouts/admin')

@section('style')
    <link href="{{ url('css/bootstrap-select.css') }}" rel="stylesheet" >
@endsection
@section('header')
    <title>ویرایش کد تخفیف</title>
@endsection

@section('content')

    <div class="box_title" >
        <span>ویرایش کد تخفیف</span>
    </div>

    {!! Form::model($discount,['url'=>'admin/order/discount/'.$discount->id]) !!}

    {{ method_field('PUT') }}
    <div class="form-group">
        {!! Form::label('code','کد تخفیف : ') !!}
        {!! Form::text('code',null,['class'=>'form-control']) !!}
        @if($errors->has('code'))
            <span style="color:red;font-size:13px">{{ $errors->first('code') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('value','مقدار تخفیف بر حسب درصد : ') !!}
        {!! Form::text('value',null,['class'=>'form-control']) !!}
        @if($errors->has('value'))
            <span style="color:red;font-size:13px">{{ $errors->first('value') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('code_time','مدت زمان تخفیف : ') !!}
        {!! Form::text('code_time',null,['class'=>'form-control']) !!}
    </div>

    <?php

    $price_list=[];
    $price_list[0]='برای تمام سفارش ها';
    $price_list[1]='برای سفارش های بالای 200 هزار تومان';
    $price_list[2]='برای سفارش های بالای 500 هزار تومان';
    $price_list[3]='برای سفارش های بالای یک میلیون تومان';
    $price_list[4]='برای سفارش های بالای دو میلیون تومان';
    $price_list[5]='برای سفارش های بالای سه میلیون تومان';
    $price_list[6]='برای سفارش های بالای چهار میلیون تومان';
    $price_list[7]='برای سفارش های بالای پنج میلیون تومان';
    ?>

    <div class="form-group">
        {!! Form::label('price','تخفیف برای : ') !!}
        {!! Form::select('price',$price_list,null,['class'=>'selectpicker','data-live-search'=>'true']) !!}
    </div>

    <div class="form-group">
        @if($errors->has('pic'))
            <span style="color:red;font-size:13px">{{ $errors->first('pic') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit('ویرایش',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}


@endsection


@section('footer')
<script type="text/javascript" src="{{ url('js/bootstrap-select.js') }}"></script>
<script type="text/javascript" src="{{ url('js/defaults-fa_IR.js') }}"></script>
@endsection

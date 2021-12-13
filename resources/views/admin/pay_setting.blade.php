@extends('layouts/admin')

@section('header')
    <title>تنظیمات پرداخت</title>
@endsection


@section('content')

    <div class="box_title">
        <span>تنظیمات پرداخت</span>
    </div>


    {!! Form::open(['url'=>'admin/setting/pay']) !!}


    <div class="form-group">
        <p style="color:red">تنظیمات اتصال به درگاه بانک ملت</p>
    </div>
    <div class="form-group">
        {!! Form::label('TerminalId','ترمینال ای دی بانک ملت : ') !!}
        {!! Form::text('TerminalId',$TerminalId,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Username','نام کاربری : ') !!}
        {!! Form::text('Username',$Username,['class'=>'form-control']) !!}

    </div>

    <div class="form-group">
        {!! Form::label('Password','کلمه عبور : ') !!}
        {!! Form::text('Password',$Password,['class'=>'form-control']) !!}

    </div>

    <div class="form-group">
        <p style="color:red">تنظیمات اتصال به زرین پال</p>
    </div>

    <div class="form-group">
        {!! Form::label('MerchantID','MerchantID : ') !!}
        {!! Form::text('MerchantID',$MerchantID,['class'=>'form-control']) !!}

    </div>

    <div class="form-group">
        {!! Form::submit('ثبت',['class'=>'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}

@endsection

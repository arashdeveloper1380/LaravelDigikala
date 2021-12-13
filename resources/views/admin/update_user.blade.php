@extends('layouts/admin')

@section('header')
    <title>ویرایش کاربر</title>
@endsection
@section('style')
    <link href="{{ url('css/bootstrap-select.css') }}" rel="stylesheet" >
@endsection

@section('content')

    <div class="box_title">
        <span>ویرایش کاربر - {{ $user->username }}</span>
    </div>


    {!! Form::model($user,['url'=>'admin/user/'.$user->id]) !!}

    {{ method_field('PUT') }}

    <div class="form-group">
        {!! Form::label('username','نام کاربری : ') !!}
        {!! Form::text('username',null,['class'=>'form-control']) !!}
        @if($errors->has('username'))
            <span style="color:red;font-size:13px">{{ $errors->first('username') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('password','کلمه عبور : ') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
        @if($errors->has('password'))
            <span style="color:red;font-size:13px">{{ $errors->first('password') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('role','نقش کاربری  : ') !!}
        {!! Form::select('role',['user'=>'کاربر عادی','admin'=>'مدیر'],null,['class'=>'selectpicker']) !!}
        @if($errors->has('role'))
            <span style="color:red;font-size:13px">{{ $errors->first('role') }}</span>
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
@extends('layouts/admin')

@section('header')
    <title>ویرایش نام استان</title>
@endsection

@section('content')

    <div class="box_title" >
        <span>ویرایش نام استان - {{ $ostan->ostan_name }}</span>
    </div>

    {!! Form::model($ostan,['url'=>'admin/ostan/'.$ostan->id]) !!}

    <p style="color:red;font-size:13px;padding-right:30px">{{ Session::get('status') }}</p>
    {{ method_field('PUT') }}
    <div class="form-group">
        {!! Form::label('ostan_name','نام استان : ') !!}
        {!! Form::text('ostan_name',null,['class'=>'form-control']) !!}
        @if($errors->has('ostan_name'))
            <span style="color:red;font-size:13px">{{ $errors->first('ostan_name') }}</span>
        @endif
    </div>


    <div class="form-group">
        {!! Form::submit('ویرایش',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}


@endsection
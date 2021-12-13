@extends('layouts/admin')


@section('header')
    <title>افزودن اسلایدر</title>
@endsection

@section('content')

    <div class="box_title">
        <span>افزودن اسلایدر</span>
    </div>

    {!! Form::open(['url'=>'admin/slider','files'=>'true']) !!}

    <div class="form-group">
        {!! Form::label('title','عنوان اسلایدر : ') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
        @if($errors->has('title'))
        <span style="color:red;font-size:13px">{{ $errors->first('title') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('url','آدرس اسلایدر : ') !!}
        {!! Form::text('url',null,['class'=>'form-control','style'=>'text-align:left']) !!}
        @if($errors->has('url'))
            <span style="color:red;font-size:13px">{{ $errors->first('url') }}</span>
        @endif
    </div>



    <div class="form-group">
        <input type="file" name="pic" id="pic" onchange="loadFile(event)" style="display:none">
        {!! Form::label('pic','انتخاب تصویر : ') !!}
        <img src="{{ url('images/pic_1.jpg') }}" id="output" width="150" onclick="select_file()">

    </div>

    <div class="form-group">
        @if($errors->has('pic'))
            <span style="color:red;font-size:13px">{{ $errors->first('pic') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit('ثبت',['class'=>'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}


@endsection


@section('footer')
<script>
select_file=function ()
{
   document.getElementById('pic').click();
};
loadFile=function (event)
{
    var render=new FileReader;
    render.onload=function ()
    {
        var output=document.getElementById('output');
        output.src=render.result;
    };
    render.readAsDataURL(event.target.files[0]);
}
</script>
@endsection

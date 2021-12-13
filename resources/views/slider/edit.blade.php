@extends('layouts/admin')


@section('header')
    <title>ویرایش اسلایدر</title>
@endsection

@section('content')

    <div class="box_title">
        <span>ویرایش اسلایدر  - {{ $slider->title }}</span>
    </div>

    {!! Form::model($slider,['url'=>'admin/slider/'.$slider->id,'files'=>'true']) !!}

    {{ method_field('PUT') }}
    <div class="form-group">
        {!! Form::label('title','عنوان اسلایدر : ') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
        @if($errors->has('title'))
        <span style="color:red;font-size:13px">{{ $errors->first('title') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('url','آدرس اسلایدر : ') !!}
        {!! Form::text('url',null,['class'=>'form-control']) !!}
        @if($errors->has('url'))
            <span style="color:red;font-size:13px">{{ $errors->first('url') }}</span>
        @endif
    </div>



    <div class="form-group">
        <input type="file" name="pic" id="pic" onchange="loadFile(event)" style="display:none">
        {!! Form::label('pic','انتخاب تصویر : ') !!}
        @if(!empty($slider->img))
            <img src="{{ url('upload').'/'.$slider->img }}" id="output" width="150" onclick="select_file()">

        @else
            <img src="{{ url('images/pic_1.jpg') }}" id="output" width="150" onclick="select_file()">
        @endif

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

@extends('layouts/admin')

@section('style')
    <link href="{{ url('css/bootstrap-select.css') }}" rel="stylesheet" >
@endsection
@section('header')
    <title>ویرایش دسته</title>
@endsection

@section('content')

    <div class="box_title">
        <span>ویرایش دسته  - {{ $Category->cat_name }}</span>
    </div>

    {!! Form::model($Category,['url'=>'admin/category/'.$Category->id,'files'=>'true']) !!}

    {{ method_field('PUT') }}
    <div class="form-group">
        {!! Form::label('cat_name','نام دسته : ') !!}
        {!! Form::text('cat_name',null,['class'=>'form-control']) !!}
        @if($errors->has('cat_name'))
        <span style="color:red;font-size:13px">{{ $errors->first('cat_name') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('cat_ename','نام لاتین دسته : ') !!}
        {!! Form::text('cat_ename',null,['class'=>'form-control']) !!}
        @if($errors->has('cat_ename'))
            <span style="color:red;font-size:13px">{{ $errors->first('cat_ename') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('parent_id','انتخاب سر دسته : ') !!}
        {!! Form::select('parent_id',$cat_list,null,['class'=>'selectpicker','data-live-search'=>'true']) !!}
        @if($errors->has('parent_id'))
            <span style="color:red;font-size:13px">{{ $errors->first('parent_id') }}</span>
        @endif
    </div>

    <div class="form-group">
        <input type="file" name="pic" id="pic" onchange="loadFile(event)" style="display:none">
        {!! Form::label('pic','انتخاب تصویر : ') !!}
        @if(!empty($Category->img))
            <img src="{{ url('upload').'/'.$Category->img }}" id="output" width="150" onclick="select_file()">
            <br>
            <p style="color:red;padding-right:160px;padding-top:10px;cursor:pointer" onclick="del_img('<?= $Category->id ?>','<?= url('admin/category/del_img') ?>','<?= Session::token() ?>')">حذف تصویر</p>
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

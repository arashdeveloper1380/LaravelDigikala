@extends('layouts.admin')
@section('style')
    <link href="{{ url('css/bootstrap-select.css') }}" rel="stylesheet" >
@endsection
@section('header')
    <style>
        .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
            width:65%;
        }
        .bootstrap-select.btn-group .dropdown-toggle .caret
        {
            right: 95%;
        }
    </style>
    <title>افزودن فیلتر محصولات</title>
@endsection

@section('content')

    <div class="box_title">
        <span>افزودن فیلتر محصولات</span>
    </div>

    @if(isset($id))
        {!! Form::open(['url'=>'admin/filter?id='.$id,'files'=>'true']) !!}
    @endif

    <div class="form-group">
        {!! Form::label('cat_id','انتخاب سر دسته : ') !!}
        {!! Form::select('cat[]',$cat_list,$id,['class'=>'selectpicker','data-live-search'=>'true','id'=>'cat_list','onchange'=>'get_filter()']) !!}

    </div>

    <div class="form-group" id="filter_box">


        @foreach($filter as $key=>$value)

            <div id="filter_div_{{ $value->id }}" style="width:100%;float:right;margin-top:10px;margin-bottom:5px" class="product_filter_div">
                <input value="{{ $value->name }}" type="text" name="filter_name[{{ $value->id }}]" class="form-control" style="float: right;" placeholder="نام فیلتر ...">
                <input value="{{ $value->ename }}" type="text" name="filter_ename[{{ $value->id }}]" class="form-control" style="float: right;" placeholder="نام لاتین فیلتر ...">
                <select id="filter_filed_{{ $value->id }}" name="filter_filed[{{ $value->id }}]" class="form-control" style="float:right;margin-right:10px">
                    <option @if($value->filed==1) selected="selected" @endif value="1">فیلد radio</option>
                    <option @if($value->filed==2) selected="selected" @endif value="2">فیلد color</option></select>

                 @foreach($value->get_child as $key2=>$value2)
                    <div class="child_filter" id="child_filter_{{ $value2->id }}">

                     @if($value->filed==1)

                      <input type="text" value="{{ $value2->name }}" class="color_input_name" name="filter_child[{{ $value->id }}][{{ $value2->id }}]"/>

                     @else
                         <?php

                                $color=explode('@',$value2->name);

                         ?>
                      <input type="text" value="{{$color[0] }}" class="color_input_name" name="filter_child[{{ $value->id }}][{{ $value2->id }}]"/>
                      <input type="text" value="{{$color[1] }}" class="jscolor color_input_code" name="filter_color[{{ $value->id }}][{{ $value2->id }}]"/>

                      @endif
                    </div>
                 @endforeach
            </div>
            <div class="form-group" style="margin-right:0px;margin-bottom:0px;">
                <span class="fa fa-plus" style="color:red;cursor:pointer;padding-top:15px" onclick="add_child_filter('filter_div_{{ $value->id }}','{{ $value->id }}','child_filter_')"></span>
                </div>


        @endforeach

    </div>

    @if(isset($id))

        <div class="form-group">

            <span class="fa fa-plus" style="color:red;cursor:pointer;padding-top:15px" onclick="add_filter()"></span>

        </div>

        <div class="form-group">
            {!! Form::submit('ثبت',['class'=>'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}

    @endif

@endsection

@section('footer')
<script type="text/javascript" src="{{ url('js/bootstrap-select.js') }}"></script>
<script type="text/javascript" src="{{ url('js/defaults-fa_IR.js') }}"></script>
<script type="text/javascript" src="{{ url('js/jscolor.js') }}"></script>
<script>
 get_filter=function ()
 {
      var cat_id=document.getElementById('cat_list').value;
      window.location='<?= url('admin/filter') ?>?id='+cat_id;
 };
</script>
@endsection
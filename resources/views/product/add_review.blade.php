@extends('layouts/admin')

@section('style')
    <link href="{{ url('css/dropzone.css') }}" rel="stylesheet">
@endsection

@section('header')
    <title>افزودن نقد و بررسی تخصصی</title>
@endsection

@section('content')
    <div class="box_title">
        <span>نقد و بررسی تخصصی - {{ $product->title }}</span>
    </div>
    {!! Form::open(['url'=>'admin/product/add_review']) !!}
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <div class="form-group">
        <?php

        $tozihat=$review ? $review->review_tozihat : null;
        ?>
        {!! Form::textArea('review_tozihat',$tozihat,['class'=>'ckeditor']) !!}
        @if($errors->has('review_tozihat'))
            <span style="color:red;font-size:13px">{{ $errors->first('review_tozihat') }}</span>
        @endif
    </div>

    <div style="width:92%;margin:auto">
        <p>start_review</p>
        <p>start_item</p>
        <p>end_item</p>
    </div>
    <div class="form-group">
        {!! Form::submit('ثبت',['class'=>'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}

    <div class="box_title">
        <span>افزودن تصاویر لازم برای نقد و بررسی</span>
    </div>
    <div style="width:92%;margin:auto">
        <form method="post" id="upload-file" action="{{ url('admin/product/upload?id='.$product->id) }}" class="dropzone">

            {{ csrf_field() }}
            <input type="hidden" name="type" value="review">
            <input name="file" type="file" multiple style="display:none" />
        </form>
    </div>



    @if(sizeof($image)>0)


        <div id="show_product_image">
            <img src="{{ url('upload').'/'.$image[0]->url }}" onclick="del_img('{{ $image[0]->id }}','{{ url('admin/product/del_product_img') }}','<?= Session::token() ?>')">
        </div>
        <p style="text-align:center;padding-top:10px" id="img_url"></p>

    @endif



        @foreach($image as $key=>$value)

            <div class="img_review_box">
                <img src="{{ url('upload').'/'.$value->url }}" onclick="show_img('{{ url('upload').'/'.$value->url }}','{{ $value->id }}','<?= Session::token() ?>')">

            </div>

        @endforeach


@endsection

@section('footer')
<script type="text/javascript" src="{{ url('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ url('js/dropzone.js') }}"></script>
<script>
    Dropzone.options.uploadFile={

        acceptedFiles:".png,.jpg,.gif,.jpeg",
        addRemoveLinks:true,
        init:function() {

            this.options.dictRemoveFile='حذف',
                this.options.dictInvalidFileType='امکان آپلود این فایل وجود ندارد',
                this.on('success',function(file,response) {
                    if(response==1)
                    {
                        file.previewElement.classList.add('dz-success');
                    }
                    else
                    {
                        file.previewElement.classList.add('dz-error');
                        $(file.previewElement).find('.dz-error-message').text('خطا در آپلود فایل');
                    }
                });

        }
    };
    show_img=function (url,id,token)
    {
        var url2="'"+'<?= url('admin/product/del_review_img') ?>'+"'";
        var token2="'"+token+"'";
        var img='<img src='+url+' onclick="del_img('+id+','+url2+','+token2+')" />';
        $("#img_url").html(url);
        $("#show_product_image").html(img);
    }
</script>
@endsection
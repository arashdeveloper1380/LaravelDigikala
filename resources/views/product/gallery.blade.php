@extends('layouts/admin')

@section('style')
<link href="{{ url('css/dropzone.css') }}" rel="stylesheet">
@endsection
@section('header')
    <title>گالری تصاویر</title>
@endsection
@section('content')
    <div class="box_title">
        <span>گالری تصاویر - {{ $product->title }}</span>
    </div>

    <form method="post" id="upload-file" action="{{ url('admin/product/upload?id='.$product->id) }}" class="dropzone">

        {{ csrf_field() }}
        <input name="file" type="file" multiple style="display:none" />
    </form>



    @if(sizeof($image)>0)


        <div id="show_product_image">
            <img src="{{ url('upload').'/'.$image[0]->url }}" onclick="del_img('{{ $image[0]->id }}','{{ url('admin/product/del_product_img') }}','<?= Session::token() ?>')">
        </div>

    @endif


    <div id="image_product_box">
        @foreach($image as $key=>$value)

            <img src="{{ url('upload').'/'.$value->url }}" onclick="show_img('{{ url('upload').'/'.$value->url }}','{{ $value->id }}','<?= Session::token() ?>')">

        @endforeach
    </div>

@endsection

@section('footer')
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
        var url2="'"+'<?= url('admin/product/del_product_img') ?>'+"'";
        var token2="'"+token+"'";
        var img='<img src='+url+' onclick="del_img('+id+','+url2+','+token2+')" />';
        $("#show_product_image").html(img);
    }
</script>
@endsection
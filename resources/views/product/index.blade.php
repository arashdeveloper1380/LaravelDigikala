@extends('layouts/admin')
@section('header')
    <title>مدیریت محصولات</title>
@endsection

@section('content')

    <div class="box_title">
        <span>مدیریت محصولات</span>
    </div>

    <div>
        <a href="{{ url('admin/product/create') }}" class="btn btn-success">افزودن محصول</a>
  <table class="table table-striped table-bordered">
      <thead>
      <tr>
          <th>ردیف</th>
          <th>تصویر شاخص</th>
          <th>عنوان محصول</th>
          <th>تاریخ انتشار</th>
          <th>وضعیت</th>
          <th>تعداد فروش</th>
          <th>عملیات</th>
      </tr>
      </thead>



      <?php $i=1; ?>
    @foreach($product as $key=>$value)

        <tr>
            <td>{{ $i }}</td>
            <td>
                <?php
                   $get_img=$value->get_img;
                   if($get_img)
                   {
                      ?>
                      <img src="{{ url('upload').'/'.$get_img->url }}" style="width:150px">
<?php
                   }
                ?>
            </td>
            <td>{{ $value->title }}
            <p style="font-size: 12px;padding-top: 20px;">
                <a style="color:#35b3ff;" href="{{ url('admin/product/gallery?id=').$value->id }}">گالری محصول</a>
                -
                <a style="color:#35b3ff;"  href="{{ url('admin/product/add-item').'/'.$value->id }}">مشخصات فنی محصول</a>
                -
                <a style="color:#35b3ff;"  href="{{ url('admin/product/add-filter').'/'.$value->id }}">فیلتر های محصول</a>
                -
                <a style="color:#35b3ff;"  href="{{ url('admin/product/add-review?product_id=').$value->id }}">نقد و بررسی تخصصی</a>
                -
                <a style="color:#35b3ff;"  href="{{ url('admin/service?product_id=').$value->id }}">گارانتی محصول</a>

            </p></td>
            <td></td>
            <td>
                @if($value->product_status==1)
                    <span style="color: blue">موجود</span>
                @else
                    <span style="color:red">نا موجود</span>
                @endif
            </td>
            <td>{{ $value->order_product }}</td>
            <td>
                <a style="color: #368bff" href="{{ url('admin/product').'/'.$value->id.'/edit' }}"><span class="fa fa-edit"></span></a>
                <a style="color:red;cursor:pointer;padding-right:5px" onclick="del_row('<?= $value->id ?>','<?= url('admin/product') ?>','<?= Session::token() ?>')">
                    <span class="fa fa-trash"></span>
                </a>
            </td>
        </tr>
        <?php $i++; ?>
    @endforeach

      @if(sizeof($product)==0)
      <tr>
          <td colspan="6">رکوردی یافت نشد</td>
      </tr>
      @endif
  </table>
        {{ $product->links() }}
    </div>
@endsection


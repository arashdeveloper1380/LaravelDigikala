@extends('layouts/admin')
@section('header')
    <title>مدیریت دسته ها</title>
@endsection

@section('content')

    <div class="box_title">
        <span>مدیریت دسته ها</span>
    </div>

    <div>
        <a href="{{ url('admin/category/create') }}" class="btn btn-success">افزودن دسته</a>
        <form action="{{ url('admin/category') }}" id="search_form">
  <table class="table table-striped table-bordered">
      <thead>
      <tr>
          <th>ردیف</th>
          <th>نام دسته</th>
          <th>نام لاتین دسته</th>
          <th>دسته والد</th>
          <th>عملیات</th>
      </tr>
      </thead>

      <tr>
          <td></td>
          <td><input value="@if(array_key_exists('cat_name',$data)){{ $data['cat_name'] }}@endif" type="text" name="cat_name"  class="form-control search_input" style="width:100%"></td>
          <td><input value="@if(array_key_exists('cat_ename',$data)){{ $data['cat_ename'] }}@endif" type="text" name="cat_ename" class="form-control search_input" style="width:100%"></td>
          <td></td>
          <td></td>
      </tr>

      <?php $i=1; ?>
    @foreach($category as $key=>$value)

        <tr>
            <td>{{ $i }}</td>
            <td>{{ $value->cat_name }}</td>
            <td>{{ $value->cat_ename }}</td>
            <td>
                {{ $value->getParent->cat_name }}
            </td>
            <td>
                <a style="color: #368bff" href="{{ url('admin/category').'/'.$value->id.'/edit' }}"><span class="fa fa-edit"></span></a>
                <a style="color:red;cursor:pointer;padding-right:5px" onclick="del_row('<?= $value->id ?>','<?= url('admin/category') ?>','<?= Session::token() ?>')">
                    <span class="fa fa-trash"></span>
                </a>
            </td>
        </tr>
        <?php $i++; ?>
    @endforeach

      @if(sizeof($category)==0)
      <tr>
          <td colspan="5">رکوردی یافت نشد</td>
      </tr>
      @endif
  </table>
        </form>
        {{ $category->links() }}
    </div>
@endsection

@section('footer')
 <script>
   $('.search_input').on('keydown',function (evete)
   {
       if(evete.keyCode==13)
       {
           $("#search_form").submit();
       }
   })
 </script>
@endsection
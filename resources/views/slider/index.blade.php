@extends('layouts/admin')
@section('header')
    <title>مدیریت اسلایدر ها</title>
@endsection

@section('content')

    <div class="box_title">
        <span>مدیریت اسلایدر ها</span>
    </div>

    <div>
        <a href="{{ url('admin/slider/create') }}" class="btn btn-success">افزودن افزودن اسلایدر</a>
  <table class="table table-striped table-bordered">
      <thead>
      <tr>
          <th>ردیف</th>
          <th>عنوان اسلایدر</th>
          <th>تصویر اسلایدر</th>
          <th>عملیات</th>
      </tr>
      </thead>



      <?php $i=1; ?>
    @foreach($slider as $key=>$value)

        <tr>
            <td>{{ $i }}</td>
            <td style="min-width: 100px;">{{ $value->title }}</td>
            <td>
                <img src="{{ url('upload').'/'.$value->img }}" style="width:70%">
            </td>

            <td>
                <a style="color: #368bff" href="{{ url('admin/slider').'/'.$value->id.'/edit' }}"><span class="fa fa-edit"></span></a>
                <a style="color:red;cursor:pointer;padding-right:5px" onclick="del_row('<?= $value->id ?>','<?= url('admin/slider') ?>','<?= Session::token() ?>')">
                    <span class="fa fa-trash"></span>
                </a>
            </td>
        </tr>
        <?php $i++; ?>
    @endforeach

      @if(sizeof($slider)==0)
      <tr>
          <td colspan="4">رکوردی یافت نشد</td>
      </tr>
      @endif
  </table>
        {{ $slider->links() }}
    </div>
@endsection


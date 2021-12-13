@extends('layouts/admin')

@section('header')
    <title>مدیریت کاربران</title>
@endsection


@section('content')

    <div class="box_title">
        <span>مدیریت کاربران</span>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ردیف</th>
            <th>شناسه</th>
            <th>نام کاربری</th>
            <th>تاریخ عضویت</th>
            <th>نقش کاربری</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <?php $Jdf=new \App\lib\Jdf(); $i=1; ?>
        @foreach($user as $key=>$value)

            <?php

               $e=explode(' ',$value->created_at);
               $e2=explode('-',$e[0]);
               $date=$Jdf->tr_num($Jdf->gregorian_to_jalali($e2[0],$e2[1],$e2[2],'-'));
             ?>
          <tr>
              <td>{{ $i }}</td>
              <td>{{ $value->id }}</td>
              <td>{{ $value->username }}</td>
              <td>{{ $date }}</td>
              <td>
                  @if($value->role=='admin')
                      مدیر
                  @else
                      کاربر عادی
                  @endif
              </td>
              <td>
                  <a style="color: #368bff" href="{{ url('admin/user').'/'.$value->id }}"><span class="fa fa-eye"></span></a>

                  <a style="color: #368bff" href="{{ url('admin/user').'/'.$value->id.'/edit' }}"><span class="fa fa-edit"></span></a>

                  <a style="color:red;cursor:pointer;padding-right:5px" onclick="del_row('<?= $value->id ?>','<?= url('admin/user') ?>','<?= Session::token() ?>')">
                      <span class="fa fa-trash"></span>
                  </a>
              </td>
          </tr>
            <?php $i++; ?>
        @endforeach


    </table>


    {{ $user->links() }}

@endsection
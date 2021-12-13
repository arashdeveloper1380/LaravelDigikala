@extends('layouts/admin')
@section('header')
    <title>مدیریت پرسش های کاربران</title>
@endsection

@section('content')

    <div class="box_title">
        <span>مدیریت پرسش های کاربران</span>
    </div>


    <div>

        @php
            $jdf=new \App\lib\Jdf();
        @endphp
        @foreach($question as $key=>$value)

            <div class="question_box" id="question_box_{{ $value->id }}" @if($value->status==0) style="border-color:red" @endif>


                <p style="color:blue">
                    <span>پرسش شماره :</span>
                    <span>{{ $value->id }} - </span>
                    توسط {{ $value->get_user->name }}  - {{ $jdf->jdate('n F y',$value->time) }}
                @if($value->parent_id!=0)
                    <span>ثبت شده در پاسخ به </span>
                    <span>پرسش شماره </span>
                    <span>{{ $value->parent_id }}</span>
                @endif
                </p>

                {!!   strip_tags(nl2br($value->question),'<p><br>') !!}

                <p style="color:red;padding-top:10px">ثبت شده در محصول </p>
                <p>{{ $value->get_product->title }}</p>

                <p style="padding-top:10px">
                    <span id="status_span_{{ $value->id }}" style="color:blue;cursor:pointer" onclick="set_status_question('<?= $value->id ?>')">
                        @if($value->status==0)
                            در انتظار تایید
                        @else
                        تایید شده
                        @endif
                    </span>
                    @if($value->parent_id==0)
                        <span> - </span>
                        <span style="cursor:pointer" onclick="show_form('<?= $value->id ?>')">ارسال پاسخ </span>
                    @endif
                    <span> - </span>
                    <span style="color:red;cursor:pointer" onclick="del_row('<?= $value->id ?>','<?= url('admin/question') ?>','<?= Session::token() ?>')"> حذف </span>
                </p>


                <div class="ansver_box" id="add_question_box_{{ $value->id }}">
                    <form method="post" action="{{ url('admin/question/add') }}">
                        {{ csrf_field() }}
                       <div class="form-group">
                           <input type="hidden" name="parent_id" value="{{ $value->id }}">
                           <input type="hidden" name="product_id" value="{{ $value->get_product->id }}">
                            <textarea name="question" class="question_text"></textarea>
                       </div>

                        <div class="form-group">
                        <button type="submit" class="btn">ثبت پاسخ</button>
                        </div>
                    </form>
                </div>
            </div>

        @endforeach

       {{ $question->links() }}
    </div>

@endsection


<script>
 <?php
 $url=url('admin/ajax/set_status_question');
 ?>
    set_status_question=function(id)
    {
        $.ajaxSetup(
            {
                'headers':{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            url:'{{ $url }}',
            type:'POST',
            data:'question_id='+id,
            success:function (data)
            {
               if(data=='تایید شده')
               {
                   document.getElementById('question_box_'+id).style.border='1px solid #edeff0';
                  $("#status_span_"+id).text(data);
               }
               else if(data=='در انتظار تایید')
               {
                   document.getElementById('question_box_'+id).style.border='1px solid red';
                   $("#status_span_"+id).text(data);
               }
               else
               {
                   alert(data);
               }
            }
        });
    };
 show_form=function (id)
 {
      $('.ansver_box').hide();
      $("#add_question_box_"+id).show();
 }
</script>
@extends('layouts/admin')

@section('style')
    <link href="{{ url('css/bootstrap-select.css') }}" rel="stylesheet" >
    <link href="{{ url('css/js-persian-cal.css') }}" rel="stylesheet">
@endsection
@section('header')
    <title>افزودن کارت هدیه</title>
@endsection

@section('content')

    <div class="box_title" >
        <span>افزودن کارت هدیه</span>
    </div>

    {!! Form::open(['url'=>'admin/order/gift_cart']) !!}

    <div class="form-group">
        {!! Form::label('user_id','شناسه کاربر : ') !!}
        {!! Form::text('user_id',null,['class'=>'form-control']) !!}
        @if($errors->has('user_id'))
            <span style="color:red;font-size:13px">{{ $errors->first('user_id') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('value','مقدار تخفیف بر حسب تومان : ') !!}
        {!! Form::text('value',null,['class'=>'form-control']) !!}
        @if($errors->has('value'))
            <span style="color:red;font-size:13px">{{ $errors->first('value') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('code_time','مدت زمان کارت هدیه : ') !!}
        {!! Form::text('code_time',null,['class'=>'pdate form-control','id'=>'pcal4']) !!}

    </div>
    <div class="form-group">
    @if($errors->has('code_time'))
        <span style="color:red;font-size:13px">{{ $errors->first('code_time') }}</span>
    @endif
    </div>


    <div class="form-group">
        {!! Form::submit('ثبت',['class'=>'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}


@endsection


@section('footer')
<script type="text/javascript" src="{{ url('js/bootstrap-select.js') }}"></script>
<script type="text/javascript" src="{{ url('js/defaults-fa_IR.js') }}"></script>
<script type="text/javascript" src="{{ url('js/js-persian-cal.min.js') }}"></script>
<script type="text/javascript">
    var objCal4 = new AMIB.persianCalendar( 'pcal4');
</script>
@endsection

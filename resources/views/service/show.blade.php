@extends('layouts/admin')
@section('header')
    <title>مدیریت گارانتی محصول</title>
@endsection
@section('style')
<link href="{{ url('css/js-persian-cal.css') }}" rel="stylesheet">
@endsection
@section('content')

    <div class="box_title" >
        <span>مدیریت گارانتی محصول - {{ $service->service_name }}</span>
    </div>

    <div class="form-group">
        <label for="pcal4">انتخاب تاریخ : </label>
        <input type="text" id="pcal4" class="pdate form-control">
    </div>
    <div id="show"></div>


@endsection
@section('footer')
    <?php

    $url=url('admin/service/get_price?product_id=').$product->id;
    ?>
<script type="text/javascript" src="{{ url('js/js-persian-cal.min.js') }}"></script>
<script type="text/javascript">
    var objCal4 = new AMIB.persianCalendar( 'pcal4', {
            onchange: function( pdate ){
                if( pdate ) {
                   var date=pdate.join( '-' );
                   var product_id={{ $product->id }};
                   var service_id={{ $service->id }};
                    $.ajaxSetup(
                        {
                            'headers':{
                                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                            }
                        });

                   $.ajax({
                       url:'{{ $url }}',
                       type:'POST',
                       data:'date='+date+'&product_id='+product_id+'&service_id='+service_id,
                       success:function (data) {
                          $("#show").html(data);
                       }
                   });

                } else {
                    alert( 'تاریخ واردشده نادرست است' );
                }
            }
        }
    );
</script>
@endsection
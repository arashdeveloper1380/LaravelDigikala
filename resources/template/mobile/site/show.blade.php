@extends('mobile.layout')

@section('style')
    <link href="{{ url('css/swiper.min.css') }}" rel="stylesheet" />

@endsection

@section('content')

    <div class="loading_div">
        <div class="loading2"></div>
    </div>

    <div style="width:100%;background:white;">
        <?php
        $images=$product->get_images;
        ?>
        @if(sizeof($images)>0)

                <div class="swiper-container" dir="rtl"  id="show_product_img" style="width:100%">
                    <div class="swiper-wrapper">
                        @foreach($images as $key=>$value)


                            <div class="swiper-slide">
                                <img src="{{ url('upload').'/'.$value->url }}">
                            </div>

                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
         @endif


        <div style="width:100%;float:right;padding-bottom: 10px;">
            <ul class="list-inline product_ic">
                <li><span class="fa fa-heart-o"></span></li>
                <li><span class="fa fa-bell-o"></span></li>
                <li><span class="fa fa-share-alt"></span></li>
            </ul>
        </div>

        <div style="padding:15px;">
            <p>{{ $product->title }}</p>
            <p style="color: #818181;">{{ $product->code }}</p>


            @if($product->product_status==1)

                <form method="post" id="add_cart_form" action="{{ url('Cart') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div id="product_info">
                    <?php
                    $colors=$product->get_colors;
                    $color_id=0;
                    $service_id=0;
                    ?>

                    @if(sizeof($colors)>0)
                        <p style="padding-top: 20px;">انتخاب رنگ</p>
                        @foreach($colors as $key=>$value)
                            @if($key==0)
                                <?php $color_id=$value->id ?>
                            @endif
                            <div class="color_box" onclick="set_color('<?= $value->id ?>')">
                                <label style="background:#{{ $value->color_code }}"> @if($key==0) <span class="tick"></span> @endif</label>
                                <span>{{ $value->color_name }}</span>
                            </div>
                        @endforeach
                    @endif

                    <input type="hidden" name="color_id" id="color_id" value="{{ $color_id }}">

                    <div style="clear:both"></div>
                    @if(sizeof($product->get_service_name)>0)

                        <p style="padding-top:20px">انتخاب گارانتی</p>



                        <?php
                        $c=0;
                        ?>
                        @foreach($product->get_service_name as $key=>$value)

                            @if($color_id==0)

                                @if($key==0)
                                    <div class="service_title" onclick="show_service()">
                                        <?php
                                        $s_name=(strlen($value->service_name)>35) ? mb_substr($value->service_name,0,35).'..' : $value->service_name;
                                        ?>
                                        <span>{{ $s_name }}</span>
                                        <a class="service_ic" id="service_ic"></a>
                                    </div>
                                    <?php
                                    $service_id=$value->id;
                                    ?>
                                @endif
                            @else

                                <?php

                                if($c==0)
                                {
                                $check=DB::table('service')->where(['parent_id'=>$value->id,'color_id'=>$color_id])->first();
                                if($check)
                                {
                                $c=1;
                                ?>
                                <div class="service_title" onclick="show_service()">
                                    <?php
                                      $s_name=(strlen($value->service_name)>35) ? mb_substr($value->service_name,0,35).'..' : $value->service_name;
                                    ?>
                                    <span>{{ $s_name }}</span>
                                    <a class="service_ic" id="service_ic"></a>
                                </div>
                                <?php
                                $service_id=$value->id;
                                ?>

                                <?php
                                }
                                }
                                ?>


                            @endif

                        @endforeach

                        <div class="service_box" id="service_box">
                            @foreach($product->get_service_name as $key=>$value)
                                <div onclick="set_service('<?= $value->id ?>')">
                                    {{ $value->service_name }}
                                </div>
                            @endforeach
                        </div>

                    @endif
                    <input type="hidden" name="service_id" value="{{ $service_id }}" id="service_id">


                    <div style="width:100%;float:right;margin-top: 15px;">

                        <p><span>قیمت : </span> {{ number_format($product->price) }} تومان</p>
                        @if(!empty($product->discounts))
                            <p><span>قیمت برای شما : </span>  <span style="color:#4CAF50;font-size:16px;">{{ number_format($product->price-$product->discounts) }}</span>  تومان</p>
                        @endif


                    </div>

                    <div style="clear:both"></div>
                </div>
                </form>
            @endif





        </div>


            <div class="product_data_box">

                <ul class="tab_product_info" id="tab_product_info">
                    <li onclick="show_tab(1)">مشخصات</li>
                    <li onclick="show_tab(2)">نقد و بررسی</li>
                    <li onclick="show_tab(3)">نظرات</li>
                </ul>
                <div style="clear:both;"></div>

                <div style="width:100%;margin:auto;">
                    <div class="lavalamp-bar"></div>
                </div>
            </div>


        <div id="tab_1" class="tab_info_product">
            @include('mobile.include.product_item',['product'=>$product,'item_value'=>$item_value,'items'=>$items])
        </div>

        <div id="tab_2" style="display:none" class="tab_info_product">
                @include('mobile.include.review',['product'=>$product,'review'=>$review])
        </div>

            <div class="loading_box" id="loading_comment" style="padding-top:50px;padding-bottom: 40px;">
                <div class="loading"></div>
                <span>در حال دریافت اطلاعات</span>
            </div>


        <div id="tab_3" class="tab_info_product">


        </div>

            <div style="padding-top:70px;"></div>

        <button onclick="submit_cart_form()" class="btn btn-success btn_add_cart">افزودن به سبد خرید</button>


</div>




@endsection

@section('footer')
<script type="text/javascript" src="{{ url('js/swiper.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/TweenMax.min.js') }}"></script>
<script>
    <?php

        $url=url('site/ajax_set_service');
        $url2=url('site/ajax_get_tab_data');
        ?>
    var swiper = new Swiper('.swiper-container', {
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        }
    });
    set_service=function (service_id)
    {
        $("#service_box").slideUp();
        var product_id='<?= $product->id ?>';


        var color_id=document.getElementById('color_id').value;
        $.ajaxSetup(
            {
                'headers':{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
        $(".loading_div").show();
        $.ajax({
            url:'{{ $url }}',
            type:'POST',
            data:'service_id='+service_id+'&product_id='+product_id+'&color_id='+color_id,
            success:function (data)
            {
                $("#loading_box").hide();
                $("#product_info").html(data);
                $(".loading_div").hide();
            }
        });
    };
    set_color=function (color_id)
    {

        var product_id='<?= $product->id ?>';
        var service_id=document.getElementById('service_id').value;
        $.ajaxSetup(
            {
                'headers':{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
        $(".loading_div").show();
        $.ajax({
            url:'{{ $url }}',
            type:'POST',
            data:'service_id='+service_id+'&product_id='+product_id+'&color_id='+color_id,
            success:function (data) {
                $("#product_info").html(data);
                $(".loading_div").hide();
            }
        });
    };
    show_tab=function (id)
    {
        $('.tab_info_product').hide();
        $("#tab_"+id).show();
        if(id==3)
        {
            $("#loading_comment").show();
            var tab_id='comment';
            var product_id='<?= $product->id ?>';
            $.ajaxSetup(
                {
                    'headers':{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.ajax({
                url:'{{ $url2 }}',
                type:'POST',
                data:'tab_id='+tab_id+'&product_id='+product_id,
                success:function (data)
                {
                    $("#loading_comment").hide();
                    $("#tab_3").html(data);
                }
            });
        }

    };
    $(document).on('click','#tab_product_info li',function ()
    {
        var total_width=$("#tab_product_info").outerWidth();
        var width=$(this).outerWidth();
        var offset=$(this).offset().left;
        var left_offset=$("#tab_product_info").offset().left;
        TweenMax.to($('.product_data_box .lavalamp-bar'),0.5,{

            css:{
                width:'32%',
                right:(total_width-offset-width+left_offset)+'px'
            }


        });
    });
</script>

@endsection
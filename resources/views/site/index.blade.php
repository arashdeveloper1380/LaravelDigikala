@extends('layouts.site')

@section('style')

<link rel="stylesheet" type="text/css" href="{{ url('slick/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('slick/slick/slick-theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('css/flipclock.css') }}">
@endsection

@section('content')


    <div class="row">

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding: 0px;">


            <div class="image_box" style="margin-top:30px">
                <img src="<?= url('').'/images/9de147be.jpg' ?>">
            </div>
            <div class="image_box" style="margin-top:10px">
                <img src="<?= url('').'/images/0d72d29b.jpg' ?>">
            </div>

            <div class="image_box" style="margin-top:10px">
                <img src="<?= url('').'/images/86a4c9bc.jpg' ?>">
            </div>

            <div class="image_box" style="margin-top:10px">
                <img src="<?= url('').'/images/94cb3501.jpg' ?>">
            </div>

        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="padding:0px !important;">

            @if(sizeof($slider)>0)

                <div style="width:100%;height: 270px;margin-top: 10px;position:relative">
                    <div class="slider">
                        
                       <div style="width:100%;position:absolute">
                           @foreach($slider as $key=>$value)

                              <div class="slide_div an" id="slide_img_<?= $key ?>" @if($key==0) style="display:block" @endif>
                                  <a>
                                      <img src="{{ url('upload').'/'.$value->img }}">
                                  </a>
                              </div> 
                           @endforeach
                       </div>



                        <div class="footer_slider">

                            <ul class="slider_li">
                                @foreach($slider as $key=>$value)

                                   <li id="slider_li_<?= $key ?>" class="@if($key==0)slider_li_active @else slide_li @endif">
                                       <div style="margin-right:40%;width:10%">
                                           <span id="slider_span_<?= $key ?>" class="@if($key==0) ab @else ab1 @endif"></span>
                                       </div>
                                       {{ $value->title }}
                                   </li>
                                @endforeach
                            </ul>

                        </div>

                        <div id="right-slide" onclick="previous()"></div>
                        <div id="left-slide" onclick="next()"></div>
                    </div>
                </div>



            @endif


            @if(sizeof($amazing)>0)

                <?php

                        $array=array(
                            6=>'هزار تومان',
                            7=>'میلیون تومان'
                        )

                ?>

              @foreach($amazing as $key=>$value)


                  <?php

                            $url=url('').'/product/';
                            if($value->get_product)
                            {
                               $url.=$value->get_product->code_url.'/'.$value->get_product->title_url;
                            }
                            ?>

                        <a href="{{ $url }}">
                            <div class="amazing_div" id="amazing_div_{{ $key }}" @if($key==0) style="display:block" @endif>

                                <div class="col-md-5">
                                    <p style="color:red;padding-top: 30px;">پيشنهاد شگفت انگيز امروز</p>

                                    <span class="price1">
                                        <?php
                                            $price1=str_replace('000','',$value->price1);
                                        ?>
                                        {{ number_format($price1) }}
                                    </span>


                                    <span class="price2">
                                        <?php
                                        $price2=str_replace('000','',$value->price1-$value->price2);
                                        $price3=$value->price1-$value->price2;
                                        ?>
                                        {{ number_format($price2) }}<span style="padding-right:5px;"></span> {{ array_key_exists(strlen($price3),$array) ? $array[strlen($price3)] : '' }}
                                    </span>
                                    <div style="margin-top: 20px;">
                                        {!!   nl2br($value->tozihat) !!}
                                    </div>

                                    <p style="padding-top: 25px;">
                                        فرصت باقی مانده تا این پیشنهاد
                                    </p>
                                    <div class="clock" id="amazing_clock_{{ $key }}">

                                    </div>


                                    <div class="Finished_Badge" id="amazing_img_{{ $key }}" style="display:none">
                                        <img src="{{ url('images/Finished_Badge.png') }}">
                                    </div>

                                </div>


                                <div class="col-md-7">

                                    <p style="text-align:center;padding-top:30px">{{ $value->title }}</p>

                                    @if($value->get_img)
                                        <div style="width:250px;margin:auto">
                                            <img style="width:100%" src="{{ url('upload').'/'.$value->get_img->url }}">

                                        </div>
                                    @endif
                                </div>
                            </div>
                        </a>




              @endforeach


              <div class="amazing_box">

                  <section class="amazing">

                      @foreach($amazing as $key=>$value)

                          <div class="amazing_footer"  id="amazing_footer_{{ $key }}"  onclick="show_amazing({{ $key }},{{ sizeof($amazing) }})">
                              <span class="ab3"></span> {{ $value->m_title }}
                          </div>

                      @endforeach

                  </section>

              </div>
            @endif



            <div class="shop_product" style="margin-top: 20px;">

                <div class="shop_product_title">
                    <span>جدید ترین محصولات فروشگاه</span>
                </div>


                <section class="new_product">
                @foreach($product as $key=>$value)
                        <div class="product_box">

                            @if($value->get_img)

                                <div class="product_image_box">
                                    <img src="{{ url('upload').'/'.$value->get_img->url }}">
                                </div>

                            @endif


                                <p>
                                    <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                        @if(strlen($value->title)>50)
                                            {{ mb_substr($value->title,0,33).' ... ' }}
                                        @else
                                            {{ $value->title }}
                                        @endif
                                    </a>
                                </p>
                                <p class="product_discounts" @if(!empty($value->discounts) && !empty($value->price)) style="background: #F5F6F7;" @endif>

                                    @if(!empty($value->discounts) && !empty($value->price))
                                        {{ number_format($value->price) }} تومان
                                    @endif

                                </p>




                                <p class="product_price">
                                    @if(!empty($value->discounts) && !empty($value->price))

                                        {{ number_format($value->price-$value->discounts) }} تومان
                                    @elseif(!empty($value->price))

                                        {{ number_format($value->price) }} تومان
                                    @endif

                                </p>
                        </div>
                @endforeach
                </section>


            </div>

                <div class="shop_product" style="margin-top:20px;">

                    <div class="shop_product_title">
                        <span>پر فروش ترین محصولات فروشگاه</span>
                    </div>


                    <section class="order_product">
                        @foreach($order_product as $key=>$value)

                            <div class="product_box">

                                @if($value->get_img)

                                    <div class="product_image_box">
                                        <img src="{{ url('upload').'/'.$value->get_img->url }}">
                                    </div>

                                @endif
                                <p>
                                    <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                        @if(strlen($value->title)>50)
                                            {{ mb_substr($value->title,0,33).' ... ' }}
                                        @else
                                            {{ $value->title }}
                                        @endif
                                    </a>
                                </p>
                                <p class="product_discounts" @if(!empty($value->discounts) && !empty($value->price)) style="background: #F5F6F7;" @endif>

                                    @if(!empty($value->discounts) && !empty($value->price))
                                        {{ number_format($value->price) }} تومان
                                    @endif

                                </p>




                                <p class="product_price">
                                    @if(!empty($value->discounts) && !empty($value->price))

                                        {{ number_format($value->price-$value->discounts) }} تومان
                                    @elseif(!empty($value->price))

                                        {{ number_format($value->price) }} تومان
                                    @endif

                                </p>
                            </div>




                        @endforeach
                    </section>


                </div>


                <div class="shop_product" style="margin-top:20px;">

                    <div class="shop_product_title">
                        <span>پر بازدید ترین محصولات فروشگاه</span>
                    </div>


                    <section class="view_product">
                        @foreach($view_product as $key=>$value)

                            <div class="product_box">

                                @if($value->get_img)

                                    <div class="product_image_box">
                                        <img src="{{ url('upload').'/'.$value->get_img->url }}">
                                    </div>

                                @endif
                                <p>
                                    <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                        @if(strlen($value->title)>50)
                                            {{ mb_substr($value->title,0,33).' ... ' }}
                                        @else
                                            {{ $value->title }}
                                        @endif
                                    </a>
                                </p>
                                <p class="product_discounts" @if(!empty($value->discounts) && !empty($value->price)) style="background: #F5F6F7;" @endif>

                                    @if(!empty($value->discounts) && !empty($value->price))
                                        {{ number_format($value->price) }} تومان
                                    @endif

                                </p>




                                <p class="product_price">
                                    @if(!empty($value->discounts) && !empty($value->price))

                                        {{ number_format($value->price-$value->discounts) }} تومان
                                    @elseif(!empty($value->price))

                                        {{ number_format($value->price) }} تومان
                                    @endif

                                </p>
                            </div>




                        @endforeach
                    </section>


                </div>
        </div>

    </div>

@endsection

@section('footer')
<script>
    var amazing_time=new Array;
    var i=0;

<?php

    foreach ($amazing as $key=>$value)
    {
        $time=($value->timestamp-time()>0) ? $value->timestamp-time(): 0;
        ?>
      amazing_time[i]=<?= $time ?>;
        i++;
<?php
    }

 ?>
</script>
<script type="text/javascript" src="{{ url('slick/slick/slick.js') }}"></script>
<script type="text/javascript" src="{{ url('js/flipclock.min.js') }}"></script>
<script>
 load_slider({{ sizeof($slider) }});
 $('.new_product').slick({
     infinite: false,
     speed: 900,
     slidesToShow: 3,
     slidesToScroll: 3,
     rtl:true,
     responsive: [
         {
             breakpoint: 1024,
             settings: {
                 slidesToShow: 3,
                 slidesToScroll: 3,
                 infinite: true
             }
         },
         {
             breakpoint: 600,
             settings: {
                 slidesToShow: 2,
                 slidesToScroll: 2
             }
         },
         {
             breakpoint: 480,
             settings: {
                 slidesToShow: 1,
                 slidesToScroll: 1
             }
         }
     ]
 });
 $('.order_product').slick({
     infinite: false,
     speed: 900,
     slidesToShow: 3,
     slidesToScroll: 3,
     rtl:true,
     responsive: [
         {
             breakpoint: 1024,
             settings: {
                 slidesToShow: 3,
                 slidesToScroll: 3,
                 infinite: true
             }
         },
         {
             breakpoint: 600,
             settings: {
                 slidesToShow: 2,
                 slidesToScroll: 2
             }
         },
         {
             breakpoint: 480,
             settings: {
                 slidesToShow: 1,
                 slidesToScroll: 1
             }
         }
     ]
 });
 $('.view_product').slick({
     infinite: false,
     speed: 900,
     slidesToShow: 3,
     slidesToScroll: 3,
     rtl:true,
     responsive: [
         {
             breakpoint: 1024,
             settings: {
                 slidesToShow: 3,
                 slidesToScroll: 3,
                 infinite: true
             }
         },
         {
             breakpoint: 600,
             settings: {
                 slidesToShow: 2,
                 slidesToScroll: 2
             }
         },
         {
             breakpoint: 480,
             settings: {
                 slidesToShow: 1,
                 slidesToScroll: 1
             }
         }
     ]
 });

 $('.amazing').slick({
     rtl:true,
     speed: 900,
     slidesToShow: 3,
     slidesToScroll:2,
     variableWidth:true,
     infinite: false
 });

 for(var j=0;j<amazing_time.length;j++)
 {
     var clock;

     clock = $('#amazing_clock_'+j).FlipClock({
         clockFace: 'HourlyCounter',
         autoStart: false,
         id:'c_'+j,
         callbacks: {
             stop: function()
             {
                 var a=this.id.replace('c_','');
                 $('#amazing_clock_'+a).hide();
                 $('#amazing_img_'+a).show();
             }
         }
     });

     clock.setTime(amazing_time[j]);
     clock.setCountdown(true);
     clock.start();
 }

</script>
@endsection
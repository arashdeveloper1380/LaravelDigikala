@extends('mobile.layout')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ url('slick/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('slick/slick/slick-theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('css/swiper.min.css') }}">
@endsection
@section('content')
    <?php
       function get_amazing_time($old_amazing)
       {
           $array=array();
           $timestamp=0;
           $time=0;
           if($old_amazing)
           {
                   $timestamp=$old_amazing->timestamp;
           }
           if($timestamp>time())
           {
               $time=$timestamp-time();

               $h_t=$time/3600;
               $h=floor($h_t);
               $array[0]=$h;

               $m_t=$time-$h*3600;

               $m_t=$m_t/60;
               $m=floor($m_t);
               $array[1]=$m;
               return $array;
           }

       }
     ?>
    <div>
        @if(sizeof($slider)>0)

            <div id="slider_box" style="width:100%;height:160px;position:relative">
                <div class="slider">

                    <div style="width:100%;position:absolute">
                        @foreach($slider as $key=>$value)

                            <div class="slide_div an" id="slide_img_<?= $key ?>" @if($key==0) style="display:block" @endif>
                                <a href="{{ $value->url }}">
                                    <img src="{{ url('upload').'/'.$value->img }}">
                                </a>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>



        @endif
    </div>



    <div style="width:100%;background:white;">

      <div style="padding-top:10px;"></div>


            @if(sizeof($amazing)>0)


                <?php

                $array=array(
                    6=>'هزار تومان',
                    7=>'میلیون تومان'
                );
                $a_time=get_amazing_time($old_amazing);
                ?>
                <div class="amazing_box">

                    @if(sizeof($a_time)==2)
                        <div style="float:right;max-width:150px;padding-top:15px;font-size:13px;padding-right:5px">
                            فرصت باقی مانده برای پیشنهادات
                        </div>
                        <ul class="list-inline amazing_ul">


                            <li>
                                <div class="timer">
                                    <span>{{ $a_time[0] }}</span>
                                    <span>ساعت</span>
                                </div>
                            </li>

                            <li class="ic_amazing">
                                <div>
                                    <div class="amazing_circle"></div>
                                    <div class="amazing_circle"></div>
                                </div>
                            </li>

                            <li>
                                <div class="timer">
                                    <span>{{ $a_time[1] }}</span>
                                    <span>دقیقه</span>
                                </div>
                            </li>
                        </ul>
                    @endif
                    <div>




                        <section class="amazing_product">
                            @foreach($amazing as $key=>$value)

                                <?php

                                $url=url('').'/product/';
                                $products=$value->get_product;
                                if($products)
                                {
                                    $url.=$products->code_url.'/'.$products->title_url;
                                }
                                $t=$value->timestamp-time();
                                ?>
                                <div class="amazing_product_box" >

                                    <p class="m_title">
                                        <a href="{{ $url }}">
                                            {{ $value->m_title }}
                                        </a>
                                    </p>
                                    @if($value->get_img)

                                        @if($t<0)
                                            <div class="Finished_Badge">
                                                <img  src="{{ url('images/Finished_Badge.png') }}">
                                            </div>


                                            <div class="incredible__finishEffect"></div>
                                        @endif

                                        <div class="product_image_box"  >
                                            <img src="{{ url('upload').'/'.$value->get_img->url }}">
                                        </div>


                                    @endif

                                    <p style="text-align:center;margin-top:15px;margin-bottom: 25px;position:relative">
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
                                    </p>
                                </div>




                            @endforeach
                        </section>


                    </div>

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


        <div class="shop_product" style="margin-top:30px;">

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

        <div class="shop_product" style="margin-top:30px;">

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

        <div style="clear: both;padding-top:30px"></div>

    </div>


@endsection

@section('footer')
<script type="text/javascript" src="{{ url('js/jquery.touchSwipe.min.js') }}"></script>
<script type="text/javascript" src="{{ url('slick/slick/slick.js') }}"></script>
<script type="text/javascript" src="{{ url('js/swiper.min.js') }}"></script>
<script>
load_slider({{ sizeof($slider) }});
$('.new_product').slick({
    infinite: false,
    speed: 900,
    slidesToShow:1.7,
    slidesToScroll: 1.7,
    rtl:true,
    responsive: [
        {
            breakpoint:290,
            settings: {
                slidesToShow: 1,
                slidesToScroll:1,
                infinite: false
            }
        },
        {
            breakpoint:400,
            settings: {
                slidesToShow: 1.6,
                slidesToScroll:1.6,
                infinite: false
            }
        },
        {
            breakpoint:600,
            settings: {
                slidesToShow: 2.6,
                slidesToScroll:2.6,
                infinite: false
            }
        }
        ]
});
$('.order_product').slick({
    infinite: false,
    speed: 900,
    slidesToShow:1.7,
    slidesToScroll: 1.7,
    rtl:true,
    responsive: [
        {
            breakpoint:290,
            settings: {
                slidesToShow: 1,
                slidesToScroll:1,
                infinite: false
            }
        },
        {
            breakpoint:400,
            settings: {
                slidesToShow: 1.6,
                slidesToScroll:1.6,
                infinite: false
            }
        },
        {
            breakpoint:600,
            settings: {
                slidesToShow: 2.6,
                slidesToScroll:2.6,
                infinite: false
            }
        }
    ]
});
$('.view_product').slick({
    infinite: false,
    speed: 900,
    slidesToShow:1.7,
    slidesToScroll: 1.7,
    rtl:true,
    responsive: [
        {
            breakpoint:290,
            settings: {
                slidesToShow: 1,
                slidesToScroll:1,
                infinite: false
            }
        },
        {
            breakpoint:400,
            settings: {
                slidesToShow: 1.6,
                slidesToScroll:1.6,
                infinite: false
            }
        },
        {
            breakpoint:600,
            settings: {
                slidesToShow: 2.6,
                slidesToScroll:2.6,
                infinite: false
            }
        }
    ]
});
$('.amazing_product').slick({
    infinite: false,
    speed: 900,
    slidesToShow:1.4,
    slidesToScroll: 1.3,
    rtl:true,
    responsive: [
        {
            breakpoint:290,
            settings: {
                slidesToShow: 1,
                slidesToScroll:1,
                infinite: false
            }
        },
        {
            breakpoint:400,
            settings: {
                slidesToShow: 1.4,
                slidesToScroll:1.3,
                infinite: false
            }
        },
        {
            breakpoint:600,
            settings: {
                slidesToShow: 2.7,
                slidesToScroll:2.7,
                infinite: false
            }
        }
    ]
});
</script>

@endsection

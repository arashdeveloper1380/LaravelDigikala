@extends('mobile.layout')


@section('style')
    <link href="{{ url('css/swiper.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ url('slick/slick/slick.css') }}">
@endsection

@section('content')


    <div class="swiper-container">
        <div class="swiper-wrapper">

            @foreach($slider as $key=>$value)

                <div class="swiper-slide cat_slider">
                    <a href="{{ $value->url }}">
                        <img src="{{ url('upload').'/'.$value->img }}">
                    </a>
                </div>

            @endforeach

        </div>

    </div>



   <div style="width:100%;background:white;padding-top: 20px;">
       <ul class="cat_ul">

           @foreach($cat_list as $key=>$value)

               <li><a  href="{{ url('category').'/'.$category1->cat_ename.'/'.$category2->cat_ename.'/'.$key }}">
                       <span>{{ $value['cat_name'] }}</span>
                       @if($value['cat_child']=='ok')
                           <span class="fa fa-angle-left" style="float:left;padding-left:10px;font-size:17px"></span>
                       @endif
                   </a>
               </li>
           @endforeach

       </ul>


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
   </div>
@endsection


@section('footer')
<script type="text/javascript" src="{{ url('slick/slick/slick.js') }}"></script>
<script type="text/javascript" src="{{ url('js/swiper.min.js') }}"></script>
<script>
        var swiper = new Swiper('.swiper-container', {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay:5000,
                disableOnInteraction: false
            }
        });

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
 </script>
@endsection
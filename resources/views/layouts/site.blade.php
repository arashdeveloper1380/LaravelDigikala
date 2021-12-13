<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('css/bootstrap-rtl.css') }}" rel="stylesheet">
    <link href="{{ url('css/font-awesome.css') }}" rel="stylesheet">
    @yield('style')
    <link href="{{ url('css/site.css') }}" rel="stylesheet">
    <title>فروشگاه اینترنتی دیجی آنلاین</title>

</head>
<body>

<div class="container-fluid header">

    <div class="container">

        <div class="row">

            <div class="col-lg-9 col-md-9 col-sm-9">
                <ul class="list-inline header_ul">
                    <li><span class="fa fa-lock" style="padding-left:5px"></span><span>فروشگاه اینترنتی دیجی آنلاین</span> @if(!Auth::check()) <a href="{{ url('login') }}">وارد شوید</a> @endif</li>
                    @if(Auth::check())
                        <li><span class="fa fa-user"></span><a href="{{ url('user') }}">
                                {{ Auth::user()->username }}
                            </a></li>
                    @else
                        <li><span class="fa fa-user"></span><a href="{{ url('register') }}">ثبت نام</a></li>
                    @endif
                    <li><span class="fa fa-gift"></span><a href="">کارت هدیه</a></li>


                    @if(Auth::check())

                        <li>
                            <a style="color:red;cursor:pointer" onclick="logout()">خروج</a>
                        </li>

                    @endif
                </ul>

                <ul class="list-inline">

                    <li>
                       <a href="{{ url('Cart') }}">
                           <div class="btn-shopping-cart">
                               <div class="shopping-cart-icon"><span class="fa fa-shopping-cart"></span></div>
                               <div class="shopping-cart-text">
                                   <span style="float:right">سبد خرید</span>
                                   <span class="number-product-cart">{{ \App\Cart::count() }}</span>
                               </div>
                           </div>
                       </a>
                    </li>
                    <li>


                        <div class="form-group" id="header_header">

                            <div class="input-group index_search_input">

                                <span class="input-group-addon" onclick="search()" ><span class="fa fa-search"></span></span>
                                 <form action="{{ url('Search') }}" id="search_product_form">

                                <input type="text" class="form-control" id="inputGroupSuccess1" name="text" aria-describedby="inputGroupSuccess1Status" placeholder="... محصول، دسته یا برند مورد نظرتان را جستجو کنید">
                                 </form>
                            </div>
                        </div>

                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3">
                <img src="{{ url('images/logo.jpg') }}" class="logo">
            </div>

        </div>

    </div>
</div>


<div class="container-fluid menu">

    <div class="container">
        <div class="row">
            <ul class="list-inline" id="product_cat">
                @foreach($category as $key=>$value)

                    <li id="product_cat_li_<?= $value->id ?>">
                        <a href="{{ url('category').'/'.$value['cat_ename'] }}"><span>{{ $value['cat_name'] }}</span></a>
                        <span id="product_cat_span_<?= $value->id ?>" class="fa fa-chevron-down"></span>
                        <ul class="list-inline sub_menu1">
                            @foreach($value->getChild as $key2=>$value2)
                                <li>
                                    <a href="{{ url('category').'/'.$value->cat_ename.'/'.$value2->cat_ename }}">
                                        {{ $value2->cat_name }}
                                    </a>

                                    <div class="menu_box">


                                        <?php
                                        $t=0;
                                        $d=1;
                                        ?>

                                        @foreach($value2->getChild as $key3=>$value3)

                                            <?php

                                               $menu4=$value3->getChild2;
                                            ?>
                                               @if((11-$t)<sizeof($menu4) && $t>0)

                                                  <?php
                                                    $t=0;
                                                 $d++;

                                                   ?>
                                                     </div>
                                               @endif
                                               @if($t==0)
                                                  <div class="menu_box_div_{{ $d }}">
                                               @endif
                                                 <?php $t++; ?>


                                                <ul class="li_menu">
                                                    <li>
                                                        <a style="color:#16C1F3" href="{{ url('category').'/'.$value->cat_ename.'/'.$value2->cat_ename.'/'.$value3->cat_ename }}">
                                                        {{ $value3->cat_name }}
                                                        </a>
                                                    </li>
                                                    <?php
                                                    $j=0;

                                                    ?>
                                                    @foreach($menu4 as $key4=>$value4)
                                                        <?php $t++; ?>
                                                        @if($j<11)
                                                            <?php
                                                              $url=url('/');
                                                              $e=explode('_',$value4->cat_ename);
                                                              if(sizeof($e)==3)
                                                              {
                                                                 if($e[0]=='filter')
                                                                 {
                                                                    $url.='/search/'.$value->cat_ename.'/'.$value2->cat_ename.'/'.$value3->cat_ename.'?'.$e[1].'[0]='.$e[2];
                                                                 }
                                                                 else
                                                                 {
                                                                   $url.='/category/'.$value->cat_ename.'/'.$value2->cat_ename.'/'.$value3->cat_ename.'/'.$value4->cat_ename;
                                                                 }
                                                              }
                                                              else
                                                              {
                                                                  $url.='/category/'.$value->cat_ename.'/'.$value2->cat_ename.'/'.$value3->cat_ename.'/'.$value4->cat_ename;
                                                              }
                                                             ?>
                                                            <li><a href="{{ $url }}">{{ $value4->cat_name }}</a></li>

                                                        @else

                                                          @if(sizeof($menu4)>11)

                                                             <li><a  href="{{ url('category').'/'.$value->cat_ename.'/'.$value2->cat_ename.'/'.$value3->cat_ename }}" style="color:#16C1F3"  >مشاهده موارد بیشتر</a></li>
                                                         @endif

                                                        @endif

                                                        <?php $j++ ?>

                                                    @endforeach

                                                </ul>


                                                 <?php
                                                    if($t>12)
                                                    {
                                                        $t=0;
                                                        $d++;
                                                      ?></div><?php
                                                    }

                                                 ?>

                                        @endforeach



                                        @if(!empty($value2->img))

                                            <div class="cat_img" style="background:url('{{ url('upload').'/'.$value2->img }}')"></div>
                                        @endif

                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>


<div class="container" style="padding-bottom:40px">
    @yield('content')
</div>


<script type="text/javascript" src="{{ url('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ url('js/js.js') }}"></script>
<script type="text/javascript" src="{{ url('js/bootstrap.js') }}"></script>

<script>

    url='<?= url('logout') ?>';
    token='<?= csrf_token() ?>';
    logout=function () {
        var form = document.createElement("form");
        form.setAttribute("method", "POST");
        form.setAttribute("action",url);

        var hiddenField2 = document.createElement("input");
        hiddenField2.setAttribute("name", "_token");
        hiddenField2.setAttribute("value",token);
        form.appendChild(hiddenField2);

        document.body.appendChild(form);

        form.submit();
        document.body.removeChild(form);
    };
    search=function () {

        var search_text=document.getElementById('inputGroupSuccess1').value;
        if(search_text.trim()!='')
        {
            if(search_text.trim().length>2)
            {
                $("#search_product_form").submit();
            }

        }


    }

</script>
@yield('footer')
</body>
</html>
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
    <link href="{{ url('css/mobile.css') }}" rel="stylesheet">
    <title>فروشگاه اینترنتی دیجی آنلاین</title>

</head>
<body>



<div style="width:100%">


    <div class="cat_box" id="cat_box">


        <div class="col-xs-9" id="cat_list">


            <div class="cat_list_header">
                <p>دیجی آنلاین</p>
            </div>
            <ul class="cat_list_ul">
                @foreach($category as $key=>$value)
                 <li onclick="show_child_cat({{ $value->id }})"><span style="padding-right:15px;">{{ $value->cat_name }}</span>
                     <span id="span_ic_{{ $value->id }}" class="fa fa-angle-down cat_angle"></span>
                     <ul id="child_ul_{{ $value->id }}">
                         @foreach($value->getChild as $key2=>$value2)
                             <li><a  href="{{ url('category').'/'.$value->cat_ename.'/'.$value2->cat_ename }}"><span>{{ $value2->cat_name }}</span></a></li>
                         @endforeach
                     </ul>
                 </li>
                @endforeach
            </ul>

        </div>
        <div class="col-xs-3" id="back_cat_list" onclick="hide_cat_box()"></div>
    </div>
    <div class="header">
        <ul class="list-inline" id="header_ul">
            <li onclick="show_cat_box()"><span class="fa fa-bars"></span></li>
            <li>دیجی آنلاین</li>

            <li style="float:left"><span class="fa fa-user"></span></li>
            <li style="float:left"><span class="fa fa-shopping-cart"></span></li>
            <li style="float:left"><span class="fa fa-search"></span></li>
        </ul>
    </div>

    <div style="padding-top:50px">
        @yield('content')
    </div>
</div>


<script type="text/javascript" src="{{ url('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ url('js/mobile_js.js') }}"></script>
<script type="text/javascript" src="{{ url('js/bootstrap.js') }}"></script>
@yield('footer')

</body>
</html>
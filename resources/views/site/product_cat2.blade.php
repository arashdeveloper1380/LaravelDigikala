@extends('layouts.site')

@section('style')
    <link href="{{ url('css/ion.rangeSlider.css') }}" rel="stylesheet">
    <link href="{{ url('css/ion.rangeSlider.skinNice.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="row" id="filter_product_box">


        <div class="col-md-3">

            <div class="filter_box">

                <div style="border-bottom: 1px solid #E3E3E3;padding:30px 15px 20px 15px;cursor:pointer">
                    <p onclick="set_status_product()">

                        <span id="status_prodict_ic" class="filter_checkbox"></span>
                        <input id="status_product"  type="checkbox" class="search_checkbox">

                        <span>نمایش محصولات موجود</span>
                    </p>
                </div>

                <div style="direction:ltr;padding-top:20px;padding-bottom:20px;border-bottom: 1px solid #E3E3E3;">

                    <div style="width:90%;margin:auto;text-align:center">
                        <input type="text" id="example_id" name="example_name" value="" />

                        <button class="btn btn-primary" onclick="set_price_search()">اعمال محدوده قیمت</button>
                    </div>

                </div>


                <div style="width:100%;">
                    <?php
                    $a=array();
                    ?>
                    <ul class="cat_ul">
                        <li><span class="fa fa-angle-left"></span> <span>{{ $category2->cat_name }}</span>
                            <ul>
                                @foreach($cat_list as $key=>$value)

                                    @if(!array_key_exists($value->cat_ename,$a))
                                        <li><a href="{{ url('category').'/'.$category1->cat_ename.'/'.$category2->cat_ename.'/'.$value->cat_ename }}">{{ $value->cat_name }}</a></li>
                                    @endif

                                        <?php
                                        $a[$value->cat_ename]=1;
                                        ?>
                                @endforeach
                            </ul>
                        </li>
                    </ul>


                </div>


            </div>

        </div>


        <div class="col-md-9 show_product"  style="background:white">


            <div style="width:97%;margin:auto" >
                <div style="width:100%;float:right">

                    <ul class="list-inline" id="search_ul">
                        <li><a href="{{ url('') }}">فروشگاه اینترنتی دیجی آنلاین</a><span class="fa fa-angle-left"></span></li>
                        <li><a href="{{ url('category').'/'.$category1->cat_ename }}">{{ $category1->cat_name }}</a><span class="fa fa-angle-left"></span></li>
                        <li><a href="{{ url('category').'/'.$category1->cat_ename.'/'.$category2->cat_ename }}">{{ $category2->cat_name }}</a></li>

                    </ul>

                </div>
            </div>


            <div style="width:100%;float:right;position:relative;margin-top:10px;margin-bottom:10px">

                <div style="float:right;">
                    <p style="padding-right:15px">
                        <span>{{ $category2->cat_name }}</span>
                        <span>(</span>
                        <span>نمایش از </span>
                        <span>1</span>
                        <span> - {{ sizeof($data['product']) }}</span>
                        <span> محصول از </span>
                        <span>{{ $data['total_product'] }}</span>
                        <span>)</span>
                    </p>
                </div>
                <div class="search_input_box">
                    <input type="text" id="search_input" class="form-control search_input" placeholder="جست و جو در نتایج">
                    <span class="fa fa-search" onclick="search_product()"></span>
                </div>
            </div>


            <div style="padding-top:15px;width:100%;float:right">
                <span style="padding-right:15px;">مرتب سازی بر اساس : </span>
                <ul class="search_type_ul">
                    <li id="search_type_1" class="active" onclick="set_type(1)">جدیدترین</li>
                    <li id="search_type_2" onclick="set_type(2)">پربازدیدترین</li>
                    <li id="search_type_3"  onclick="set_type(3)">پرفروش ترین</li>
                    <li id="search_type_4" onclick="set_type(4)">ارزانترین</li>
                    <li id="search_type_5" onclick="set_type(5)">گرانترین</li>
                </ul>
            </div>

            <div  id="show_product" style="width:100%;float:right;border-top:1px solid silver">
                @include('include.product_list',['product'=>$data['product'],'cat_url'=>''])

            </div>

        </div>

    </div>

@endsection




@section('footer')
<script type="text/javascript" src="{{ url('js/list.min.js') }}"></script>
<script src="{{ url('js/ion.rangeSlider.min.js') }}"></script>
<script>
        <?php
        $url=url('ajax/set_filter_product');
        ?>
var number_compare=0;
var product_status=0;
var compare_product_list='';
var product_type=1;
var search_text='';
var first_price=0;
var last_price=0;
        var $range = $("#example_id");

        $range.ionRangeSlider({
            type: "double",
            min:<?= $price['price1'] ?>,
            max:<?= $price['price2'] ?>,
            from:<?= $price['price1'] ?>,
            to:<?= $price['price2'] ?>,
            step: 100,
            onFinish: function (data)
            {
                var a=data.from;
                var b=data.to;
                first_price=a;
                last_price=b;
            }
        });
send_data=function (url)
{
    var cat_id='<?= $category2->id ?>';
    var array=new  Array;
    var checkbox_list=document.getElementsByClassName('search_checkbox');
    var j=0;
    var cat_url='<?= $cat_url ?>';
    for(var i=0;i<checkbox_list.length;i++)
    {
        if(checkbox_list[i].checked)
        {
            array[j]=checkbox_list[i].value;
            j++;
        }
    }
    $.ajaxSetup(
        {
            'headers':{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
    $.ajax({
        url:url,
        type:"POST",
        data:'filter_product='+array+'&cat_url='+cat_url+'&product_status='+product_status+'&type='+product_type+'&search_text='+search_text+'&first_price='+first_price+'&last_price='+last_price+'&cat_id='+cat_id,
        success:function (data)
        {
            $("#show_product").html(data);
        }
    });
};
set_type=function (type)
{
    product_type=type;
    $('.search_type_ul li').removeClass('active');
    $("#search_type_"+type).addClass('active');
    send_data('<?= $url ?>');
};
        $('.pagination a').click(function (event) {
            event.preventDefault();
            var url=$(this).attr('href');
            var url=url.split('page=');
            if(url.length==2)
            {
                var ajax_url='<?= $url ?>?page='+url[1];
                send_data(ajax_url);
            }
        });

        set_price_search=function ()
        {
            send_data('<?= $url ?>');
        };
        set_status_product=function ()
        {
            var c=document.getElementById('status_product');
            if(c)
            {
                if(c.checked)
                {
                    product_status=0;
                    c.checked=false;
                    $("#status_prodict_ic").removeClass('filter_checkbox2');
                    $("#status_prodict_ic").addClass('filter_checkbox');
                }
                else
                {
                    product_status=1;
                    c.checked=true;
                    $("#status_prodict_ic").removeClass('filter_checkbox');
                    $("#status_prodict_ic").addClass('filter_checkbox2');
                }
            }
            send_data('<?= $url ?>');
        };

        search_product=function ()
        {
            var text=document.getElementById('search_input').value;
            if(text.trim()!='')
            {
                search_text=text;
                send_data('<?= $url ?>');
            }
        };
</script>

@endsection
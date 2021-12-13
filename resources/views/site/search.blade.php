@extends('layouts.site')

@section('style')
    <link href="{{ url('css/ion.rangeSlider.css') }}" rel="stylesheet">
    <link href="{{ url('css/ion.rangeSlider.skinNice.css') }}" rel="stylesheet">
@endsection
@section('content')

    <?php
      $filter_box_id=array();
    ?>
    <div class="row" id="filter_product_box">

        <div class="col-md-3">

            <div class="filter_box">

                <div style="width:95%;margin:auto" id="filter_name_box">
                    <p style="padding-top:20px">انتخاب شما</p>

                    @foreach($filter_id as $key=>$value)

                       @if(!empty($value['name']))
                           <?php
                            $filter_box_id[$value['parent_id']]=1;
                            ?>
                            <div class="search_item" id="filter_items_<?= $key ?>" onclick="remove_filter('<?= $key ?>')">
                                <span>{{ $value['name'] }}</span>
                                <span class="fa fa-remove"></span>
                            </div>
                       @endif
                    @endforeach
                </div>

                <div style="clear:both"></div>
                <?php
                    $k=0;
                    $id_list=array();

                ?>

                <div style="border-bottom: 1px solid #E3E3E3;padding:30px 15px 20px 15px;cursor:pointer">
                    <p onclick="set_status_product()">

                        <span id="status_prodict_ic" class="filter_checkbox"></span>
                        <input id="status_product"  type="checkbox" class="search_checkbox">

                        <span>نمایش محصولات موجود</span>
                    </p>
                </div>

                <div style="direction:ltr;padding-top:20px;padding-bottom:20px;border-bottom: 1px solid #E3E3E3;">

                    <div style="width:90%;margin:auto">
                        <input type="text" id="example_id" name="example_name" value="" />

                        <button class="btn btn-primary" onclick="set_price_search()">اعمال محدوده قیمت</button>
                    </div>

                </div>
                @foreach($filter as $key=>$value)

                    @php
                    $child_item=$value->get_child;
                    $item_size=sizeof($child_item);
                    @endphp
                    <div class="filter" id="filters_<?= $value->id ?>">
                        <p onclick="show_list('<?= $value->id ?>')" style="cursor:pointer">
                            <span>{{ $value->name }}</span>
                            <span id="angle-down_{{ $value->id }}" class="fa fa-angle-down angle-down"></span>
                        </p>


                        <div class="filter_search_item"  @if(array_key_exists($value->id,$filter_box_id)) style="display:block" @endif id="filter_search_item_{{ $value->id }}">

                            @if($item_size>10)

                                <?php
                                $id_list[$k]=$value->id;
                                $k++;
                                ?>
                                <input class="search" placeholder="جست و جو کنید" />

                            @endif
                                <ul class="list">
                                    @foreach($child_item as $key2=>$value2)

                                        <?php
                                        $name=$value2->name;
                                        if($value->filed==2)
                                        {
                                            $color=explode('@',$value2->name);
                                            if(sizeof($color)==2)
                                            {
                                                $name=$color[0];
                                            }
                                        }
                                        ?>
                                        <li onclick="set_filter('<?= $value->id ?>','<?= $value2->id ?>','<?= $name ?>')">
                                            @if($value->filed==1)

                                                @php
                                                    $class_name='filter_checkbox';
                                                    if(array_key_exists($value2->id,$filter_id))
                                                    {
                                                       $class_name='filter_checkbox2';
                                                    }
                                                @endphp
                                                <input id="filter_checkbox_<?= $value2->id ?>" type="checkbox" @if(array_key_exists($value2->id,$filter_id)) checked="checked"  @endif class="search_checkbox"  value="{{ $value->ename }}_{{ $value2->id }}">
                                                <span id="filter_li_<?= $value2->id ?>" class="{{ $class_name }}"></span>
                                                <span class="test">{{ $value2->name }}</span>
                                            @else
                                                <input id="filter_checkbox_<?= $value2->id ?>" type="checkbox" @if(array_key_exists($value2->id,$filter_id)) checked="checked"  @endif class="search_checkbox"  value="{{ $value->ename }}_{{ $value2->id }}">


                                                <?php
                                                $color=explode('@',$value2->name);

                                                ?>
                                                @if(sizeof($color)==2)

                                                    <label class="color_search" data-toggle="tooltip" title="{{ $color[0] }}" style="background:#{{ $color[1] }};@if($key2!=0) margin-right:10px @endif"></label>
                                                @endif

                                            @endif


                                        </li>
                                    @endforeach
                                </ul>

                        </div>




                        <div style="clear:both"></div>
                    </div>

                @endforeach


            </div>

        </div>


        <div class="col-md-9 show_product"  style="background:white">


            <div style="width:97%;margin:auto" >
                <div style="width:100%;float:right">

                    <ul class="list-inline" id="search_ul">
                        <li><a href="{{ url('') }}">فروشگاه اینترنتی دیجی آنلاین</a><span class="fa fa-angle-left"></span></li>
                        <li><a href="{{ url('category').'/'.$category1->cat_ename }}">{{ $category1->cat_name }}</a><span class="fa fa-angle-left"></span></li>
                        <li><a href="{{ url('category').'/'.$category1->cat_ename.'/'.$category2->cat_ename }}">{{ $category2->cat_name }}</a><span class="fa fa-angle-left"></span></li>
                        <li><a href="{{ url('category').'/'.$category1->cat_ename.'/'.$category2->cat_ename.'/'.$category3->cat_ename }}">{{ $category3->cat_name }}</a></li>
                    </ul>

                </div>
            </div>

            <div style="width:100%;float:right;position:relative;margin-top:10px;margin-bottom:10px">

                <div style="float:right;">
                    <p style="padding-right:15px">
                        <span>{{ $category3->cat_name }}</span>
                        <span>(</span>
                        <span>نمایش از </span>
                        <span>1</span>
                        <span> - {{ sizeof($product) }}</span>
                        <span> محصول از </span>
                        <span>{{ $total_product }}</span>
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
            @include('include.product_list',['product'=>$product,'cat_url'=>$cat_url])

            </div>

        </div>

    </div>


    <div class="compare" id="compare">
        <span id="compare__toggle-handler" class="compare__toggle-handler active" onclick="show_compare_box()">
            مقایسه (<span id="number_compare"></span>) مورد
        </span>

        <div class="col-md-10" id="compare_right_box"></div>
        <div id="compare_left_box" class="col-md-2">

            ‌<a class="btn btn-primary" id="compare_product_link"></a>
            <a style="color:red" onclick="del_compare_product()">حذف همه</a>

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



set_filter=function(id1,id2,name)
{
   var c=document.getElementById('filter_li_'+id2);
   var c2=document.getElementById('filter_checkbox_'+id2);
   if(c)
   {
       if(c.className=='filter_checkbox')
       {
           c.className='filter_checkbox2';
       }
       else if(c.className=='filter_checkbox2')
       {
           c.className='filter_checkbox';
       }
   }
   if(c2)
   {
       if(c2.checked)
       {
           c2.checked=false;
           $("#filter_items_"+id2).remove();
       }
       else
       {
           c2.checked=true;
           var id='filter_items_'+id2;
           var html='<div class="search_item"  onclick="remove_filter('+id2+')" id='+id+'>' +
               '<span>'+name+'</span>' +
               '<span class="fa fa-remove"></span></div>';
           $("#filter_name_box").append(html);
       }

   }

    send_data('<?= $url ?>');

};
remove_filter=function (id)
{
   $("#filter_items_"+id).remove();
    var c=document.getElementById('filter_li_'+id);
   var c2=document.getElementById('filter_checkbox_'+id);
   if(c2)
   {
       c2.checked=false;
   }
   if(c)
   {
       c.className='filter_checkbox';
   }
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
send_data=function (url)
{
    var cat_id='<?= $category3->id ?>';
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
var options = {
    valueNames: [ 'test']
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
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});
show_list=function (id)
{
    var c=document.getElementById('filter_search_item_'+id);
    if(c)
    {
       if(c.style.display=='block')
       {
           $("#angle-down_"+id).addClass('fa-angle-down');
           $("#angle-down_"+id).removeClass('fa-angle-up');
           $("#filter_search_item_"+id).hide();
       }
       else
       {
           $("#angle-down_"+id).addClass('fa-angle-up');
           $("#angle-down_"+id).removeClass('fa-angle-down');

           $("#filter_search_item_"+id).show();
       }
    }
};
<?php
 foreach ($id_list as $key=>$value)
 {
     ?>
var userList_<?= $key ?> = new List('filters_<?= $value ?>', options);

<?php
 }
?>
$('.search_product_box').hover(function () {

        $('.product_item_compare',this).show();
    },
    function () {
        $('.product_item_compare',this).hide();
    });
add_compare_product=function (id,title,img)
{
   var c=document.getElementById('compare_'+id).className;
   if(c=='checkbox2')
   {
       if(number_compare<4)
       {
           compare_product_list=compare_product_list+'/DKP-'+id;
           number_compare=number_compare+1;
           document.getElementById('compare_'+id).className='active_checkbox2';

           var span='مقایسه ('+number_compare+' ) مورد';
           $("#compare_product_link").html(span);
           $("#compare_product_link").attr('href','{{ url('Compare') }}'+compare_product_list);

           $("#compare__toggle-handler").show();
           $("#number_compare").text(number_compare);
           var product_title=title.substr(0,33);
           if(title.length>33)
           {
               product_title=product_title+' ...';
           }
           var src='{{ url('upload').'/' }}'+img;
           var html='<div id="product_'+id+'" class="compare_product_box">' +
               '<div class="compare_img_box">' +
               '<span class="fa fa-remove" onclick="del_compare('+id+')"></span>' +
               '<img src="'+src+'" class="compare_product_img">' +
               '</div>' +
               '<p style="font-size:13px;padding-top:7px;text-align:center">'+product_title+'</p>'+
               '</div>';

           $("#compare_right_box").append(html);
       }
       else
       {
           alert('حداکثر 4 محصول را میتوانید به لیست مقایسه اضافه کنید');
       }


   }
   else if(c=='active_checkbox2')
   {
       document.getElementById('compare_'+id).className='checkbox2';
       number_compare=number_compare-1;
       if(number_compare>0)
       {
           $("#compare__toggle-handler").show();
           $("#number_compare").text(number_compare);
       }
       else
       {
           $("#compare__toggle-handler").hide();
       }
       $("#product_"+id).remove();

   }

};
show_compare_box=function ()
{
    var h=document.getElementById('compare').style.height;
    if(h=='auto')
    {
        document.getElementById('compare').style.height='0px';
    }
    else
    {
        document.getElementById('compare').style.height='auto';
    }

};
del_compare_product=function ()
{
    var c =compare_product_list;
    var b=c.split('/');
    for (var i=0;i<b.length;i++)
    {
        if(b[i].trim()!='')
        {
            var a=b[i].split('-');
            if(a.length==2)
            {
                if(a[0]=='DKP')
                {
                    $("#product_"+a[1]).remove();
                    var t=document.getElementById('compare_'+a[1]);
                    if(t)
                    {
                        t.className='checkbox2';
                    }
                }
            }
        }

    }
    $("#compare__toggle-handler").hide();
    number_compare=0;
    compare_product_list='';
    document.getElementById('compare').style.height='0px';
};
del_compare=function (id)
{
  $("#product_"+id).hide();
  if(number_compare>0)
  {
      number_compare=number_compare-1;
  }
  var s='/DKP-'+id;
    compare_product_list=compare_product_list.replace(s,'');

    var span='مقایسه ('+number_compare+' ) مورد';
    $("#compare_product_link").html(span);
    $("#compare_product_link").attr('href','{{ url('Compare') }}'+compare_product_list);
    if(number_compare==0)
    {
        document.getElementById('compare').style.height='0px';
        $("#compare__toggle-handler").hide();
    }
};
set_type=function (type)
{
    product_type=type;
    $('.search_type_ul li').removeClass('active');
    $("#search_type_"+type).addClass('active');
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
set_price_search=function ()
{
    send_data('<?= $url ?>');
}
</script>

@endsection
@extends('mobile.layout')

@section('style')
<link href="{{ url('css/toggles-full.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <?php
    $url=url('ajax/set_filter_product');
    $cat_url='';
    ?>
    <div class="filter_box" id="filter_box">

            <div style="width:100%;">

                <div class="header_filter_box">
                    <p>
                        <span style="float:right">{{ $category3->cat_name }}</span>
                        <span class="fa fa-close" onclick="close_filter_box()"></span>
                    </p>
                </div>
                <ul class="list-inline filter_ul">


                    <li onclick="show_child_filter(0)">براساس قیمت</li>
                    @foreach($filter as $key=>$value)

                        <li onclick="show_child_filter({{ $value->id }})">{{ $value->name }}</li>
                    @endforeach
                </ul>




            </div>



        <div style="width:100%;height:calc(100% - 150px)">

            <div class="child_filter_div" style="display:block"  id="filter_div_0">


                <?php


                $price1=$price['price1'];
                $price2=$price['price2'];
                if($price1>0 && $price2>0)
                {
                $n=$price2/$price1;
                $n=ceil($n);
                if($n>0)
                {
                ?>
                <ul  class="filter_child_ul">
                    <?php
                    $p=$price1;
                    for($i=1;$i<$n;$i++)
                    {
                    $p1=$p;
                    $p=$p+$price1;
                    $c=number_format($p1).' - '.number_format($p).' تومان';

                    ?>
                    <li onclick="set_filter_price({{ $i }})">
                        <span>{{ $c }}</span>
                        <input class="price_input" id="price_input_{{ $i }}" type="checkbox" value="{{ $p1 }}_{{ $p }}">
                        <span  id="price_filter_{{ $i }}" class="filter_checkbox"></span>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
                <?php
                }
                }

                ?>

            </div>
            @foreach($filter as $key=>$value)

                <div class="child_filter_div"  id="filter_div_{{ $value->id }}">
                    <ul class="filter_child_ul">



                        @foreach($value->get_child as $key2=>$value2)

                            <?php
                            $name='';
                            if($value2->filed==1)
                            {
                                $name=$value2->name;
                            }
                            elseif($value2->filed==2)
                            {
                                $e=explode('@',$value2->name);
                                if(sizeof($e)==2)
                                {
                                    $name=$e[0];
                                }
                            }

                            ?>


                            <li onclick="set_filter('<?= $value->id ?>','<?= $value2->id ?>')">
                                <input id="filter_checkbox_<?= $value2->id ?>" value="{{ $value->ename }}_{{ $value2->id }}" type="checkbox" class="search_checkbox">
                                <span>{{ $name }}</span>
                                <span  id="filter_li_<?= $value2->id ?>" class="filter_checkbox"></span>
                            </li>
                        @endforeach
                    </ul>
                </div>

            @endforeach

        </div>




        <div style="width:100%;position:fixed;height:108px;bottom:0px;">
            <div style="width:100%;float:right;padding-bottom:20px;">
                <div style="width:50%;float:right;text-align:center">
                    <button class="btn btn-default" style="margin:auto" onclick="remove_all_filter()">پاک کردن همه</button>
                </div>

                <div style="float:right;width:50%;">
                    <div class="toggle-light" style="margin:10px auto;"></div>
                </div>

            </div>

            <button class="btn btn-primary btn_filter2" onclick="send_data('<?= $url ?>');">فیلتر کن</button>

        </div>

    </div>

    <div class="loading_div">
        <div class="loading2"></div>

    </div>

    <div style="width:100%;padding-bottom: 80px;" id="show_product">


          <div style="width:100%;background:white;padding-top:10px;padding-bottom:15px">

              <div style="width:90%;margin:auto">
                  <label style="padding-top:10px">{{ $category3->cat_name }}</label>
                  <label class="sort_div">
                      <span class="fa fa-sort-amount-desc" onclick="show_sort_select()"></span>
                  </label>
                  <select class="sort_select" id="sort_select">
                      <option value="1">جدیدترین</option>
                      <option value="2">پربازدیدترین</option>
                      <option value="3">پرفروش ترین</option>
                      <option value="4">ارزانترین</option>
                      <option value="5">گرانترین</option>
                  </select>
              </div>
          </div>
           @include('mobile.include.product_list',['product'=>$products])


    </div>


    <div style="width:100%">
        <button class="btn btn-default btn_filter" onclick="show_filter_box()"><span>فیلتر کن</span><span></span></button>

    </div>

@endsection

@section('footer')
<script type="text/javascript" src="{{ url('js/toggles.min.js') }}"></script>
<script>
var product_status=0;
var first_price=0;
var last_price=0;
set_filter=function(id1,id2)
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
            }

        }



    };
send_data=function (url)
{
    var cat_id='<?= $category3->id ?>';
    $('.filter_box').hide();
    $(".loading_div").show();
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
        data:'filter_product='+array+'&cat_url='+cat_url+'&product_status='+product_status+'&first_price='+first_price+'&last_price='+last_price+'&cat_id='+cat_id,
        success:function (data)
        {

            document.body.style.overflow='auto';
            $("#show_product").html(data);
            $(".loading_div").hide();
        }
    });
};
set_filter_price=function (id)
{
    first_price=0;
    last_price=0;
    var c=document.getElementById('price_filter_'+id);
    var ch=document.getElementById('price_input_'+id);
    if(c && ch)
    {
        if(c.className=='filter_checkbox')
        {
            c.className='filter_checkbox2';
            ch.checked=true;
        }
        else if(c.className=='filter_checkbox2')
        {
            c.className='filter_checkbox';
            ch.checked=false;
        }
    }
    var price_input=document.getElementsByClassName('price_input');
   for(var i=0;i<price_input.length;i++)
   {
       if(price_input[i].checked)
       {
           var v=price_input[i].value.split('_');
           if(v.length==2)
           {
              if(first_price==0)
              {

                  first_price=v[0];
              }
              else
              {
                  if(parseInt(v[0])<parseInt(first_price))
                  {
                      first_price=v[0];
                  }
              }

               if(last_price==0)
               {

                   last_price=v[1];
               }
               else
               {
                   if(parseInt(v[1])>parseInt(last_price))
                   {
                       last_price=v[1];
                   }
               }
           }
       }

   }
 //  send_data('<?= $url ?>');
};
$('.toggle-light').toggles({
    type:'select',
    text:{'on':'','off':''},
    width:40
});
$('.toggle-light').on('toggle',function (e,action)
{
   if(action)
   {
       product_status=1;
   }
   else
   {
       product_status=0;
   }
});
remove_all_filter=function ()
{
    product_status=0;
    first_price=0;
    last_price=0;

    var checkbox_list=document.getElementsByClassName('search_checkbox');
    for(var i=0;i<checkbox_list.length;i++)
    {
        checkbox_list[i].checked=false;
    }
    var c=document.getElementsByClassName('filter_checkbox2');
    for(var j=0;j<c.length;j++)
    {
        c[j].className='filter_checkbox';
    }
};
show_sort_select=function ()
{
  //$("#sort_select").show();
}
</script>
@endsection

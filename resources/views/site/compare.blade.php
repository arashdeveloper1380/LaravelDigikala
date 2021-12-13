@extends('layouts.site')


@section('content')

    <div class="row content_box" >
        <?php

        $s=4-sizeof($products);
        ?>

           <div style="width:95%;margin:auto">
               <div style="width:{{ sizeof($products)*25 }}%;float:right">



                   <div id="product_compare_list">

                       @foreach($products as $key2=>$value2)
                           <div class="product_compare">
                               
                               <img src="{{ url('upload').'/'.$value2->get_img->url }}">
                               <p><a href="{{ url('product').'/'.$value2->code_url.'/'.$value2->title_url }}">
                                       {{ mb_substr($value2->title,0,33).' ... ' }}
                                   </a></p>
                               <p>
                                   <a href="{{ url('product').'/'.$value2->code_url.'/'.$value2->title_url }}">
                                       {{ $value2->code }}
                                   </a>
                               </p>
                           </div>
                       @endforeach




                           <div style="clear:both"></div>
                   </div>

                   <div style="clear:both"></div>
                   @foreach($items as $item)
                       <div class="compare_item_box">
                           <span class="icon_item_name"></span>
                           <span>{{ $item->name }}</span>

                           <span class="fa fa-angle-up"></span>
                       </div>

                       <table class="compare-table" id="compare_table" style="width:100%">

                           @foreach($item->get_child as $key=>$value)

                               <tr>
                                   <td class="table-item-header">{{ $value->name }}</td>
                                   @foreach($products as $key2=>$value2)


                                       @if($value2)
                                           <td class="value_compare">
                                               @if(array_key_exists($value2->id,$product_items))

                                                   @if(array_key_exists($value->id,$product_items[$value2->id]))

                                                       @if($product_items[$value2->id][$value->id]==1)
                                                           <span class="fa fa-check" style="color:green;"></span>

                                                       @elseif($product_items[$value2->id][$value->id]==2)
                                                           <span class="fa fa-close" style="color:red"></span>
                                                       @else
                                                           {!! nl2br(str_replace('@#!','',$product_items[$value2->id][$value->id])) !!}
                                                       @endif

                                                   @endif
                                               @endif
                                           </td>
                                       @endif
                                   @endforeach

                               </tr>

                           @endforeach
                       </table>
                   @endforeach

               </div>

               <div style="width:{{ $s*25 }}%;float:right;margin-top:30px">
                   @for($i=0;$i<$s;$i++)

                       <div class="product_compare compare-selectbox-container">

                           <div style="width:85%;margin:auto;position:relative">
                               <p style="padding-top:20px;text-align:right;">افزودن</p>
                               <div class="chosen_cat_product" id="chosen_cat_product_{{ $i }}" onclick="show_cat_box('{{ $i }}')">
                                   <p>
                                       <span>انتخاب دسته</span>
                                       <span class="fa fa-angle-down"></span>
                                   </p>
                               </div>




                               <div class="compare_cat_box_div" id="compare_cat_box_div_{{ $i }}">
                                   <div  class="cat_search_box">
                                       <input class="search" placeholder="جست و جو کنید" />

                                   </div>
                                   <div style="overflow-y:auto;max-height:150px;">
                                       <ul class="list cat_list_ul">
                                           @foreach($cat_list as $key=>$value)
                                               <li onclick="get_product_cat('{{ $key }}','{{ $i }}')"><span class="p_cat_name">{{ $value }}</span></li>
                                           @endforeach
                                       </ul>
                                   </div>
                               </div>

                               <div class="chosen_product" id="chosen_product"  onclick="">
                                   <p>
                                       <span>انتخاب مدل</span>
                                       <span class="fa fa-angle-down"></span>
                                   </p>
                               </div>
                               <div id="product_box_{{ $i }}" class="compare_select_product"></div>
                           </div>
                       </div>
                   @endfor
               </div>
           </div>




    </div>
@endsection


@section('footer')
<?php

        $n=(sizeof($products)>0) ? sizeof($products) : 1;
$url=url('ajax_get_compare_product');

?>
    <script type="text/javascript" src="{{ url('js/list.min.js') }}"></script>
<script>

 set_width=function () {
     var w=document.getElementById('compare_table');
     if(w)
     {
        var a=w.clientWidth-180;
        var n='{{ $n }}';
        var b=a/n;
        var td=document.getElementsByClassName('value_compare');
        for(var i=0;i<td.length;i++)
        {
            td[i].style.width=b+'px';
        }
     }

     var product_compare=document.getElementsByClassName('product_compare');
     for (var j=0;j<product_compare.length;j++)
     {
         var y=b-15;
         product_compare[j].style.width=y+'px';
     }

 };
 set_width();
 var options = {
     valueNames: ['p_cat_name']
 };
 <?php

 for ($i=0;$i<$s;$i++)
     {
         ?>
 var userList = new List('compare_cat_box_div_{{ $i }}', options);
<?php
     }
 ?>

 show_cat_box=function (id)
 {
     var c=document.getElementById('compare_cat_box_div_'+id).style.display;
     if(c=='block')
     {
         $("#compare_cat_box_div_"+id).slideUp();
     }
     else
     {
         $("#compare_cat_box_div_"+id).slideDown();
     }
     document.getElementById('compare_cat_box_div_'+id).style.borderTop='0px';
     document.getElementById('chosen_cat_product_'+id).style.borderBottom='0px';
     $("#product_box_"+id).hide();
 };
 get_product_cat=function (id,box_id)
 {
     $("#compare_cat_box_div_"+box_id).slideUp();
     $.ajaxSetup(
         {
             'headers':{
                 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
         });

     $.ajax({
         url:'{{ $url }}',
         type:'POST',
         data:'cat_id='+id,
         success:function (data)
         {
             $("#product_box_"+box_id).html('');
             document.getElementById('chosen_product').setAttribute('style','background:#FFF !important');
              var product =$.parseJSON(data);
             for(var i=0;i<product.length;i++)
             {
                 var img='{{ url('upload') }}/'+product[i].get_img.url;
                 var div='<div>' +
                     '<div class="col-md-3"><img src="'+img+'"></div>' +
                     '<div class="col-md-9">' +
                     '<p>'+product[i].title+'</p>' +
                     '<p>'+product[i].code+'</p>' +
                     '</div>' +
                     '</div>';
                 $("#product_box_"+box_id).append(div);
             }
            //$("#product_box_"+box_id).slideDown();
         }
     });
 }
</script>
@endsection
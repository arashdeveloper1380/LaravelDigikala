@extends('layouts.site')


@section('content')

    <div class="row content_box">


        <div class="col-md-5"  style="padding-bottom:50px">

            <div style="margin-top:30px;width:100%;float:right;">
                <div class="products-availability-image"></div>
                <div style="float: left;">
                    <ul class="list-inline">
                        <li><span class="current-product-3d"></span></li>

                        <li><span class="icon-statistics"></span></li>
                        <li><span class="icon-love"></span></li>
                    </ul>
                </div>
            </div>
            <?php
                $images=$product->get_images;
            ?>
            <div class="show_product_img">
                @if(sizeof($images)>0)
                    <img class="zoom" src="{{ url('upload').'/'.$images[0]->url }}"  data-zoom-image="{{ url('upload').'/'.$images[0]->url }}">
                @endif
            </div>
            <div class="img_box">
                @foreach($images as $key=>$value)
                    
                    @if($key<3)
                        <img onclick="change_img('<?= url('upload').'/'.$value->url ?>')" src="{{ url('upload').'/'.$value->url }}">
                    @endif

                @endforeach

                @if(sizeof($images)>3)

                    <div class="show_more_img" onclick="show_more_img()">
                        <div></div>
                    </div>
                @endif

            </div>
        </div>

        <div class="col-md-7">

            <div id="img_load_zoom"></div>
            <div class="show_product_title">
                <div class="col-md-9">
                    <h4>{{ $product->title }}</h4>
                    <p>{{ $product->code }}</p>
                </div>
                <div class="col-md-3">

                    <?php
                    $avg=collect($score_data['score'])->avg();
                    $avg=substr($avg,0,4);
                    $width=$avg*20;
                    ?>
                    <div class="rating">
                        <div class="gray">
                            <div class="red" style="width:{{ $width }}%"></div>
                        </div>
                    </div>
                    <div style="width:100px;margin:5px auto">

                        <p  style="font-size:10px;"> از {{ $score_data['total'] }} رای </p>
                    </div>
                </div>
                <div style="clear:both">
                </div>
            </div>


            @if($product->product_status==1)

                <form method="post" action="{{ url('Cart') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                <?php
                $colors=$product->get_colors;
                $color_id=0;
                ?>

                <div id="product_info">
                    <?php
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

                <div style="width:100%;float: right;">

                    @if(sizeof($product->get_service_name)>0)

                        <p style="padding-top:20px">انتخاب گارانتی</p>



                        <?php
                            $c=0;
                        ?>
                        @foreach($product->get_service_name as $key=>$value)

                            @if($color_id==0)

                                @if($key==0)
                                    <div class="service_title" onclick="show_service()">
                                        <span>{{ $value->service_name }}</span>
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
                                               <span>{{ $value->service_name }}</span>
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


                </div>


                <div style="width:100%;float:right;margin-top: 15px;">

                    <p><span>قیمت : </span> {{ number_format($product->price) }} تومان</p>
                    @if(!empty($product->discounts))
                        <p><span>قیمت برای شما : </span>  <span style="color:#4CAF50;font-size:16px;">{{ number_format($product->price-$product->discounts) }}</span>  تومان</p>
                    @endif


                    <input type="submit" class="btn btn-success" value="افزودن به سبد خرید">
                </div>

                </div>
                </form>
            @endif


        </div>
    </div>



    <div class="row content_box">

        <ul class="nav nav-tabs" role="tablist" id="myTabs">
            <li role="presentation" class="active"><a href="#review"  aria-controls="review" id="tab_review" role="tab" data-toggle="tab">نفد و بررسی تخصصی</a></li>
            <li role="presentation"><a href="#item" aria-controls="item" id="tab_item" role="tab" data-toggle="tab"><span >مشخصات فنی</span></a></li>
            <li role="presentation"><a href="#comment" aria-controls="comment" id="tab_comment" role="tab" data-toggle="tab"><span>نظرات کاربران</span></a></li>
            <li role="presentation"><a href="#question" aria-controls="question" id="tab_question" role="tab" data-toggle="tab"><span>پرسش و پاسخ</span></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="review">

               <div style="width:95%;margin:50px auto;text-align:justify">
                   <h3 style="color: #2196F3;padding-bottom: 15px;"> نقد و بررسی متخصصین دیجی کالا</h3>

                   @if($review)

                       <?php

                           $review_tozihat=$review->review_tozihat;
                           $f=strpos($review_tozihat,'start_review');
                           $t=substr($review_tozihat,0,$f);
                           echo strip_tags($t,'<img><p>');
                           $t2=substr($review_tozihat,$f,strlen($review_tozihat));
                           $text=explode('start_review',$t2);
                           foreach ($text as $key=>$value)
                           {
                               if(!empty($value))
                               {
                                   $d="<div class='review_title' onclick='show_review($key)' id='review_title_$key'>";
                                   $d2="</div><div class='review_div' id='review_div_$key' >";
                                   $v=str_replace('start_item',$d,$value);

                                   $v=str_replace('end_item',$d2,$v).'<div style="clear: both;"></div></div>';

                                    echo strip_tags($v,'<img><p><div>');
                               }
                           }
                       ?>
                   @else


                       <p style="color:red;padding-top:30px;padding-bottom:30px;text-align:center">نقد و بررسی تخصصی برای این محصول ثبت نشد</p>

                   @endif
               </div>

            </div>

            <div role="tabpanel" class="tab-pane" id="item">

                @include('include.product_item',['product'=>$product,'item_value'=>$item_value,'items'=>$items])


            </div>
            <div role="tabpanel" class="tab-pane" id="comment">


                <div class="row" style="margin-top:30px;margin-bottom:20px">

                    <div class="col-md-7" >
                        <ul class="rang_ul" >
                            <?php

                            $item_name=array();
                            $item_name[1]='کيفيت ساخت';
                            $item_name[2]='ارزش خريد به نسبت قيمت';
                            $item_name[3]='نوآوري';
                            $item_name[4]='امکانات و قابليت ها';
                            $item_name[5]='سهولت استفاده';
                            $item_name[6]='طراحي و ظاهر';


                            function get_width($value,$n)
                            {
                                if($value>=$n)
                                {
                                    return 100;
                                }
                                else
                                {
                                    $c=$n-$value;
                                    if($c<1)
                                    {
                                        return $c*100;
                                    }
                                    else
                                    {
                                        return 0;
                                    }
                                }
                            }
                            ?>
                            @foreach($item_name as $key=>$value)

                                <li>
                                    <span>{{ $value }}</span>
                                    <div class="rating-container">
                                        <div class="bar2"><div style="width:{{ get_width($score_data['score'][$key],1) }}%" class="holder2"></div>
                                            @if($score_data['score'][$key]<1)
                                                <div class="number_score">{{ substr($score_data['score'][$key],0,3) }}</div>
                                            @endif
                                        </div>
                                        <div class="bar2"><div style="width:{{ get_width($score_data['score'][$key],2) }}%" class="holder2"></div>
                                            @if($score_data['score'][$key]>1 && $score_data['score'][$key]<2)
                                                <div class="number_score">{{ substr($score_data['score'][$key],0,3) }}</div>
                                            @endif
                                        </div>
                                        <div class="bar2"><div style="width:{{ get_width($score_data['score'][$key],3) }}%" class="holder2"></div>
                                            @if($score_data['score'][$key]>=2 && $score_data['score'][$key]<3)
                                                <div class="number_score">{{ substr($score_data['score'][$key],0,3) }}</div>
                                            @endif
                                        </div>
                                        <div class="bar2"><div style="width:{{ get_width($score_data['score'][$key],4) }}%" class="holder2"></div>
                                            @if($score_data['score'][$key]>=3 && $score_data['score'][$key]<4)
                                                <div class="number_score">{{ substr($score_data['score'][$key],0,3)  }}</div>
                                            @endif
                                        </div>
                                        <div class="bar2"><div style="width:{{ get_width($score_data['score'][$key],5) }}%" class="holder2"></div>
                                            @if($score_data['score'][$key]>=4 && $score_data['score'][$key]<=5)
                                                <div class="number_score">{{ substr($score_data['score'][$key],0,3) }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="col-md-5">

                        <p>            شما هم می توانید در مورد این کالا نظر بدهید.

                        </p>

                        @if(Auth::check())

                            <a href="{{ url('AddComment/DKP').'-'.$product->id }}" class="btn btn-primary">ثبت نظر</a>

                        @else

                            <p>
                                برای ثبت نظرات، نقد و بررسی شما لازم است ابتدا وارد حساب کاربری خود شوید. اگر این محصول را قبلا از دیجی کالا خریده باشید، نظر شما به عنوان مالک محصول ثبت خواهد شد.
                            </p>
                        @endif
                    </div>
                </div>

                <div class="loading_box" id="loading_comment" style="padding-top:50px;padding-bottom: 40px;">
                    <div class="loading"></div>
                    <span>در حال دریافت اطلاعات</span>
                </div>



                <div id="comment_box"></div>

            </div>
            <div role="tabpanel" class="tab-pane" id="question">
                <div id="loading_question" class="loading_box" style="padding-top:50px;padding-bottom: 40px;">
                    <div class="loading"></div>
                    <span>در حال دریافت اطلاعات</span>
                </div>



                <div id="question_box">

                </div>

                @if($errors->has('question'))
                    <?php
                    Session::flash('error_question',$errors->first('question'));
                    ?>
                @endif
            </div>
        </div>


    </div>





    <div class="modal fade" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="myModalLabel">
                       {{ $product->title }}
                    </h5>
                </div>
                <div class="modal-body" style="padding-top: 0px;padding-bottom:0px">

                    <div class="row">

                        <div class="col-lg-9 col-md-9 right_img_box">

                           @if(sizeof($images)>0)

                                <img id="product_first_img" src="{{ url('upload').'/'.$images[0]->url }}">
                           @endif

                        </div>


                        <div class="col-lg-3 col-md-3 left_img_box" style="padding-right: 0px;padding-left:0px;">

                            @foreach($images as $key=>$value)
                                
                                <div style="border-bottom:1px solid grey;padding-bottom: 5px">
                                    <img src="{{ url('upload').'/'.$value->url }}" onclick="show_img_product('<?= url('upload').'/'.$value->url ?>')">
                                </div>
                            @endforeach    
                            
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>



@endsection

@section('footer')

    <?php

    $url=url('site/ajax_set_service');
    $url2=url('site/ajax_get_tab_data');
    ?>
 <script type="text/javascript" src="{{ url('js/jquery.elevateZoom-3.0.8.min.js') }}"></script>
 <script>
     $(".zoom").elevateZoom({
         borderSize:1,
         zoomWindowPosition:"img_load_zoom",
         scrollZoom:true,
         cursor:'zoom-in',
         zoomWindowWidth:500,
         zoomWindowHeight:500,
         zoomLevel:0.5
     });
     $('#myTabs a').click(function (e) {
         e.preventDefault();
         $(this).tab('show');
         var product_id='<?= $product->id ?>';
         var id=this.id.replace('tab_','');
         var check_data=document.getElementById('data_'+id);

         if(id=="question" || id=="comment")
         {


             if(!check_data)
             {
                 $("#loading_"+id).show();
                 $.ajaxSetup(
                     {
                         'headers':{
                             'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                         }
                     });

                 $.ajax({
                     url:'{{ $url2 }}',
                     type:'POST',
                     data:'tab_id='+id+'&product_id='+product_id,
                     success:function (data)
                     {
                         $("#loading_"+id).hide();
                         $("#"+id+"_box").html(data);
                     }
                 });
             }

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

         $.ajax({
             url:'{{ $url }}',
             type:'POST',
             data:'service_id='+service_id+'&product_id='+product_id+'&color_id='+color_id,
             success:function (data)
             {
                 $("#loading_box").hide();
                $("#product_info").html(data);
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

         $.ajax({
             url:'{{ $url }}',
             type:'POST',
             data:'service_id='+service_id+'&product_id='+product_id+'&color_id='+color_id,
             success:function (data) {
                 $("#product_info").html(data);
             }
         });
     };
     change_img=function (url)
     {
         var ez=$('.zoom').data('elevateZoom');
         ez.swaptheimage(url,url);
     };
     show_more_img=function () {
         $("#imgModal").modal('show');
     };
     show_img_product=function (url) {

         document.getElementById('product_first_img').src=url;
     }
 </script>
@endsection
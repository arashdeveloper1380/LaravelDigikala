<div id="data_comment">

    <?php

    $item_name=array();
    $item_name[1]='کيفيت ساخت';
    $item_name[2]='ارزش خريد به نسبت قيمت';
    $item_name[3]='نوآوري';
    $item_name[4]='امکانات و قابليت ها';
    $item_name[5]='سهولت استفاده';
    $item_name[6]='طراحي و ظاهر';
    ?>

    @if(sizeof($score)>0)

        @php
            function score_check($score,$n)
            {
                  $a=0;
                  if($score)
                  {
                      $e=explode('@#',$score->value);
                      foreach ($e as $key=>$value)
                      {
                          $k=$n.'_';
                          $c=explode($k,$value);
                          if(sizeof($c)==2)
                          {
                             $a=$c[1];
                          }
                      }
                  }
                  return $a;
            }
        @endphp
        @foreach($score as $key=>$value)

            <div class="row user_comment_box" style="width:97%;margin:20px auto">


                <div class="comment_header">

                    <?php
                    $jdf=new \App\lib\Jdf();
                    $comment=$value->get_comment;
                    ?>
                    @if(!empty($value->get_user->name))

                        <p>{{ $value->get_user->name }}</p>
                    @else
                        <p>کاربر سایت</p>

                    @endif
                    <p style="font-size:11px">{{ $jdf->jdate('n F y',$value->time) }}</p>
                </div>
                <div class="col-md-6" >
                    <ul class="rang_ul" >


                        @foreach($item_name as $k=>$v)

                            <li>
                                <span>{{ $v }}</span>
                                <div class="rating-container">
                                    <div class="bar @if(score_check($value,$k)>=1) done @endif"></div>
                                    <div class="bar @if(score_check($value,$k)>=2) done @endif"></div>
                                    <div class="bar @if(score_check($value,$k)>=3) done @endif"></div>
                                    <div class="bar @if(score_check($value,$k)>=4) done @endif"></div>
                                    <div class="bar @if(score_check($value,$k)==5) done @endif"></div>
                                </div>
                            </li>

                        @endforeach
                    </ul>
                    <div style="clear:both;padding-top: 30px;"></div>
                </div>


                @if($comment)

                    <div class="col-md-6">


                        <p style="margin-top: 35px;">{{ $comment->subject }}</p>

                        @if(!empty($comment->advantages))
                            <p style="color:green;padding-top:10px">نقاط قوت</p>
                            <?php
                            $advantages=explode('@$E@',$comment->advantages);
                            ?>
                            @foreach($advantages as $key=>$value)
                                @if(!empty($value))
                                    <p>
                                        <span class="icon icon-arrow-top"></span>
                                        <span class="icon_span">{{ $value }}</span>
                                    </p>
                                @endif
                            @endforeach
                        @endif

                        @if(!empty($comment->disadvantages))
                            <p style="color:red;padding-top:10px">نقاط ضعف</p>
                            <?php
                            $disadvantages=explode('@$E@',$comment->disadvantages);
                            ?>
                            @foreach($disadvantages as $key=>$value)
                                @if(!empty($value))
                                    <p>
                                        <span class="icon icon-arrow-down"></span>
                                        <span class="icon_span">{{ $value }}</span>
                                    </p>
                                @endif
                            @endforeach
                        @endif

                        <div style="text-align:justify;width:95%;padding-bottom:40px;">{{ $comment->comment_text }}</div>

                    </div>

                @endif
            </div>

        @endforeach

        {!!  str_replace('site/ajax_get_tab_data','product/comment',$score->render()) !!}

    @else

    @endif
</div>

<script>
    <?php

        $url2=url('site/ajax_get_tab_data');
     ?>
    $('.pagination a').click(function (event) {
        event.preventDefault();
        var url=$(this).attr('href');
        var url=url.split('page=');
        var product_id='<?= $product_id ?>';
        if(url.length==2)
        {
            $("#loading_comment").show();
            $("#comment_box").hide();
            $.ajaxSetup(
                {
                    'headers':{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.ajax({
                url:'{{ $url2 }}?page='+url[1],
                type:'POST',
                data:'tab_id=comment&product_id='+product_id,
                success:function (data) {
                    $("#comment_box").show();
                    $("#loading_comment").hide();
                    $("#comment_box").html(data);
                }
            });
        }
    });
</script>

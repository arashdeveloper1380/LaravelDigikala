<div class="search_body">



    <div style="width:97%;margin:auto;">


        <?php

        function get_score($data)
        {
            $s=0;
            foreach ($data as $k=>$v)
            {

                    $a=explode('@#',$v->value);
                    foreach ($a as $key=>$value)
                    {
                        if(!empty($value))
                        {
                            $b=explode('_',$value);
                            if(is_array($b))
                            {
                                if(sizeof($b)==2)
                                {
                                    $s+=$b[1];
                                }
                            }

                        }
                    }
            }
            if($s>0)
            {
                $n=sizeof($data)*5;
                $s=$s/$n;
                $s=substr($s,0,3);
            }
            return $s;
        }

        ?>

        <div style="width:100%;float:right;">

            {!!  str_replace('ajax/set_filter_product',$cat_url,$product->links()) !!}
        </div>


            @foreach($product as $key=>$value)

                <div class="search_product_box">

                    <img  src="{{ url('upload').'/'.$value->get_img->url }}">


                    <?php

                    $score=get_score($value->get_score);
                    ?>

                    <div style="text-align:center;height:40px;position:relative">

                        <div class="product_item_compare" onclick="add_compare_product('<?= $value->id ?>','{{ $value->title }}','{{ $value->get_img->url }}')">
                            <span class="checkbox2" id="compare_{{ $value->id  }}"></span>
                            <span style="padding-top:5px">مقایسه</span>
                        </div>
                        @foreach($value->get_colors as $key2=>$value2)
                            <label style="width:15px;height:15px;background:#{{ $value2->color_code }};border-radius:100%;@if($value2->color_code=='FFFFFF') border:1px solid silver @endif"></label>
                        @endforeach

                    </div>
                    <p style="font-size:12px">
                        <label class="product_score">
                            <span class="fa fa-star"></span>
                            <span>{{ $score }}</span>
                        </label>

                        <label>
                            <span>از </span>
                            <span>{{ sizeof($value->get_score) }}</span>
                            <span>رای </span>
                        </label>
                    </p>
                    <p class="title">
                        <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                            @if(strlen($value->title)>35)
                                {{ mb_substr($value->title,0,28).' ... ' }}
                            @else
                                {{ $value->title }}
                            @endif
                        </a></p>

                    <p style="color:red">
                        @if($value->product_status==1)
                            @if(!empty($value->price))
                                {{ number_format($value->price) }} تومان
                            @else
                                <span>نا موجود</span>
                            @endif
                        @else
                            <span>نا موجود</span>
                        @endif
                    </p>
                </div>

            @endforeach

            @if(sizeof($product)==0)

                <div style="clear:both;padding-top: 30px;"></div>
                <div style="background-color: #F7F8FA;border: 1px dashed #C7C7C7;text-align:center;width:97%;margin:auto;padding-top:14px;padding-bottom:8px">
                    <p>محصولی برای نمایش یافت نشد</p>
                </div>

            @endif

            <div style="clear:both;padding-top: 30px;"></div>


    </div>

</div>

<script>
    <?php
    $url=url('ajax/set_filter_product');
    ?>
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
    $('.search_product_box').hover(function () {

            $('.product_item_compare',this).show();
        },
        function () {
            $('.product_item_compare',this).hide();
        });
</script>
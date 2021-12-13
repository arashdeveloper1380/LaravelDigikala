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
@foreach($product as $key=>$value)

    <div class="search_product_box">

        <div class="col-xs-4 col-sm-5 product_img" >
            <img src="{{ url('upload').'/'.$value->get_img->url }}">
        </div>

        <div class="col-xs-8 col-sm-7 product_info">
            <p>
                <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">{{ $value->title }}</a>
            </p>


            <?php

            $score=get_score($value->get_score);
            ?>

            <p style="font-size:12px;padding-top: 5px">
                <label class="product_score">
                    <span class="fa fa-star"></span>
                    <span>{{ $score }}</span>
                </label>

                <label style="font-size:11px">
                    <span>از </span>
                    <span>{{ sizeof($value->get_score) }}</span>
                    <span>رای </span>
                </label>
            </p>


            <p style="padding-top:5px;">
                @foreach($value->get_colors as $key2=>$value2)
                    <label style="width:15px;height:15px;background:#{{ $value2->color_code }};@if($value2->color_code=='FFFFFF') border:1px solid silver @endif"></label>
                @endforeach
            </p>

            <p style="color:#62b965;padding-top:0px">
                @if($value->product_status==1)
                    @if(!empty($value->price))
                        {{ number_format($value->price-$value->discounts) }} تومان
                    @else
                        <span>نا موجود</span>
                    @endif
                @else
                    <span>نا موجود</span>
                @endif
            </p>
        </div>

        <div style="clear:both"></div>
    </div>

@endforeach

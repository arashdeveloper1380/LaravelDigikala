<div style="width:95%;margin:50px auto;text-align:justify" class="review_div">

    @if($review)

        <?php

        $review_tozihat=$review->review_tozihat;
        $f=strpos($review_tozihat,'start_review');
        $t=substr($review_tozihat,0,$f);
       // echo strip_tags($t,'<img><p>');
        $t2=substr($review_tozihat,$f,strlen($review_tozihat));
        $text=explode('start_review',$t2);
        foreach ($text as $key=>$value)
        {
            if(!empty($value))
            {
                $v=str_replace('start_item','',$value);
                $v=str_replace('end_item','',$v);
                echo strip_tags($v,'<img><p><div>');
            }
        }
        ?>
    @else


        <p style="color:red;padding-top:30px;padding-bottom:30px;text-align:center">نقد و بررسی تخصصی برای این محصول ثبت نشد</p>

    @endif
</div>
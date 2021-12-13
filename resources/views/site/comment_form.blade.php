@extends('layouts.site')
@section('style')
<link href="{{ url('css/rangeslider.css') }}" rel="stylesheet">
@endsection
@section('content')

    <div class="row content_box">

        @php
        function get_item_value($score,$n)
        {
            $a=3;
            if($score)
            {
              $e=explode('@#',$score->value);
              foreach ($e as $key=>$value)
              {
                $k=$n.'_';
                $c=explode($k,$value);
                if(is_array($c))
                {
                   if(sizeof($c)==2)
                   {
                      $a=$c[1];
                   }
                }
              }
            }
            return $a;
        }
        @endphp
        <div class="col-md-5">

            <div class="comment_product_data">
                <img src="{{ url('upload').'/'.$product->get_img->url }}">

                <p style="font-weight:bold">
                    <a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}">{{ $product->title }}</a>
                </p>
                <p>
                    <a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}">{{ $product->code }}</a>
                </p>
            </div>

        </div>


        <div class="col-md-7">

            <form action="{{ url('site/add_score') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <p style="padding-top:40px;padding-bottom:30px">امتیاز شما به این محصول</p>
                <div style="width:300px;margin-top: 20px;">
                    <p>کيفيت ساخت</p>
                    <input type="range" min="0" max="5" step="1" name="range[1]" data-rangeslider value="<?= get_item_value($score,1) ?>"  id="range_1" />
                    <p id="output_range_1"></p>
                </div>

                <div style="width:300px;margin-top: 20px;">
                    <p>ارزش خريد به نسبت قيمت</p>
                    <input type="range" min="0" max="5" step="1" name="range[2]" data-rangeslider value="<?= get_item_value($score,2)  ?>"  id="range_2" />
                    <p id="output_range_2"></p>
                </div>

                <div style="width:300px;margin-top: 20px;">
                    <p>نوآوري</p>
                    <input type="range" min="0" max="5" step="1" name="range[3]" data-rangeslider value="<?= get_item_value($score,3)  ?>"  id="range_3" />
                    <p id="output_range_3"></p>
                </div>

                <div style="width:300px;margin-top: 20px;">
                    <p>امکانات و قابليت ها</p>
                    <input type="range" min="0" max="5" step="1" name="range[4]" data-rangeslider value="<?= get_item_value($score,4) ?>"  id="range_4" />
                    <p id="output_range_4"></p>
                </div>

                <div style="width:300px;margin-top: 20px;">
                    <p>سهولت استفاده</p>
                    <input type="range" min="0" max="5" step="1" name="range[5]" data-rangeslider value="<?= get_item_value($score,5)  ?>"  id="range_5" />
                    <p id="output_range_5"></p>
                </div>

                <div style="width:300px;margin-top: 20px;">
                    <p>طراحي و ظاهر</p>
                    <input type="range" min="0" max="5" step="1" name="range[6]" data-rangeslider value="<?= get_item_value($score,6)  ?>"  id="range_6" />
                    <p id="output_range_6"></p>
                </div>


                    @if(!$score)
                        <button style="float:left;margin-bottom:30px;" class="btn btn-primary">ثبت امتیاز</button>
                    @endif


            </form>


        </div>
    </div>





    @if($comment)

        <?php
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
                    if(is_array($c))
                        {
                            if(sizeof($c)==2)
                            {
                                $a=$c[1];
                            }
                        }
                }
            }
            return $a;
        }
        ?>
        <div class="row user_comment_box">

            <div class="comment_header">

                <?php
                $jdf=new \App\lib\Jdf();
                ?>
                @if(!empty($score->get_user->name))

                    <p>{{ $score->get_user->name }}</p>
                @else
                    <p>کاربر سایت</p>

                @endif
                    <p style="font-size:11px">{{ $jdf->jdate('n F y',$score->time) }}</p>
            </div>
            <div class="col-md-6">
                <ul class="rang_ul">
                    <li>
                        <span>ارزش خريد به نسبت قيمت</span>
                        <div class="rating-container">
                            <div class="bar @if(score_check($score,1)>=1) done @endif"></div>
                            <div class="bar @if(score_check($score,1)>=2) done @endif"></div>
                            <div class="bar @if(score_check($score,1)>=3) done @endif"></div>
                            <div class="bar @if(score_check($score,1)>=4) done @endif"></div>
                            <div class="bar @if(score_check($score,1)==5) done @endif"></div>
                        </div>
                    </li>

                    <li>
                        <span>کيفيت ساخت</span>
                        <div class="rating-container">
                            <div class="bar @if(score_check($score,2)>=1) done @endif"></div>
                            <div class="bar @if(score_check($score,2)>=2) done @endif"></div>
                            <div class="bar @if(score_check($score,2)>=3) done @endif"></div>
                            <div class="bar @if(score_check($score,2)>=4) done @endif"></div>
                            <div class="bar @if(score_check($score,2)==5) done @endif"></div>
                        </div>
                    </li>


                    <li>
                        <span>امکانات و قابليت ها</span>
                        <div class="rating-container">
                            <div class="bar @if(score_check($score,3)>=1) done @endif"></div>
                            <div class="bar @if(score_check($score,3)>=2) done @endif"></div>
                            <div class="bar @if(score_check($score,3)>=3) done @endif"></div>
                            <div class="bar @if(score_check($score,3)>=4) done @endif"></div>
                            <div class="bar @if(score_check($score,3)==5) done @endif"></div>
                        </div>
                    </li>


                    <li>
                        <span>سهولت استفاده</span>
                        <div class="rating-container">
                            <div class="bar @if(score_check($score,4)>=1) done @endif"></div>
                            <div class="bar @if(score_check($score,4)>=2) done @endif"></div>
                            <div class="bar @if(score_check($score,4)>=3) done @endif"></div>
                            <div class="bar @if(score_check($score,4)>=4) done @endif"></div>
                            <div class="bar @if(score_check($score,4)==5) done @endif"></div>
                        </div>
                    </li>

                    <li>
                        <span>طراحي و ظاهر</span>
                        <div class="rating-container">
                            <div class="bar @if(score_check($score,5)>=1) done @endif"></div>
                            <div class="bar @if(score_check($score,5)>=2) done @endif"></div>
                            <div class="bar @if(score_check($score,5)>=3) done @endif"></div>
                            <div class="bar @if(score_check($score,5)>=4) done @endif"></div>
                            <div class="bar @if(score_check($score,5)==5) done @endif"></div>
                        </div>
                    </li>

                    <li>
                        <span>نوآوري</span>
                        <div class="rating-container">
                            <div class="bar @if(score_check($score,6)>=1) done @endif"></div>
                            <div class="bar @if(score_check($score,6)>=2) done @endif"></div>
                            <div class="bar @if(score_check($score,6)>=3) done @endif"></div>
                            <div class="bar @if(score_check($score,6)>=4) done @endif"></div>
                            <div class="bar @if(score_check($score,6)==5) done @endif"></div>
                        </div>
                    </li>
                </ul>
            </div>
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

        </div>

    @else

        <div class="row content_box" @if(!$score) style="background:#fff;opacity:0.5;cursor: not-allowed;" @endif>

            <div class="col-md-12"  id="comment_box">

                <p style="padding-top:30px;padding-bottom:20px;padding-right:15px">دیگران را با نوشتن نقد، بررسی و نظرات خود، برای انتخاب این محصول راهنمایی کنید.</p>

                <form action="{{ url('site/add_comment') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>عنوان نقد و بررسی شما (اجباری)</label>
                            <input @if(!$score) disabled="disabled" @endif type="text"  class="form-control" name="subject">
                        </div>

                        <div style="clear:both"></div>
                        <div class="form-group">
                            <p style="color:green;padding-top: 10px;">نقاط قوت</p>
                            <input @if(!$score) disabled="disabled" @endif  type="text"  class="form-control advantages" name="advantages[]">
                            <div class="icon-form-add" onclick="add_advantages()">+</div>
                            <div class="icon-form-remove" onclick="remover_advantages()">-</div>
                        </div>
                        <div style="clear:both"></div>
                        <div id="advantages_box">

                        </div>
                    </div>

                    <div class="col-md-6">



                        <div class="form-group" style="margin-top:75px;">
                            <p style="color:red;padding-top: 10px;">نقاط ضعف</p>
                            <input @if(!$score) disabled="disabled" @endif type="text"  class="form-control disadvantages" name="disadvantages[]">
                            <div class="icon-form-add" onclick="add_disadvantages()">+</div>
                            <div class="icon-form-remove" onclick="remover_disadvantages()">-</div>
                        </div>
                        <div style="clear:both"></div>
                        <div id="disadvantages_box">

                        </div>

                    </div>

            </div>


            <div class="col-md-12" id="comment_text_box">
                <div class="form-group" style="padding-right:15px;padding-top: 20px;">
                    <label>متن نقد و بررسی شما (اجباری)</label>
                    <textarea @if(!$score) disabled="disabled" @endif name="comment_text"></textarea>
                </div>


                @if($score)
                    <div class="form-group">
                        <button class="btn btn-primary" style="float:left;margin-bottom:30px;margin-top:20px">ثبت نقد و بررسی</button>
                    </div>

                @else

                    <div style="padding-top:40px;clear:both"></div>

                @endif


            </div>

            </form>
        </div>

    @endif
@endsection

@section('footer')
<script type="text/javascript" src="{{ url('js/rangeslider.js') }}"></script>
<script>
    var textContent = ('textContent' in document) ? 'textContent' : 'innerText';
    function valueOutput(element)
    {
        var value = element.value;
        $("#output_"+element.id).html(element.value);
        $("#"+element.id).value=element.value;
    };
    $('[data-rangeslider]').rangeslider({


        polyfill: false,


        onInit: function()
        {
           valueOutput(this.$element[0]);
        },
        onSlideEnd: function(position, value) {
            valueOutput(this.$element[0]);
        }


    });
    add_advantages=function ()
    {
        var n=document.getElementsByClassName('advantages').length+1;
        var id='advantages_'+n;
        var div='<div class="form-group" id="'+id+'">' +
            '<input type="text" style="margin-top:20px;"  class="form-control  advantages" name="advantages[]">' +
            '<div class="icon-form-add2" onclick="add_advantages()">+</div>' +
            '<div class="icon-form-remove2" onclick="remover_advantages('+n+')">-</div>' +
            '</div>';
       $("#advantages_box").append(div);
    };
    remover_advantages=function (id)
    {
       $("#advantages_"+id).remove();
    };
    add_disadvantages=function ()
    {
        var n=document.getElementsByClassName('disadvantages').length+1;
        var id='disadvantages_'+n;
        var div='<div class="form-group" id="'+id+'">' +
            '<input type="text" style="margin-top:20px;"  class="form-control  disadvantages" name="disadvantages[]">' +
            '<div class="icon-form-add2" onclick="add_disadvantages()">+</div>' +
            '<div class="icon-form-remove2" onclick="remover_disadvantages('+n+')">-</div>' +
            '</div>';
        $("#disadvantages_box").append(div);
    };
    remover_disadvantages=function (id)
    {
        $("#disadvantages_"+id).remove();
    }
</script>
@endsection
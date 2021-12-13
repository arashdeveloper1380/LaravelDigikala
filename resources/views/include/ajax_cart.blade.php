<?php

$cart_date=\App\Cart::get();
?>

@if(sizeof($cart_date)==0)

    <p style="color:red;text-align:center;padding-top:30px;padding-bottom: 20px;">سبد خرید شما خالی می باشد</p>

@else

    <div style="width:95%;margin: 50px auto">

        <p><span class="icon_item_name"></span> <span>سبد خرید شما در دیجی‌کالا</span></p>
        <p>افزودن کالاها به سبد خرید به معنی رزرو کالا برای شما نیست. برای ثبت سفارش باید مراحل بعدی خرید را تکمیل نمایید.</p>
        <a href="{{ url('Shipping') }}" class="btn btn-success" style="float:left;margin-top:5px;margin-bottom: 30px;"><span>ادامه ثبت سفارش</span> <span class="fa fa-arrow-left"></span></a>

        <div style="clear: both;"></div>
        <table id="cart_table" class="table table-bordered">

            <tr>
                <th>شرح محصول</th>
                <th>تعداد</th>
                <th>قیمت واحد</th>
                <th colspan="2">قیمت کل</th>
            </tr>
            <?php
            $total_price=0;
            $price=0;
            $j=1;
            ?>
            @foreach($cart_date as $key=>$value)

                <?php

                $product_data=array_key_exists('product_data',$value) ? $value['product_data'] : array();

                ?>
                @foreach($product_data as $key2=>$value2)
                    <?php
                    $s_c=explode('_',$key2);
                    $service_id=$s_c[0];
                    $color_id=$s_c[1];
                    $data=\App\Cart::get_date($key,$service_id,$color_id);
                    ?>
                    @if($data)
                        <tr>
                            <td>

                                <div style="width:100%" class="cart_div">
                                    <div class="col-md-4">
                                        <img class="cart_img" src="{{ $data['img'] }}">
                                    </div>
                                    <div class="col-md-8">
                                        <p><a href="{{ url('product').'/'.$data['code_url'].'/'.$data['title_url'] }}">{{ $data['title'] }}</a></p>
                                        <p><a href="{{ url('product').'/'.$data['code_url'].'/'.$data['title_url'] }}">{{ $data['code'] }}</a></p>
                                        @if(!empty($data['color_name']))
                                            <p style="color:#777">
                                                <span>رنگ : </span>
                                                <label style="background:#{{ $data['color_code'] }}" class="color_product"></label>
                                                <span>{{ $data['color_name'] }}</span>
                                            </p>
                                        @endif
                                        @if(!empty($data['service_name']))
                                            <p style="color:#777"><span>گارانتی : </span> {{ $data['service_name'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="styled_select">
                                <select id="number_product_{{ $j }}" onchange="set_number_product('{{ $key }}','{{ $s_c[0] }}','{{ $s_c[1] }}','{{ $j }}')">
                                    @for($i=1;$i<31;$i++)
                                        <option @if($value2==$i) selected="selected" @endif  value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </td>
                            <td class="cart_price">
                                <p>
                                    <span class="p1">{{ number_format($data['price2']) }}</span>
                                    <span class="p2">تومان</span>
                                </p>
                            </td>
                            <td class="cart_price">
                                <p>
                                    <span class="p1">{{ number_format($data['price2']*$value2) }}</span>
                                    <span class="p2">تومان</span>
                                </p>
                            </td>
                            <td class="last">
                                <div>
                                    <span onclick="del_product('{{ $key }}','{{ $s_c[0] }}','{{ $s_c[1] }}')" class="fa fa-remove"></span>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $total_price+=$data['price1']*$value2;
                        $price+=$data['price2']*$value2;
                        ?>
                        <?php $j++; ?>
                    @endif

                @endforeach

            @endforeach

        </table>



        <div style="width:100%;" id="footer_cart">
            <div class="col-md-5"></div>

            <div class="col-md-7">
                <?php

                Session::put('total_price',$total_price);
                Session::put('price',$price);

                ?>
                
                <div class="cart_price2">
                    <div>
                        <ul class="list-inline">
                            <li style="margin-right:15px;">جمع کل خرید شما :</li>
                            <li style="float:left;margin-left:10px"><span class="p1">{{ number_format($total_price) }}</span> تومان</li>
                        </ul>
                    </div>
                    <div style="background:#F7FFF7;">
                        <ul class="list-inline">
                            <li style="margin-right:15px;color:#4CAF50">مبلغ قابل پرداخت :</li>
                            <li style="float:left;color:#4CAF50;margin-left:10px"><span class="p1">{{ number_format($price) }}</span> تومان</li>
                        </ul>
                    </div>
                </div>

                <a href="{{ url('Shipping') }}" class="btn btn-success" style="float:left;margin-top:15px;margin-bottom: 30px;"><span>ادامه ثبت سفارش</span> <span class="fa fa-arrow-left"></span></a>
            </div>
        </div>

    </div>




@endif
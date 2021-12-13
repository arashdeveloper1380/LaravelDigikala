@extends('layouts/admin')

@section('header')
    <title>پنل مدیریت</title>
@endsection


@section('content')

    <div class="box_title">
        <span>پنل مدیریت</span>
    </div>

    <div>
        <div id="container" style="width: 750px; height: 400px; margin: 0 auto;direction:ltr"></div>
    </div>
@endsection

@section('footer')
<?php

$price='';
$date='';
$count='';

foreach ($total_price as $key=>$value)
{
    $price.=$value.',';
}
foreach ($order_count as $key=>$value)
{
    $count.=$value.',';
}
foreach ($date_list as $key=>$value)
{
    $date.="'$value',";
}
?>
<script type="text/javascript" src="{{ url('js/highcharts.js') }}"></script>
<script>
    Highcharts.chart('container', {
        chart: {
            type: 'line',
            style:{
                fontFamily:'IRANSansWeb'
            }
        },
        title: {
            text: 'نمودار میزان درآمد این ماه فروشگاه'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [<?= $date ?>]
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        legend:{
            verticalAlign:'top',
            y:30
        },
        tooltip:{
           formatter:function () {
               if(this.series.name=='میزان درآمد')
               {
                   return this.x+'<br>'+this.series.name+' : '+this.y+' تومان';
               }
               else
               {
                   return this.x+'<br>'+this.series.name+' : '+this.y+' بار';

               }
           }
        },
        series: [{
            name: 'میزان درآمد',
            data: [<?= $price ?>],
            color:'red'
        }, {
            name: 'تعداد تراکنش',
            data: [<?= $count ?>],
            marker:{
                symbol:'circle'
            }
        }]
    });
</script>
@endsection
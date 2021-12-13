@extends('layouts/admin')

@section('header')
    <title>آمار بازدید فروشگاه</title>
@endsection

@section('content')

    <div class="box_title">
        <span>آمار بازدید فروشگاه</span>
    </div>

    <div>
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto;direction:ltr"></div>
    </div>

    <table class="table table-bordered table-striped">

        <?php
        $Jdf=new \App\lib\Jdf();
        ?>
        <tr>
            <td style="width:200px">آمار بازدید امروز فروشگاه</td>
            <td>{{ $total_view[$Jdf->tr_num($Jdf->jdate('j'))] }}</td>
        </tr>

        <tr>
            <td>آمار بازدید یک ماه فروشگاه</td>
            <td>{{ $month_year }}</td>
        </tr>

        <tr>
            <td>آمار بازدید یک سال فروشگاه</td>
            <td>{{ $view_year }}</td>
        </tr>

        <tr>
            <td>آمار بازدید کل فروشگاه</td>
            <td>{{ $total }}</td>
        </tr>
    </table>
@endsection

@section('footer')
    <?php

    $v='';
    $v_t='';
    $date='';

    foreach ($total_view as $key=>$value)
    {
        $v_t.=$value.',';
    }
    foreach ($view as $key=>$value)
    {
        $v.=$value.',';
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
                text: 'نمودار آمار بازید این ماه فروشگاه'
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

            },
            series: [{
                name: 'تعداد کل بازدید',
                data: [<?= $v_t ?>],
                color:'red'
            }, {
                name: 'بازدید یکتا',
                data: [<?= $v ?>],
                marker:{
                    symbol:'circle'
                }
            }]
        });
    </script>
@endsection
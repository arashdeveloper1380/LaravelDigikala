@extends('layouts/admin')

@section('header')
    <title>افزودن فیلتر محصول</title>
@endsection

@section('content')
    <div class="box_title">
        <span>افزودن فیلتر محصول  - {{ $product->title }}</span>
    </div>
    {!! Form::open(['url'=>'admin/product/add_filter']) !!}

<input type="hidden" name="product_id" value="{{ $product->id }}">
    <table class="item_table">

        <?php
        function get_active($filter_value,$key1,$key2)
        {
            $k=$key1.'_'.$key2;
            if(array_key_exists($k,$filter_value))
            {
                return true;
            }
            else
            {
               return false;
            }
        }
        ?>
        @foreach($filters as $key=>$value)

            <tr>
                <td colspan="2" style="color:red;padding-top:30px;padding-bottom:10px">{{ $value->name }}</td>
            </tr>
            <?php
            $get_child_filter=$value->get_child;
                ?>
            @foreach($get_child_filter as $key2=>$value2)
                <tr>
                    <td class="item_first_td">

                        @if($value->filed==1)

                            <input type="radio"  @if(get_active($filter_value,$value->id,$value2->id)) checked="checked" @endif  name="filter[<?= $value->id ?>]" value="<?= $value2->id ?>">
                            {{ $value2->name }}
                        @else

                            <?php
                            $name=$value2->name;
                            $e=explode('@',$name)
                            ?>
                            @if(sizeof($e)==2)
                                <input type="checkbox"  @if(get_active($filter_value,$value->id,$value2->id)) checked="checked" @endif name="filters[<?= $value->id ?>][<?= $value2->id ?>]" value="<?= $value2->id ?>">
                                {{ $e[0] }}
                            @endif

                        @endif

                    </td>
                </tr>
            @endforeach
        @endforeach

        <tr>
            <td colspan="2">
                {!! Form::submit('ثبت',['class'=>'btn btn-success']) !!}
            </td>
        </tr>

    </table>



    {!! Form::close() !!}


@endsection
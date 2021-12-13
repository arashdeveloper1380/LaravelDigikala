@extends('layouts/admin')

@section('header')
    <title>افزودن مشخصات فنی</title>
@endsection

@section('content')
    <div class="box_title">
        <span>افزودن مشخصات فنی  - {{ $product->title }}</span>
    </div>
    {!! Form::open(['url'=>'admin/product/add_item']) !!}

<input type="hidden" name="product_id" value="{{ $product->id }}">
    <table class="item_table">

        @foreach($items as $key=>$value)

            <tr>
                <td colspan="2" style="color:red;padding-top:30px;padding-bottom:10px">{{ $value->name }}</td>
            </tr>
            <?php
            $get_child_item=$value->get_child_item;
            ?>
            @foreach($get_child_item as $key2=>$value2)

                <tr>
                    <td class="item_first_td">{{ $value2->name }}</td>
                    <td>
                        @if($value2->filed==1)

                            <input value="@if(array_key_exists($value2->id,$item_value)){{ $item_value[$value2->id] }}@endif" name="item[<?= $value2->id ?>]" type="text" class="form-control">
                        @elseif($value2->filed==2)
                            <select class="form-control" name="item[<?= $value2->id ?>]">
                                <option @if(array_key_exists($value2->id,$item_value)) @if($item_value[$value2->id]==1) selected="selected" @endif @endif  value="1">بله</option>
                                <option @if(array_key_exists($value2->id,$item_value)) @if($item_value[$value2->id]==2) selected="selected" @endif @endif value="2">خیر</option>
                            </select>
                        @else
                            <textarea name="item[<?= $value2->id ?>]" style="width:70%">@if(array_key_exists($value2->id,$item_value)){{ $item_value[$value2->id] }}@endif</textarea>
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
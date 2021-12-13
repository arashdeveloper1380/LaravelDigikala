<form method="post" action="{{ url('admin/service/set_price/?product_id='.$product_id) }}">
    {{ csrf_field() }}

    <input type="hidden" name="time" value="{{ $date }}">
    <input type="hidden" name="service_id" value="{{ $service_id }}">

    @foreach($product_color as $key=>$value)

        <?php
         $price=array_key_exists($value->id,$service_price) ? $service_price[$value->id] : '';
         ?>
        <div class="form-group">
            <label class="control-label">{{ $value->color_name }}</label>
            <input type="text" name="color[<?= $value->id ?>]" value="{{ $price }}" class="form-control" style="text-align:left" placeholder="هزینه بر حسب تومان و به صورت عدد وارد شود">
        </div>

    @endforeach

    @if(sizeof($product_color)==0)

        <div class="form-group">
            <label class="control-label">بدون رنگ : </label>
            <input type="text" name="color[0]" value="" class="form-control" style="text-align:left" placeholder="هزینه بر حسب تومان و به صورت عدد وارد شود">
        </div>
    @endif


    <div class="form-group">
        {!! Form::submit('ثبت',['class'=>'btn btn-success']) !!}
    </div>
</form>
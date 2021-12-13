
<form id="address_form_{{ $address->id }}" onsubmit="edit_user_address('{{ $address->id }}');return false;" action="{{ url('shop/edit_address').'/'.$address->id }}" method="post">
    {{ csrf_field() }}
    <table class="tbl_address">

        <tr>
            <td colspan="2">
                <div class="form-group">
                    <label>نام و نام خانوادگی</label>
                    <input name="name" style="width:98%"  class="form-control" value="{{ $address->name }}">
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="2">

                <span id="error_edit_name" class="has-error"></span>

            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group">
                    <label>انتخاب استان</label>
                    <select name="ostan_id"  class="selectpicker" onchange="get_shahr('edit_ostan_id','edit_shahr_list')" id="edit_ostan_id">
                        <option value="">انتخاب استان</option>
                        @foreach($ostan as $key=>$value)
                            <option @if($address->ostan_id==$value->id) selected="selected" @endif value="{{ $value->id }}">{{ $value->ostan_name }}</option>
                        @endforeach
                    </select>
                </div>

            </td>
            <td>
                <div class="form-group">
                    <label>انتخاب شهر</label>
                    <select name="shahr_id"  class="selectpicker" id="edit_shahr_list">
                        @foreach($shahr as $key=>$value)
                            <option @if($key==$address->shahr_id) selected="selected" @endif value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </td>
        </tr>

        <tr>
            <td>

                <span id="error_edit_ostan_id" class="has-error"></span>

            </td>
            <td>

                <span id="error_edit_shahr_id" class="has-error"></span>

            </td>
        </tr>


        <tr>
            <td>
                <div class="form-group">
                    <label>تلفن ثابت</label>

                    <input type="text" name="tell" value="{{ $address->tell }}" class="form-control">
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label>کد شهر</label>
                    <input type="text"  value="{{ $address->tell_code }}" class="form-control" name="tell_code">
                </div>
            </td>
        </tr>

        <tr>
            <td>

                <span id="error_edit_tell" class="has-error"></span>

            </td>
            <td>

                <span id="error_edit_tell_code" class="has-error"></span>
            </td>
        </tr>

        <tr>
            <td>
                <div class="form-group">
                    <label>شماره موبایل</label>
                    <input type="text"  value="{{ $address->mobile }}" class="form-control align_left"  name="mobile">
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label>کد پستی</label>
                    <input type="text"   value="{{ $address->zip_code }}"  name="zip_code" class="form-control align_left" placeholder="">
                </div>
            </td>
        </tr>

        <tr>
            <td>

                <span id="error_edit_mobile" class="has-error"></span>

            </td>
            <td>

                <span id="error_edit_zip_code" class="has-error"></span>

            </td>
        </tr>


        <tr>
            <td colspan="2">
                <div>
                    <label>آدرس </label>
                    <textarea name="address" style="width:98%" class="form-control">{{ $address->address }}</textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span id="error_edit_address" class="has-error"></span>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <button class="btn btn-primary">ویرایش</button>
            </td>
        </tr>

    </table>
</form>


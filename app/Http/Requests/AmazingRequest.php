<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AmazingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'm_title'=>'required',
            'title'=>'required',
            'tozihat'=>'required',
            'price1'=>'required|integer',
            'price2'=>'required|integer',
            'time'=>'required|integer',
            'product_id'=>'required|integer',
        ];
    }
    public function attributes()
    {
        return [
            'm_title'=>'عنوانک',
            'title'=>'عنوان',
            'tozihat'=>'توضیحات',
            'price1'=>'هزینه اصلی محصول',
            'price2'=>'هزینه محصول با تخفیف',
            'time'=>'مدت زمان شگفت انگیز بودن',
            'product_id'=>'شناسه محصول',
        ];
    }
}

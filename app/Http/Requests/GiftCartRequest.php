<?php

namespace App\Http\Requests;

use App\Rules\ValidDate;
use Illuminate\Foundation\Http\FormRequest;

class GiftCartRequest extends FormRequest
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
        //|unique:category,cat_ename,'.$this->category.'
        return [
            'user_id'=>'required|integer',
            'value'=>'required|integer',
            'code_time'=>['required',new ValidDate()]
        ];
    }
    public function attributes()
    {
        return
            [
                'user_id'=>'شناسه کاربر',
                'value'=>'مقدار تخفیف بر حسب تومان',
                'code_time'=>'مدت زمان کارت هدیه'
            ];
    }

}

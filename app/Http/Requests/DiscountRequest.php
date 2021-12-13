<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
            'code'=>'required',
            'value'=>'required',
        ];
    }
    public function attributes()
    {
        return
            [
                'code'=>'کد تخفیف',
                'value'=>'مقدار تخفیف بر حسب درصد',
            ];
    }

}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $discounts=$this->get('discounts');
        $bon=$this->get('bon');
        $array=[
            'title'=>'required',
            'cat'=>'required',
            'code'=>'required',
            'price'=>'required|integer',
        ];

        if(!empty($discounts))
        {
            $array['discounts']='integer';
        }
        if(!empty($bon))
        {
            $array['bon']='integer';
        }

        return $array;
    }
    public function attributes()
    {
        return
            [
                'title'=>'عنوان محصول',
                'cat'=>'دسته محصول',
                'code'=>'نام لاتین',
                'price'=>'هزینه محصول'
            ];
    }

}

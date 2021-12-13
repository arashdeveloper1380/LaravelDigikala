<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'cat_name'=>'required',
            'cat_ename'=>'required',
            'parent_id'=>'required',
            'pic'=>'image|max:1024'
        ];
    }
    public function attributes()
    {
        return
            [
                'cat_name'=>'نام دسته',
                'cat_ename'=>'نام لاتین دسته',
                'parent_id'=>'سر دسته',
                'pic'=>'تصویر دسته'
            ];
    }

}

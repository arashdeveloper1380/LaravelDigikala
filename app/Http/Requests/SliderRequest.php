<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        if($this->isMethod('post'))
        {
            return [
                'title'=>'required',
                'url'=>'required|url',
                'pic'=>'required|image|max:1024'
            ];
        }
        else
        {
            return [
                'title'=>'required',
                'url'=>'required|url',
                'pic'=>'image|max:1024'
            ];
        }

    }
    public function attributes()
    {
        return
            [
                'title'=>'عنوان اسلایدر',
                'url'=>'آدرس اسلایدر',
                'pic'=>'تصویر اسلاید'
            ];
    }

}

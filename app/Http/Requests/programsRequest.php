<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class programsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' =>'required',
            'details' =>'required',
            'date' =>'required',
            'video' =>'url',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الرجاء ادخال اسم البرنامج',
            'details.required' =>' الرجاء ادخال تفاصيل البرنامج' ,
            'date.required' =>'الرجاء ادخال تاريخ البرنامج',
            'video.url' =>'الفيديو يجب ان يكون رابط',
        ];
    }
}

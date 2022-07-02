<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassroom extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          //  'Name_class' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'Name_class.required' => trans('validation.required'),
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSections extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

//            'Name_Section' => 'required',
//            'Grade_id' => 'required',
//            'Class_id' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'Name_Section.required' => trans('Sections_trans.required_ar'),
            'Grade_id.required' => trans('Sections_trans.Grade_id_required'),
            'Class_id.required' => trans('Sections_trans.Class_id_required'),
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeachers extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
//            'Email' => 'required|unique:teachers,Email,'.$this->id,
//            'Password' => 'required',
            'Name' => 'required',
//            'Specialization_id' => 'required',
//            'Gender_id' => 'required',
            'Joining_Date' => 'required|date|date_format:Y-m-d',
            'Address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'Email.required' => trans('validation.required'),
            'Email.unique' => trans('validation.unique'),
            'Password.required' => trans('validation.required'),
            'Name.required' => trans('validation.required'),
            'Specialization_id.required' => trans('validation.required'),
            'Gender_id.required' => trans('validation.required'),
            'Joining_Date.required' => trans('validation.required'),
            'Address.required' => trans('validation.required'),
        ];
    }
}

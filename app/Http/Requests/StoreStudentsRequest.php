<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
           'name' => 'required',
            //'email' => 'required|email|unique:students,email,'.$this->id,
            //'password' => 'required|string|min:6|max:10',
           // 'gender_id' => 'required',
            //'nationalitie_id' => 'required',
            'Id_Number' => 'required',
            'blood_id' => 'required',
            'Date_Birth' => 'required|date|date_format:Y-m-d',
            'Grade_id' => 'required',
            'Classroom_id' => 'required',
            'section_id' => 'required',
            'address' => 'required',
           // 'parent_id' => 'required',
            'academic_year' => 'required',
        ];
    }
}

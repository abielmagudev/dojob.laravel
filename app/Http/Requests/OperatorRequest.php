<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperatorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required','string'],
            'lastname' => ['required','string'],
            'phone' => ['required'],
            'email' => ['required','email','unique:operators,email,' . $this->operator_id],
            'birthdate' => ['nullable','date'],
            'notes' => ['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Write the name of operator'),
            'name.string' => __('Write a valid name to operator'),
            'lastname.required' => __('Write the lastname of operator'),
            'lastname.string' => __('Write a valid lastname to operator'),
            'phone.required' => __('Write the phone of operator'),
            'email.email' => __('Write a valid email of operator'),
            'email.unique' => __('Write a different email of operator'),
            'birthdate.date' => __('Write a valid date of birth of operator'),
        ];
    }

    public function prepareForValidation()
    {
        $this->operator_id = $this->route()->originalParameter('operator') ?? 0;
    }
}

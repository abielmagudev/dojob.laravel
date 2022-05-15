<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrewOperatorsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'operators' => ['required','array'],
            'operators.*' => 'exists:operators,id,available,1',
        ];
    }

    public function messages()
    {
        return [
            'operators.required' => __('Choose one or more operators from the list'),
            'operators.array' => __('Choose only from the list of operators'),
            'operators.*.exists' => __('Choose one or more available operators from the list'),
        ];
    }
}

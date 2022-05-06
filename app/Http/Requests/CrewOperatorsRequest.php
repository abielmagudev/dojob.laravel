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
            'operators' => 'array',
            'operators.*' => 'exists:operators,id',
        ];
    }

    public function messages()
    {
        return [
            'operators.array' => __('Choose from the list of operators'),
            'operators.*.exists' => __('Choose someone valid from the list of operators'),
        ];
    }
}

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
            'available' => ['boolean'],
            'crew_id' => ['nullable', 'exists:crews,id,enabled,1']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Enter the operator\'s name'),
            'name.string' => __('Write a valid name for the operator'),
            'lastname.required' => __('Enter the operator\'s lastname'),
            'lastname.string' => __('Write a valid lastname for the operator'),
            'phone.required' => __('Enter the operator\'s phone'),
            'email.email' => __('Write a valid email for the operator'),
            'email.unique' => __('Write another email for the operator'),
            'birthdate.date' => __('Enter a valid date of birth of the operator'),
            'available.boolean' => __('Enable or disbale option for available the operator'),
            'crew_id.exists' => __('Choose a valid crew for the operator'),
        ];
    }

    public function prepareForValidation()
    {
        $this->operator_id = $this->route()->originalParameter('operator') ?? 0;

        $this->merge([
            'available' => (int) $this->filled('available'),
            'crew_id' => $this->filled('available') ? $this->get('crew') : null,
        ]);
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'phone' => ['required','unique:members,phone,' . $this->member_id],
            'email' => ['required','unique:members,email,' . $this->member_id],
            'birthdate' => ['nullable','date'],
            'position' => ['nullable','string'],
            'notes' => 'nullable',
            'is_available' => 'boolean',
            'crew_id' => ['nullable', 'exists:crews,id,is_enabled,1'],
            'skills' => ['array'],
            'skills.*' => ['exists:skills,id'],
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
            'is_available.boolean' => __('Enable or disbale option for available the operator'),
            'crew_id.exists' => __('Choose a valid crew for the operator'),
            'skills.array' => __('Choose skills from the list'),
            'skills.*.exists' => __('Choose valid skills from the list'),
        ];
    }

    public function prepareForValidation()
    {
        $this->member_id = $this->route()->originalParameter('member') ?? 0;

        if( $this->isMethod('put') || $this->isMethod('patch') )
        {
            $this->merge([
                'is_available' => (int) $this->filled('available'),
                'crew_id' => $this->filled('available') ? $this->crew : null,
            ]);
        }
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required','unique:crews,name,' . $this->crew_id],
            'color' => 'nullable',
            'description' => 'nullable',
            'enabled' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Enter the crew\'s name'),
            'name.unique' => __('Write another name for the crew'),
            'enabled.boolean' => __('Choose a valid option for enable or disable the crew'),
        ];
    }

    public function prepareForValidation()
    {
        $this->crew_id = $this->route()->originalParameter('crew') ?? 0;

        if( $this->isMethod('put') || $this->isMethod('patch') )
        {
            $this->merge([
                'enabled' => (int) $this->filled('enabled'),
            ]);
        }
    }
}

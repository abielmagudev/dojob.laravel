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
            'description' => 'nullable',
            'color' => 'nullable',
            'disabled' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Write the name of crew'),
            'name.unique' => __('Write a another name for crew'),
            'disabled.boolean' => __('Choice a valid option to disabled'),
        ];
    }

    public function prepareForValidation()
    {
        $this->crew_id = $this->route()->originalParameter('crew') ?? 0;

        $this->merge(['disabled' => (int) $this->has('disabled')]);
    }
}

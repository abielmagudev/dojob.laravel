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
            'available' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Write the name of crew'),
            'name.unique' => __('Write a another name for crew'),
            'available.boolean' => __('Choice a valid option to available or unavailable'),
        ];
    }

    public function prepareForValidation()
    {
        $this->crew_id = $this->route()->originalParameter('crew') ?? 0;

        $this->merge(['available' => (int) ! $this->has('unavailable')]);
    }
}

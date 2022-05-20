<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required','string','unique:skills,name,' . $this->skill_id],
            'description' => ['nullable','string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Enter the skill\'s name'),
            'name.string' => __('Enter a valid skill\'s name'),
            'name.unique' => __('Enter a different name of skill'),
            'description.string' => __('Enter a valid description of the skill'),
        ];
    }

    public function prepareForValidation()
    {
        $this->skill_id = $this->route()->originalParameter('skill') ?? 0;
    }
}

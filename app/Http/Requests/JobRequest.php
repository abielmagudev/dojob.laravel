<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required','string','unique:jobs,name,' . $this->job_id],
            'description' => ['nullable'],
            'enabled' => ['boolean'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Enter the job\'s name'),
            'name.string' => __('Write a valid name for the job'),
            'name.unique' => __('Write another name for the job'),
            'enabled.boolead' => __('Choose a valid option to enable or disable the job'),
        ];
    }

    public function prepareForValidation()
    {
        $this->job_id = $this->route()->originalParameter('job') ?? 0;

        $this->merge(['enabled' => (int) ! $this->has('disabled')]);
    }
}

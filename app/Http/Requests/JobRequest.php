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
            'description' => ['nullable','string'],
            'available' => ['boolean'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Write the name of the job'),
            'name.string' => __('Write a name valid to job'),
            'name.unique' => __('Write a different name to job'),
            'available.boolead' => __('Choice a valid available option'),
        ];
    }

    public function prepareForValidation()
    {
        $this->job_id = $this->route()->originalParameter('job') ?? 0;

        $this->merge(['available' => (int) $this->has('available')]);
    }
}

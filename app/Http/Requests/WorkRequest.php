<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WorkRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'client_id' => ['required','exists:clients,id'],
            'job_id' => ['required','exists:jobs,id,enabled,1'],
            'crew_id' => ['exists:crews,id,enabled,1'],
            'operator_id' => ['required_without:crew_id','exists:operators,id'],
            'scheduled_date' => ['required','date'],
            'scheduled_time' => ['required','date_format:H:i'],
        ];
    }

    public function messages()
    {
        return [
            'client_id.required' => __('Choose a client'),
            'client_id.exists' => __('Choose a valid client'),
            'job_id.required' => __('Choose a job'),
            'job_id.exists' => __('Choose a valid and enabled job'),
            'crew_id.exists' => __('Choose a valid and enabled crew'),
            'operator_id.required_without' => __('Choose a operator'),
            'operator_id.exists' => __('Choose a valid operator'),
            'scheduled_date.required' => __('Enter the scheduled date'),
            'scheduled_time.required' => __('Enter the scheduled time'),
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'client_id' => $this->get('client'),
            'job_id' => $this->get('job'),
            'crew_id' => $this->get('crew'),
        ]);

        if(! $this->filled('crew') )
            $this->merge(['operator_id' => $this->get('operator')]);
    }
}

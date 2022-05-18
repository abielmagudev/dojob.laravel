<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkStoreRequest extends FormRequest
{
    const REGEXP_TIME = '/^([0-2]\d):([0-5]\d):?([0-5]\d)?$/';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'client_id' => ['required','exists:clients,id'],
            'job_id' => ['required','exists:jobs,id,enabled,1'],
            'assign' => ['required','in:crew,operator'],
            'crew_id' => ['exclude_if:assign,operator','exists:crews,id,enabled,1'],
            'operator_id' => ['exclude_if:assign,crew','exists:operators,id,available,1'],
            'scheduled_date' => ['required','date'],
            'scheduled_time' => ['required','regex:' . self::REGEXP_TIME],
        ];
    }

    public function messages()
    {
        return [
            'client_id.required' => __('Choose a client'),
            'client_id.exists' => __('Choose a valid client'),
            'job_id.required' => __('Choose a job'),
            'job_id.exists' => __('Choose a valid and enabled job'),
            'assign.required' => __('Choose an assignment'),
            'assign.in' => __('Choose a valid assignment'),
            'crew_id.exclude_if' => __('Choose a crew'),
            'crew_id.exists' => __('Choose a valid and enabled crew'),
            'operator_id.exclude_if' => __('Choose a operator'),
            'operator_id.exists' => __('Choose a valid operator'),
            'scheduled_date.required' => __('Enter the scheduled date'),
            'scheduled_date.date' => __('Enter a valid scheduled date'),
            'scheduled_time.required' => __('Enter the scheduled time'),
            'scheduled_time.regex' => __('Enter a valid scheduled time'),
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'client_id' => $this->client,
            'job_id' => $this->job,
            'crew_id' => $this->crew,
            'operator_id' => $this->operator,
        ]);
    }
}

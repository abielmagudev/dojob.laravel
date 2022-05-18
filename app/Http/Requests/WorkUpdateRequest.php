<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Work;

class WorkUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'assign' => ['required','in:crew,operator'],
            'crew_id' => ['nullable',$this->rule_exists->crew],
            'operator_id' => ['exclude_if:assign,crew',$this->rule_exists->operator],
            'scheduled_date' => ['required','date'],
            'scheduled_time' => ['required','regex:' . WorkStoreRequest::REGEXP_TIME],
            'started_date' => ['nullable','date'],
            'started_time' => ['nullable','regex:' . WorkStoreRequest::REGEXP_TIME],
            'finished_date' => ['nullable','date'],
            'finished_time' => ['nullable','regex:' . WorkStoreRequest::REGEXP_TIME],
            'closed_date' => ['nullable','date'],
            'closed_time' => ['nullable','regex:' . WorkStoreRequest::REGEXP_TIME],
            'status' => ['required',"in:{$this->all_status}"],
        ];
    }

    public function messages()
    {
        return [
            'assign.required' => __('Choose an assignment'),
            'assign.in' => __('Choose a valid assignment'),
            'crew_id.exists' => __('Choose a valid and enabled crew'),
            'operator_id.exclude_if' => __('Choose a operator'),
            'operator_id.exists' => __('Choose a valid operator'),
            'scheduled_date.required' => __('Enter the scheduled date'),
            'scheduled_date.date' => __('Enter a valid scheduled date'),
            'scheduled_time.required' => __('Enter the scheduled time'),
            'scheduled_time.regex' => __('Enter a valid scheduled time'),
            'started_date.date' => __('Enter a valid started date'),
            'started_time.regex' => __('Enter a valid started time'),
            'finished_date.date' => __('Enter a valid finished date'),
            'finished_time.regex' => __('Enter a valid finished time'),
            'closed_date.date' => __('Enter a valid closed date'),
            'closed_time.regex' => __('Enter a valid closed time'),
            'status.required' => __('Choose the work status'),
            'status.in' => __('Choose a valid work status'),
        ];
    }

    public function prepareForValidation()
    {
        $this->all_status = implode(',', Work::allStatus());

        $this->rule_exists = (object) [
            'crew' => $this->filled('crew') ? 'exists:crews,id,enabled,1' : 'exists:crews,id',
            'operator' => $this->filled('operator') ? 'exists:operators,id,available,1' : 'exists:operators,id',
        ];

        $this->merge([
            'crew_id' => $this->assign === 'crew' ? ($this->crew ?? $this->work->crew_id) : null,
            'operator_id' => $this->assign === 'operator' ? ($this->operator ?? $this->work->operators->first()->id) : null,
        ]);
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkUpdateByOperatorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'start' => ['sometimes', 'required_without:finish', 'accepted'],
            'finish' => ['sometimes', 'required_without:start', 'accepted'],
            'status' => ['in:' . $this->all_status],
            'started_date' => ['nullable', 'date'],
            'started_time' => ['nullable', 'regex:' . WorkStoreRequest::REGEXP_TIME],
            'finished_date' => ['nullable', 'date'],
            'finished_time' => ['nullable', 'regex:' . WorkStoreRequest::REGEXP_TIME],
        ];
    }

    public function messages()
    {
        return [
            'start.required_without' => __('Click the start button'),
            'start.accept' => __('Click on the start button presented'),
            'finish.required_without' => __('Click the finish button valid'),
            'finish.accept' => __('Click on the finish button presented'),
        ];
    }

    public function prepareForValidation()
    {
        $this->all_status = implode(',', \App\Models\Work::allStatus());

        $this->merge([
            'status' => $this->filled('start') ? 'started' : 'finished',
            'started_date' => $this->filled('start') ? now()->toDateString() : $this->route()->work->started_date,
            'started_time' => $this->filled('start') ? now()->toTimeString() : $this->route()->work->started_time,
            'finished_date' => $this->filled('finish') ? now()->toDateString() : $this->route()->work->finished_date,
            'finished_time' => $this->filled('finish') ? now()->toTimeString() : $this->route()->work->finished_time,
        ]);
    }
}

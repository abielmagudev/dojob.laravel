<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarrantyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required','string'],
            'notes' => 'nullable',
            'expires' => $this->isMethod('post') ? ['required','date','after:today'] : ['required','date'],
            'work_id' => $this->isMethod('post') ? ['required','exists:works,id'] : 'exclude',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('Enter warranty\'s title'),
            'title.string' => __('Enter a valid warranty\'s title'),
            'expires.required' => __('Enter the warranty expiration date'),
            'expires.date' => __('Enter a valid warranty expiration date'),
            'expires.after' => __('Enter the warranty expiration date after today'),
            'work_id.required' => __('Choose a work for the guarantee'),
            'work_id.exists' => __('Choose a valid job for the guarantee'),
        ];
    }

    public function prepareForValidation()
    {
        if( $this->isMethod('post') )
            $this->merge(['work_id' => $this->get('work')]);
    }
}

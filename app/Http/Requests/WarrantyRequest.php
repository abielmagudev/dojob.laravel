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
        $rules = [
            'expires' => ['required','date','after:today'],
            'notes' => 'nullable',
            'work_id' => ['required','exists:works,id'],
        ];
        
        if(! $this->isMethod('post') )
            unset( $rules['expires'][2] ); // Remove validation after:today when is update

        return $rules;
    }

    public function messages()
    {
        return [
            'expires.required' => __('Enter the warranty expiration date'),
            'expires.date' => __('Enter a valid warranty expiration date'),
            'expires.after' => __('Enter the warranty expiration date after today'),
            'work_id.required' => __('Choose a job for the guarantee'),
            'work_id.exists' => __('choose a valid job for the guarantee'),
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'work_id' => $this->isMethod('post') ? $this->get('work') : $this->warranty->work_id,
        ]);
    }
}

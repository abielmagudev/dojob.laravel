<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Intermediary;

class IntermediaryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required','unique:intermediaries,name,' . $this->intermediary_id],
            'alias' => ['required','unique:intermediaries,alias,' . $this->intermediary_id],
            'contact' => ['nullable', 'string'],
            'phone' =>  ['required','unique:intermediaries,phone,' . $this->intermediary_id],
            'email' => ['required','unique:intermediaries,email,' . $this->intermediary_id],
            'available' => ['boolean'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Enter intermediary\'s name'),
            'name.unique' => __('Enter another intermediary\'s name'),
            'alias.required' => __('Enter intermediary\'s alias'),
            'alias.required' => __('Enter another intermediary\'s alias'),
            'contact.string' => __('Enter a valid information of contact'),
            'phone.required' => __('Enter intermediary\'s phone'),
            'phone.unique' => __('Enter another intermediary\'s phone'),
            'email.required' => __('Enter intermediary\'s email'),
            'email.unique' => __('Enter another intermediary\'s email'),
            'available' => __('Choose a valid option to available or unavailable the intermediary'),
        ];
    }

    public function prepareForValidation()
    {
        $this->intermediary_id = $this->route()->originalParameter('intermediary') ?? 0;

        $this->merge([
            'alias' => $this->filled('name') &&! $this->filled('alias') ? Intermediary::generateAlias($this->name) : $this->alias,
            'available' => (int) $this->filled('available'),
        ]);
    }
}

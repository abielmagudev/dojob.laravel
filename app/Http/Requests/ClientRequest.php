<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required','string'],
            'lastname' => ['required','string'],
            'alias' => ['nullable'],
            'address' => ['required'],
            'zip_code' => ['required', 'unique:clients,zip_code,' . $this->client_id],
            'city' => ['required'],
            'state' => ['required'],
            'country' => ['required'],
            'phone' => ['required'],
            'email' => ['nullable','email'],
            'notes' => ['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Enter the client\'s name'),
            'name.string' => __('Write a valid name for the client'),
            'lastname.required' => __('Enter the client\'s lastname'),
            'lastname.string' => __('Write a valid lastname for the client'),
            'address.required' => __('Enter the client\'s address'),
            'zip_code.required' => __('Enter the client\'s zip code'),
            'city.required' => __('Enter the client\'s city'),
            'state.required' => __('Enter the client\'s state'),
            'country.required' => __('Enter the client\'s country'),
            'phone.required' => __('Enter the client\'s phone'),
            'email.email' => __('Write a valid email for the client'),
        ];
    }

    public function prepareForValidation()
    {
        $this->client_id = $this->route()->originalParameter('client') ?? 0;
    }
}

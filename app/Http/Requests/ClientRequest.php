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
            'name.required' => __('Write the name of client'),
            'name.string' => __('Write a valid name to client'),
            'lastname.required' => __('Write the lastname of client'),
            'lastname.string' => __('Write a valid lastname to client'),
            'address.required' => __('Write the address of client'),
            'zip_code.required' => __('Write the zip code of client'),
            'city.required' => __('Write the city of client'),
            'state.required' => __('Write the state of client'),
            'country.required' => __('Write the country of client'),
            'phone.required' => __('Write the phone of client'),
            'email.email' => __('Write a valid email of client'),
        ];
    }

    public function prepareForValidation()
    {
        $this->client_id = $this->route()->originalParameter('client') ?? 0;
    }
}

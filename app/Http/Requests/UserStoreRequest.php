<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'unique:users,name'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'email_verified_at' => 'required',
            'remember_token' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Enter the user\'s name'),
            'name.unique' => __('Enter another name for the user'),
            'email.required' => __('Enter the user\'s email'),
            'email.unique' => __('Enter another email for the user'),
            'password.required' => __('Enter the user\'s password'),
            'password.min' => __('The password must have a minimum of 8 characters'),
            'password.confirmed' => __('The confirmation password must be equal to the password field'),
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}

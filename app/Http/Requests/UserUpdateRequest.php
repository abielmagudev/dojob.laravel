<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'unique:users,name,' . $this->user_id],
            'email' => ['required', 'unique:users,email,' . $this->user_id],
            'password' => ['sometimes', 'min:8', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Enter the user\'s name'),
            'name.unique' => __('Enter another name for the user'),
            'email.required' => __('Enter the user\'s email'),
            'email.unique' => __('Enter another email for the user'),
            'password.min' => __('The password must have a minimum of 8 characters'),
            'password.confirmed' => __('The confirmation password must be equal to the password field'),
        ];
    }

    public function prepareForValidation()
    {
        $this->user_id = $this->route()->originalParameter('user') ?? 0;

        if( is_null($this->password) )
            $this->request->remove('password');
    }
}

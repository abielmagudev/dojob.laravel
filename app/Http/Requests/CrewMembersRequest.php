<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrewMembersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'members' => ['required','array'],
            'members.*' => 'exists:members,id,is_available,1',
        ];
    }

    public function messages()
    {
        return [
            'members.required' => __('Choose one or more members from the list'),
            'members.array' => __('Choose only from the list of members'),
            'members.*.exists' => __('Choose one or more available members from the list'),
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPluginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'plugins' => 'array',
            'plugins.*' => 'exists:plugins,id',
        ];
    }

    public function messages()
    {
        return [
            'plugins.array' => __('Check any plugin of list'),
            'plugins.*.exists' => __('Check any valid plugin of list'),
        ];
    }
}

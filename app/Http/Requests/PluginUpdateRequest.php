<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PluginUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'settings_encoded' => ['nullable','string'],
            'is_enabled' => ['boolean'],
        ];
    }

    public function messages()
    {
        return [
            'settings_encoded.string' => __('Select the valid configuration for the plugin'),
            'is_enabled.boolean' => __('Select the valid option to enable'),
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'settings_encoded' => $this->filled('settings') && is_array($this->settings) ? json_encode($this->settings) : null,
            'is_enabled' => (int) $this->filled('enabled'),
        ]);
    }
}

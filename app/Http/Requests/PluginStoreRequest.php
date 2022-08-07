<?php

namespace App\Http\Requests;

use App\Models\ApiPlugin;
use Illuminate\Foundation\Http\FormRequest;

class PluginStoreRequest extends FormRequest
{
    const MISSING_HASHED_PLUGIN = false;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'api_plugin_id' => ['required', 'exists:api_plugins,id'],
            'custom_settings' => ['nullable','string'],
        ];
    }

    public function messages()
    {
        return [
            'api_plugin_id.required' => __('Select the plugin you want to buy'),
            'api_plugin_id.exists' => __('Select a valid plugin you want to buy'),
        ];
    }

    public function prepareForValidation()
    {
        if(! $this->filled('plugin') )
            return self::MISSING_HASHED_PLUGIN;

        $api_plugin = ApiPlugin::where('hashed', $this->plugin)->first();

        $this->merge([
            'api_plugin_id' => $api_plugin->id ?? 0,
            'custom_settings' => $api_plugin->default_settings,
        ]);
    }
}

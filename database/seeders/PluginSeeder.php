<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApiPlugin;
use App\Models\Plugin;

class PluginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $api_plugins = ApiPlugin::all();

        foreach($api_plugins as $api_plugin)
        {
            if( (bool) random_int(0,1) )
            {
                Plugin::create([
                    'api_plugin_id' => $api_plugin->id,
                    'settings_encoded' => $api_plugin->settings_default,
                ]);
            }
        }
    }
}

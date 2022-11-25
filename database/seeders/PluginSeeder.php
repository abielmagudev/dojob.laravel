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
        foreach(ApiPlugin::all() as $api_plugin)
        {
            if( (bool) random_int(0,1) )
            {
                Plugin::create([
                    'api_plugin_id' => $api_plugin->id,
                    'settings' => random_int(0,1) ? $api_plugin->settings : null,
                ]);
            }
        }
    }
}

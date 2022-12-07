<?php

namespace Database\Seeders;

use App\Models\ApiPlugin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ApiPluginSeeder extends Seeder
{
    public function run()
    {
        $been_created = count(ApiPlugin::testNames());

        foreach(ApiPlugin::testNames() as $name => $description)
        {
            ApiPlugin::create([
                'api_catalog_id' => mt_rand(1, $been_created),
                'name' => $name,
                'description' => $description,
                'configuration' => json_encode([
                    'dashboard' => [
                        'small',
                        'basic',
                        'large'
                    ],
                    'except' => [
                        'job one',
                        'job two',
                        'job three',
                    ],
                ]),
                'version' => mt_rand(0,1) ? sprintf("%s.%s.%s", mt_rand(0,9), mt_rand(0,9), mt_rand(0,9)) :  sprintf("%s.%s", mt_rand(0,9), mt_rand(0,9)),
                'price' => mt_rand(0,1) ? mt_rand(1.00, 500.99) : null,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\ApiPlugin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ApiPluginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApiPlugin::create([
            'catalog_id' => mt_rand(1, ApiCatalogSeeder::TOTAL),
            'name' => 'Predective maintenance',
            'description' => 'Review and approval of the work done',
            'default_settings' => json_encode(['one' => 'uno']),
            'version' => mt_rand(1.0, 4.9),
            'price' => mt_rand(0,1) ? mt_rand(1.00, 300.99) : null,
            'hashed' => Str::random(16), 
        ]);

        ApiPlugin::create([
            'catalog_id' => mt_rand(1, ApiCatalogSeeder::TOTAL),
            'name' => 'Preventive maintenance',
            'description' => 'Keeps work done in good condition',
            'default_settings' => json_encode(['two' => 'dos']),
            'version' => mt_rand(1.0, 7.9),
            'price' => mt_rand(0,1) ? mt_rand(1.00, 300.99) : null,
            'hashed' => Str::random(16), 
        ]);

        ApiPlugin::create([
            'catalog_id' => mt_rand(1, ApiCatalogSeeder::TOTAL),
            'name' => 'Corrective maintenance',
            'description' => 'Correct the error or several errors of a work done',
            'default_settings' => json_encode(['three' => 'tres']),
            'version' => mt_rand(1.0, 9.9),
            'price' => mt_rand(0,1) ? mt_rand(1.00, 300.99) : null,
            'hashed' => Str::random(16), 
        ]);
    }
}

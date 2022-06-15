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
            'name' => 'Predective maintenance',
            'description' => 'Review and approval of the work done',
            'settings_default' => json_encode(['one' => 'uno']),
            'price' => mt_rand(1.00, 300.99),
            'version' => mt_rand(1.0, 4.9),
            'hashed' => Str::random(16), 
            'is_free' => (bool) mt_rand(0,1),
            'catalog_id' => mt_rand(1, ApiCatalogSeeder::TOTAL),
        ]);

        ApiPlugin::create([
            'name' => 'Preventive maintenance',
            'description' => 'Keeps work done in good condition',
            'settings_default' => json_encode(['two' => 'dos']),
            'price' => mt_rand(1.00, 300.99),
            'version' => mt_rand(1.0, 7.9),
            'hashed' => Str::random(16), 
            'is_free' => (bool) mt_rand(0,1),
            'catalog_id' => mt_rand(1, ApiCatalogSeeder::TOTAL),
        ]);

        ApiPlugin::create([
            'name' => 'Corrective maintenance',
            'description' => 'Correct the error or several errors of a work done',
            'settings_default' => json_encode(['three' => 'tres']),
            'price' => mt_rand(1.00, 300.99),
            'version' => mt_rand(1.0, 9.9),
            'hashed' => Str::random(16), 
            'is_free' => (bool) mt_rand(0,1),
            'catalog_id' => mt_rand(1, ApiCatalogSeeder::TOTAL),
        ]);
    }
}

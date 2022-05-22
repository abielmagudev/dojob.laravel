<?php

namespace Database\Seeders;

use App\Models\Plugin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PluginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plugin::create([
            'name' => 'Predective maintenance',
            'description' => 'Review and approval of the work done',
            'price' => 50.50,
            'version' => 1.0,
            'hashed' => Str::random(16), 
            'catalog_id' => mt_rand(1,16),
        ]);

        Plugin::create([
            'name' => 'Preventive maintenance',
            'description' => 'Keeps work done in good condition',
            'price' => 175.00,
            'version' => 2.3,
            'hashed' => Str::random(16), 
            'catalog_id' => mt_rand(1,16),
        ]);

        Plugin::create([
            'name' => 'Corrective maintenance',
            'description' => 'Correct the error or several errors of a work done',
            'price' => 315.25,
            'version' => 1.5,
            'hashed' => Str::random(16), 
            'catalog_id' => mt_rand(1,16),
        ]);
    }
}

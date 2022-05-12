<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        Plugin::create([
            'name' => 'Predective maintenance',
            'description' => 'Review and approval of the work done',
        ]);

        Plugin::create([
            'name' => 'Preventive maintenance',
            'description' => 'Keeps work done in good condition',
        ]);

        Plugin::create([
            'name' => 'Corrective maintenance',
            'description' => 'Correct the error or several errors of a work done',
        ]);
    }
}

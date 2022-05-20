<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IntermediarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \App\Models\Intermediary::factory(10)->create();
    }
}

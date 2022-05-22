<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IntermediarySeeder extends Seeder
{
    const TOTAL = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \App\Models\Intermediary::factory( self::TOTAL )->create();
    }
}

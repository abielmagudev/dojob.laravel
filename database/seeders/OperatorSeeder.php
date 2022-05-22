<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OperatorSeeder extends Seeder
{
    const TOTAL = 25;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \App\Models\Operator::factory( self::TOTAL )->create();
    }
}

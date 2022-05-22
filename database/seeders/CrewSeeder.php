<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CrewSeeder extends Seeder
{
    const TOTAL = 8;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       return \App\Models\Crew::factory( self::TOTAL )->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Crew;

class CrewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Crew::factory(5)->create();
    }
}

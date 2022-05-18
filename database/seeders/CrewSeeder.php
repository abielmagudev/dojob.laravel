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
        $crews = Crew::factory(7)->create();

        foreach($crews as $crew)
        {
            if(! $crew->isEnabled() )
                $crew->removeOperators();
        }
    }
}

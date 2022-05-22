<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CrewRemoveOperatorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(\App\Models\Crew::all() as $crew)
        {
            if(! $crew->isEnabled() )
                $crew->removeOperators();
        }
    }
}

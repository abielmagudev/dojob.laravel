<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Work;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $works = Work::factory(500)->create();

        foreach($works as $work)
        {
            if(! isset($work->crew_id) )
                $work->attachOperators( mt_rand(1,25) );
        }
    }
}

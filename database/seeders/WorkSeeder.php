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
            $operators_id = $work->hasCrew() && $work->crew->isEnabled() ? $work->crew->operatorsId() : [mt_rand(1, 25)];
            $work->attachOperators($operators_id);
        }
    }
}

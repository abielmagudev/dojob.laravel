<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    const TOTAL = 500;

    private $crew_operators_cache = [];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $works = \App\Models\Work::factory( self::TOTAL )->create();

        foreach($works as $work)
        {
            if(! $work->hasCrew() )
            {
                $single_operator_id = mt_rand(1, \Database\Seeders\OperatorSeeder::TOTAL);
                $work->attachOperators([$single_operator_id]);
                continue;
            }
            
            $work->attachOperators( $this->getCrewOperatorsId($work->crew) );
        }
    }

    public function getCrewOperatorsId(\App\Models\Crew $crew): array
    {
        if(! array_key_exists($crew->id, $this->crew_operators_cache) )
        {
            $operators_id = $crew->isEnabled() ? $crew->operators->pluck('id')->toArray() : [];
            $this->crew_operators_cache[$crew->id] = $operators_id;
        }

        return $this->crew_operators_cache[$crew->id];
    }
}

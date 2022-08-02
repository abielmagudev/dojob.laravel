<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    const TOTAL = 500;

    private $crew_members_cache = [];
    
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
                $single_member_id = mt_rand(1, MemberSeeder::TOTAL);
                $work->attachWorkers([$single_member_id]);
                continue;
            }
            
            $work->attachWorkers( $this->crewMembersId($work->crew) );
        }
    }

    public function crewMembersId(\App\Models\Crew $crew): array
    {
        if(! array_key_exists($crew->id, $this->crew_members_cache) )
        {
            $members_id = $crew->isEnabled() ? $crew->members->pluck('id')->toArray() : [];
            $this->crew_members_cache[$crew->id] = $members_id;
        }

        return $this->crew_members_cache[$crew->id];
    }
}

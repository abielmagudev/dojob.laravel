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
            if(! $work->hasAssignedCrew() )
            {
                $single_member_id = mt_rand(1, MemberSeeder::TOTAL);
                $work->attachMembers([$single_member_id]);
                continue;
            }
            
            $work->attachMembers( $this->membersIdByCrew($work->crew) );
        }
    }

    public function membersIdByCrew(\App\Models\Crew $crew): array
    {
        if(! array_key_exists($crew->id, $this->crew_members_cache) )
        {
            $members_id = $crew->isEnabled() ? $crew->members->pluck('id')->toArray() : [];
            $this->crew_members_cache[$crew->id] = $members_id;
        }

        return $this->crew_members_cache[$crew->id];
    }
}

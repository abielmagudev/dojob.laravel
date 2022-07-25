<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MemberSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff = \App\Models\Member::all();
        $skills = \App\Models\Skill::all();

        $staff->each( function ($member) use ($skills) {
            if( $total = mt_rand(0, SkillSeeder::TOTAL) )
            {
                $skills_random = $skills->random($total)->pluck('id')->toArray();
                $member->attachSkills($skills_random);
            }
        });
    }
}

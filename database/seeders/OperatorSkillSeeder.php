<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OperatorSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $operators = \App\Models\Operator::all();
        $skills = \App\Models\Skill::all();

        $operators->each( function ($operator) use ($skills) {
            if( mt_rand(0,1) )
            {
                $skills_random = $skills->random()->pluck('id')->toArray();
                $operator->attachSkills($skills_random, ['created_at' => now()]);
            }
        });
    }
}

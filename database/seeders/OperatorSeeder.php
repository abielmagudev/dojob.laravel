<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Operator;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $operators = Operator::factory(25)->create();

        foreach($operators as $operator)
        {
            if( (bool) mt_rand(0,1) )
            {
                $skills_id = range(1, mt_rand(2,8));
                $attributes = ['created_at' => now()];
                $operator->attachSkills($skills_id, $attributes);
            }
        }
    }
}

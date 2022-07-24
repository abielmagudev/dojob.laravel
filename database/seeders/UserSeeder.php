<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Member;
use App\Models\Intermediary;
use App\Models\Operator;

class UserSeeder extends Seeder
{
    public function __construct(\Faker\Generator $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // return User::factory(10)->create();

        $staff = Member::onlyAvailable()->get();
        foreach($staff as $member)
        {
            $member->user()->create([
                'email' => $member->email,
                'password' => 'password',
            ]);
        }

        $intermediaries = Intermediary::onlyAvailable()->get();
        foreach($intermediaries->random(3) as $intermediary)
        {
            $intermediary->user()->create([
                'email' => $this->faker->email(),
                'password' => 'password',
            ]);
        }

        return;
        
        $operators = Operator::onlyAvailable()->get();
        foreach($operators->random(5) as $intermediary)
        {
            $intermediary->user()->create([
                'email' => $this->faker->email(),
                'password' => 'password',
            ]);
        }
    }
}

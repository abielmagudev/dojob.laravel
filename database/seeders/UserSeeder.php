<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Member;
use App\Models\Intermediary;
use App\Models\Operator;
use Spatie\Permission\Models\Role;

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
        $roles = Role::all();

        $member_roles = $roles->where('name', '<>', 'intermediary');
        $members = Member::onlyAvailable()->get();
        foreach($members as $member)
        {
            $member->user()->create([
                'email' => $member->email,
                'password' => 'password',
            ]);

            $member->user->assignRole( $member_roles->random(1)->first() );
        }

        $intermediary_role = $roles->where('name', 'intermediary')->first();
        $intermediaries = Intermediary::onlyAvailable()->get();
        foreach($intermediaries->random( $intermediaries->count() ) as $intermediary)
        {
            $intermediary->user()->create([
                'email' => $this->faker->email(),
                'password' => 'password',
            ]);

            $intermediary->user->assignRole( $intermediary_role  );
        }
    }
}

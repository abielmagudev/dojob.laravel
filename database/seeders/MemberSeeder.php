<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    const TOTAL = 75;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \App\Models\Member::factory( self::TOTAL )->create();
    }
}

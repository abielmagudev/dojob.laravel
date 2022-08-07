<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    const TOTAL = 25;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Job::factory( self::TOTAL )->create();
    }
}

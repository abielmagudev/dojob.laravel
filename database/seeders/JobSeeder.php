<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Plugin;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plugins = Plugin::all();

        foreach(Job::defaults() as $job => $description) {
            $saved = Job::create([
                'name' => $job,
                'description' => $description,
                'custom' => (int) false,
            ]);

            $saved->plugins()->attach( $plugins->shift() );
        };

        return Job::factory(25)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JobPluginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = \App\Models\Job::all();
        $plugins = \App\Models\Plugin::all();

        $jobs->each( function ($job) use ($plugins) {
            // $job->plugins()->attach( $plugins->shift() );
            // $job->plugins()->attach( $plugins->random()->all() );

            if( random_int(0,1) )
            {
                $plugins_id = range(1, mt_rand(2,4));
                $job->plugins()->attach( $plugins_id );
            }
        } );
    }
}

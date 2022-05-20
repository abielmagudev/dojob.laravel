<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ClientSeeder::class,
            CrewSeeder::class,
            IntermediarySeeder::class,
            JobSeeder::class,
            OperatorSeeder::class,
            PluginSeeder::class,
            UserSeeder::class,
            WarrantySeeder::class,
            WorkSeeder::class,
        ]);
    }
}

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
            OperatorSeeder::class,
            PluginSeeder::class,
            JobSeeder::class,
            WarrantySeeder::class,
            WorkSeeder::class,
            UserSeeder::class,
        ]);
    }
}

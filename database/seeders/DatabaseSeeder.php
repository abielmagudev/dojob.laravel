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
            // Catalog
            ClientSeeder::class,
            CrewSeeder::class,
            IntermediarySeeder::class,
            JobSeeder::class,
            PluginSeeder::class,
            SkillSeeder::class,
            UserSeeder::class,

            // Relationals
            OperatorSeeder::class,
            CrewRemoveOperatorsSeeder::class,
            WorkSeeder::class,
            WarrantySeeder::class,

            // Pivot
            JobPluginSeeder::class,
            OperatorSkillSeeder::class,
        ]);
    }
}

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
            // API
            ApiCatalogSeeder::class,
            ApiPluginSeeder::class,

            // Catalog
            PluginSeeder::class,
            ClientSeeder::class,
            CrewSeeder::class,
            IntermediarySeeder::class,
            JobSeeder::class,
            SkillSeeder::class,

            // Relationals
            OperatorSeeder::class,
            CrewRemoveOperatorsSeeder::class,
            WorkSeeder::class,
            WarrantySeeder::class,

            // Pivot
            // JobPluginSeeder::class,
            OperatorSkillSeeder::class,

            // Auth
            UserSeeder::class,
        ]);
    }
}

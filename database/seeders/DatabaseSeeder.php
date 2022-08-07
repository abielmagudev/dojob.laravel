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
            MemberSeeder::class,

            // Relationals
            CrewRemoveMembersSeeder::class,
            WorkSeeder::class,
            WarrantySeeder::class,

            // Pivot
            // JobPluginSeeder::class,
            MemberSkillSeeder::class,

            // Auth
            UserSeeder::class,
        ]);
    }
}

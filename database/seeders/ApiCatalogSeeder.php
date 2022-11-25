<?php

namespace Database\Seeders;

use App\Models\ApiCatalog;
use Illuminate\Database\Seeder;

class ApiCatalogSeeder extends Seeder
{
    public static function hasBeenCreated()
    {
        return count(ApiCatalog::testNames());
    }

    public function run()
    {
        foreach(ApiCatalog::testNames() as $name)
        {
            ApiCatalog::create([
                'name' => $name
            ]);
        }
    }
}

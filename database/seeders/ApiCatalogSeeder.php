<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApiCatalog;

class ApiCatalogSeeder extends Seeder
{
    const TOTAL = 4;

    public function run()
    {
        $catalogs_name = [
            'carpenter',
            'cleaning',
            'insulation',
            'painting',
        ];

        foreach($catalogs_name as $name)
        {
            ApiCatalog::create([
                'name' => $name
            ]);
        }
    }
}

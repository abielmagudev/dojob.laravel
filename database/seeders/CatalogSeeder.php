<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalog;

class CatalogSeeder extends Seeder
{
    const TOTAL = 3;

    public function run()
    {
        foreach(['insulation', 'carpenter', 'painting', 'cleaning'] as $name)
        {
            Catalog::create([
                'name' => $name
            ]);
        }
    }
}

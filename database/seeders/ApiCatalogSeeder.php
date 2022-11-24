<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApiCatalog;

class ApiCatalogSeeder extends Seeder
{
    public static $defaults = [
        'carpenter',
        'cleaning',
        'insulation',
        'painting',
    ];

    public static function hasBeenCreated()
    {
        return count(self::$defaults);
    }

    public function run()
    {
        foreach(self::$defaults as $name)
        {
            ApiCatalog::create([
                'name' => $name
            ]);
        }
    }
}

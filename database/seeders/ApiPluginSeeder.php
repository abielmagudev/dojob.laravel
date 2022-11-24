<?php

namespace Database\Seeders;

use App\Models\ApiPlugin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ApiPluginSeeder extends Seeder
{
    public static $defaults = [
        'Predective maintenance' => 'Review and approval of the work done',
        'Preventive maintenance' => 'Keeps work done in good condition',
        'Corrective maintenance' => 'Correct the error or several errors of a work done',
    ];

    public static function hasBeenCreated()
    {
        return count(self::$defaults);
    }

    public function run()
    {
        foreach(self::$defaults as $name => $description)
        {
            ApiPlugin::create([
                'catalog_id' => mt_rand(1, ApiCatalogSeeder::hasBeenCreated()),
                'name' => $name,
                'description' => $description,
                'settings' => json_encode(['one' => 'uno']),
                'version' => mt_rand(1.0, 4.9),
                'price' => mt_rand(0,1) ? mt_rand(1.00, 300.99) : null,
                'hashed' => Str::random(16), 
            ]);
        }
    }
}

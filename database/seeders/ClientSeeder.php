<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    const TOTAL = 50;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \App\Models\Client::factory( self::TOTAL )->create();
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// Seeders
use Database\Seeders\WorkSeeder;

class WarrantyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titles = [
            'Replace component',
            'Maintenance preventive',
            'Evaulation function',
            'Installation basic',
            'Instructions advanced for custom',
        ];

        return [
            'expires' => $this->faker->date(),
            'title' => $this->faker->randomElement($titles),
            'notes' => $this->faker->paragraph(),
            'work_id' => $this->faker->numberBetween(1, WorkSeeder::TOTAL),
        ];
    }
}

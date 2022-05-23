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
            'Replace component fan',
            'Motor preventive maintenance',
            'Performance Evaulation Equipment',
            'Basic installation',
            'Advanced instructions for custom',
        ];

        return [
            'about' => $this->faker->randomElement($titles),
            'description' => $this->faker->paragraph(),
            'expires' => $this->faker->date(),
            'work_id' => $this->faker->numberBetween(1, WorkSeeder::TOTAL),
        ];
    }
}

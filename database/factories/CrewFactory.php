<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CrewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique(true)->colorName() . mt_rand(0,9),
            'color' => $this->faker->hexcolor(),
            'description' => $this->faker->paragraph(),
            'is_enabled' => (int) $this->faker->boolean(),
        ];
    }
}

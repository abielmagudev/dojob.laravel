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
            'name' => $this->faker->unique(true)->colorName(),
            'color' => $this->faker->hexcolor(),
            'description' => $this->faker->paragraph(),
            'enabled' => (int) $this->faker->boolean(),
        ];
    }
}

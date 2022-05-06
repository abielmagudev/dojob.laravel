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
            'name' => $this->faker->colorName(),
            'description' => $this->faker->paragraph(),
            'color' => $this->faker->hexcolor(),
            'disabled' => (int) $this->faker->boolean(),
        ];
    }
}

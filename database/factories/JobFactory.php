<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique(true)->jobTitle() . mt_rand(1,24),
            'description' => $this->faker->paragraph(),
            'is_enabled' => (int) $this->faker->boolean(),
        ];
    }
}

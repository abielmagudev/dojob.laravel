<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique(true)->colorName() . ' ability' . mt_rand(1,24),
            'description' => $this->faker->boolean() ? $this->faker->paragraph() : null,
        ];
    }
}

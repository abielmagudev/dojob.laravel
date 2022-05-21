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
        $emojis = [':smirk:', ':smile:', ':hushed:', '\u{1F603}'];

        return [
            'name' => $this->faker->unique(true)->jobTitle() . ' ' . $this->faker->randomElement($emojis),
            'description' => $this->faker->paragraph(),
            'enabled' => $this->faker->boolean(),
        ];
    }
}

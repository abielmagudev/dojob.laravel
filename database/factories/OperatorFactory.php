<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OperatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'birthdate' => $this->faker->boolean() ? $this->faker->date() : null,
            'notes' => $this->faker->boolean() ? $this->faker->paragraph() : null,
            'crew_id' => $this->faker->boolean() ? $this->faker->numberBetween(1,5) : null,
        ];
    }
}

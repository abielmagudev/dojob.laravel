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
        $available = $this->faker->boolean();

        return [
            'name' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'birthdate' => $this->faker->boolean() ? $this->faker->date() : null,
            'position' => $this->faker->boolean ? $this->faker->jobTitle() : null,
            'notes' => $this->faker->boolean() ? $this->faker->paragraph() : null,
            'available' => (int) $available,
            'crew_id' => $available ? $this->faker->numberBetween(1,5) : null,
        ];
    }
}

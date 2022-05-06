<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
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
            'alias' => $this->faker->boolean() ? $this->faker->company() : null,
            'address' => $this->faker->streetAddress(),
            'zip_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'country' => $this->faker->country(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'notes' => $this->faker->boolean() ? $this->faker->paragraph() : null,
        ];
    }
}

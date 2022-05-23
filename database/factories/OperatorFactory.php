<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// Seeders
use Database\Seeders\CrewSeeder;

class OperatorFactory extends Factory
{
    private $crews_cache;

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
            'birthdate' => $this->faker->optional()->date(),
            'position' => $this->faker->optional()->jobTitle(),
            'notes' => $this->faker->optional()->paragraph(),
            'is_available' => (int) $available,
            'crew_id' => $available ? $this->faker->numberBetween(1, CrewSeeder::TOTAL) : null,
        ];
    }
}

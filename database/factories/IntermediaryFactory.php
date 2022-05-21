<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IntermediaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $company_name = $this->faker->unique(true)->company();

        return [
            'name' => $company_name,
            'alias' => \App\Models\Intermediary::generateAlias($company_name) . 'i' . $this->faker->randomNumber(),
            'contact' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'notes' => $this->faker->optional()->paragraph(),
            'available' => (int) $this->faker->boolean(),
        ];
    }
}

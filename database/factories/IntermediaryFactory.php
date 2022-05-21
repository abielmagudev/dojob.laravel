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
            'alias' => \App\Models\Intermediary::generateAlias($company_name) . 'i' . mt_rand(1,24),
            'contact' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'notes' => $this->faker->boolean() ? $this->faker->paragraph() : null,
            'available' => (int) $this->faker->boolean(),
        ];
    }
}

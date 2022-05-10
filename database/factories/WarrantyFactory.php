<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WarrantyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'work_id' => $this->faker->numberBetween(1,500),
            'expires' => $this->faker->date(),
        ];
    }
}

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
            'expires' => $this->faker->date(),
            'title' => $this->faker->randomElement(['Replace component', 'Maintenance preventive', 'Evaulation function', 'Installation basic','Instructions advanced for custom']),
            'notes' => $this->faker->paragraph(),
            'work_id' => $this->faker->numberBetween(1,500),
        ];
    }
}

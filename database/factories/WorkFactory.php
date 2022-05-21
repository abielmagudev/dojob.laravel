<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Work;

class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = $this->faker->randomElement( Work::allStatus() );

        return [
            'client_id' => $this->faker->numberBetween(1,50),
            'intermediary_id' => $this->faker->optional()->numberBetween(1,10),
            'job_id' => $this->faker->numberBetween(1,25),
            'crew_id' => $this->faker->optional()->numberBetween(1,10),
            'priority' => $this->faker->numberBetween(1,10),
            'status' => $status,
            'scheduled_date' => $this->faker->date(),
            'scheduled_time' => $this->faker->time(),
            'started_date' => $status == 'started' ? $this->faker->date() : null,
            'started_time' => $status == 'started' ? $this->faker->time() : null,
            'finished_date' => $status == 'finished' ? $this->faker->date() : null,
            'finished_time' => $status == 'finished' ? $this->faker->time() : null,
            'closed_date' => in_array($status, Work::allCloseStatus()) ? $this->faker->date() : null,
            'closed_time' => in_array($status, Work::allCloseStatus()) ? $this->faker->time() : null,
        ];
    }
}

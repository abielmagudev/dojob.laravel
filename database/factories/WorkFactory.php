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
        $closed_status = ['completed','canceled','denialed'];

        return [
            'client_id' => $this->faker->numberBetween(1,50),
            'job_id' => $this->faker->numberBetween(1,25),
            'crew_id' => $this->faker->boolean() ? $this->faker->numberBetween(1,10) : null,
            'priority' => $this->faker->numberBetween(1,10),
            'status' => $status,
            'scheduled_date' => $this->faker->date(),
            'scheduled_time' => $this->faker->time(),
            'started_date' => $status == 'started' ? $this->faker->date() : null,
            'started_time' => $status == 'started' ? $this->faker->time() : null,
            'finished_date' => $status == 'finished' ? $this->faker->date() : null,
            'finished_time' => $status == 'finished' ? $this->faker->time() : null,
            'closed_date' => in_array($status, $closed_status) ? $this->faker->date() : null,
            'closed_time' => in_array($status, $closed_status) ? $this->faker->time() : null,
        ];
    }
}

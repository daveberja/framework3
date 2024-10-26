<?php

namespace Database\Factories;

use App\Models\SimulationResult;
use App\Models\Simulation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SimulationResultFactory extends Factory
{
    protected $model = SimulationResult::class;

    public function definition()
    {
        // Define a duration in seconds (e.g., 1 hour = 3600 seconds)
        $duration = $this->faker->numberBetween(1800, 7200); // Random between 30 min and 2 hours

        // Generate data points for each second
        $dataPoints = [];
        for ($second = 0; $second < $duration; $second++) {
            $dataPoints[] = [
                'time' => $second,
                'frequency' => round($this->faker->numberBetween(45, 65), 2), // Random frequency around 50-60 Hz
                'intensity' => round($this->faker->randomFloat(2, 1, 3), 2), // Intensity between 1.0 and 3.0
            ];
        }

        return [
            'simulation_id' => Simulation::factory(), // Creates a new simulation if not provided
            'user_id' => User::factory(),              // Creates a new user if not provided
            'frequency' => $this->faker->numberBetween(45, 65),
            'intensity' => $this->faker->randomFloat(2, 1, 3),
            'duration' => $duration,
            'vibration_level' => $this->faker->randomElement(['V1', 'V2', 'V3']),
            'data_points' => $dataPoints,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Simulation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SimulationFactory extends Factory
{
    protected $model = Simulation::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Creates a new user for each simulation if not provided
            'status' => $this->faker->randomElement(['running', 'completed']),
        ];
    }
}

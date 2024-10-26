<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SimulationResult;
use App\Models\Simulation;
use App\Models\User;

class SimulationResultSeeder extends Seeder
{
    public function run()
    {
        // Get all users and simulations
        $users = User::all();
        $simulations = Simulation::all();

        $simulationResults = [
            [
                'frequency' => 50,
                'intensity' => 1.5,
                'duration' => 3600, // Duration in seconds (e.g., 1 hour)
                'vibration_level' => 'V1',
            ],
            [
                'frequency' => 60,
                'intensity' => 2.0,
                'duration' => 1800, // Duration in seconds (e.g., 30 minutes)
                'vibration_level' => 'V2',
            ],
            // Add more entries as needed
        ];

        foreach ($simulationResults as $result) {
            // Generate data points for each second of the simulation duration
            $dataPoints = [];
            for ($second = 0; $second < $result['duration']; $second++) {
                $dataPoints[] = [
                    'time' => $second,  // Time in seconds
                    'frequency' => round($result['frequency'] + rand(-5, 5), 2), // Random fluctuation around base frequency
                    'intensity' => round($result['intensity'] + rand(-1, 1), 2), // Random fluctuation around base intensity
                ];
            }

            // Create the SimulationResult entry with JSON data_points
            SimulationResult::create([
                'simulation_id' => $simulations->random()->id,
                'user_id' => $users->random()->id,
                'frequency' => $result['frequency'],
                'intensity' => $result['intensity'],
                'duration' => $result['duration'],
                'vibration_level' => $result['vibration_level'],
                'data_points' => $dataPoints, // Store as JSON
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Simulation;

class SimulationSeeder extends Seeder
{
    public function run()
    {
        Simulation::create([
            'startTime' => '2024-10-10 10:00',
            'endTime' => '2024-10-10 18:30',
            'frequency' => 50,
            'amplitude' => 1.5,
            'acceleration' => 9.81,
            'duration' => 30000,
            'batteryName' => '12N12',
        ]);

        Simulation::create([
            'startTime' => '2024-10-11 11:00',
            'endTime' => '2024-10-12 00:30',
            'frequency' => 60,
            'amplitude' => 2.0,
            'acceleration' => 9.81,
            'duration' => 81000,
            'batteryName' => '12N12-3B',
        ]);

        Simulation::create([
            'startTime' => '2024-10-12 09:15',
            'endTime' => '2024-10-12 19:45',
            'frequency' => 55,
            'amplitude' => 1.8,
            'acceleration' => 9.81,
            'duration' => 37800,
            'batteryName' => '12N12-4B',
        ]);

        // Add more simulations as needed
        Simulation::create([
            'startTime' => '2024-10-13 08:00',
            'endTime' => '2024-10-14 02:30',
            'frequency' => 70,
            'amplitude' => 2.5,
            'acceleration' => 9.81,
            'duration' => 63000,
            'batteryName' => '12N12-5B',
        ]);
        
        // Continue adding records...
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Simulation;

class SimulationSeeder extends Seeder
{
    public function run()
    {
        Simulation::insert([
            [
                'startTime' => '2024-10-10 10:00',
                'endTime' => '2024-10-10 18:30',
                'frequency' => 50,
                'amplitude' => 1.5,
                'acceleration' => 9.81,
                'duration' => 1230000,
                'batteryName' => '12N12',
                'intensity' => 0.5, // Example value
                'vibrationLevel' => 1.2, // Example value
                'dataPoint' => 'Data Point 1' // Example value
            ],
            [
                'startTime' => '2024-10-11 11:00',
                'endTime' => '2024-10-12 00:30',
                'frequency' => 60,
                'amplitude' => 2.0,
                'acceleration' => 9.81,
                'duration' => 81000,
                'batteryName' => '12N12-3B',
                'intensity' => 0.6, // Example value
                'vibrationLevel' => 1.3, // Example value
                'dataPoint' => 'Data Point 2' // Example value
            ],
            [
                'startTime' => '2024-10-12 09:15',
                'endTime' => '2024-10-12 19:45',
                'frequency' => 55,
                'amplitude' => 1.8,
                'acceleration' => 9.81,
                'duration' => 37800,
                'batteryName' => '12N12-4B',
                'intensity' => 0.4, // Example value
                'vibrationLevel' => 1.1, // Example value
                'dataPoint' => 'Data Point 3' // Example value
            ],
            [
                'startTime' => '2024-10-13 08:00',
                'endTime' => '2024-10-14 02:30',
                'frequency' => 70,
                'amplitude' => 2.5,
                'acceleration' => 9.81,
                'duration' => 63000,
                'batteryName' => '12N12-5B',
                'intensity' => 0.7, // Example value
                'vibrationLevel' => 1.5, // Example value
                'dataPoint' => 'Data Point 4' // Example value
            ],
            [
                'startTime' => '2024-10-14 10:00',
                'endTime' => '2024-10-14 20:00',
                'frequency' => 50,
                'amplitude' => 1.5,
                'acceleration' => 9.81,
                'duration' => 36000,
                'batteryName' => '12N12-6B',
                'intensity' => 0.5, // Example value
                'vibrationLevel' => 1.0, // Example value
                'dataPoint' => 'Data Point 5' // Example value
            ],
            [
                'startTime' => '2024-10-15 15:00',
                'endTime' => '2024-10-15 23:15',
                'frequency' => 65,
                'amplitude' => 1.9,
                'acceleration' => 9.81,
                'duration' => 49500,
                'batteryName' => '12N12-7B',
                'intensity' => 0.6, // Example value
                'vibrationLevel' => 1.4, // Example value
                'dataPoint' => 'Data Point 6' // Example value
            ],
            [
                'startTime' => '2024-10-16 12:30',
                'endTime' => '2024-10-17 03:00',
                'frequency' => 75,
                'amplitude' => 2.2,
                'acceleration' => 9.81,
                'duration' => 88500,
                'batteryName' => '12N12-8B',
                'intensity' => 0.8, // Example value
                'vibrationLevel' => 1.6, // Example value
                'dataPoint' => 'Data Point 7' // Example value
            ],
            // Adding new entries for longer durations
            [
                'startTime' => '2024-10-17 08:00',
                'endTime' => '2024-10-18 08:00',
                'frequency' => 80,
                'amplitude' => 3.0,
                'acceleration' => 9.81,
                'duration' => 86400,
                'batteryName' => '12N12-9B',
                'intensity' => 0.9, // Example value
                'vibrationLevel' => 1.9, // Example value
                'dataPoint' => 'Data Point 8' // Example value
            ],
            [
                'startTime' => '2024-10-18 09:00',
                'endTime' => '2024-10-19 09:00',
                'frequency' => 90,
                'amplitude' => 3.5,
                'acceleration' => 9.81,
                'duration' => 86400,
                'batteryName' => '12N12-10B',
                'intensity' => 1.0, // Example value
                'vibrationLevel' => 2.0, // Example value
                'dataPoint' => 'Data Point 9' // Example value
            ],
            [
                'startTime' => '2024-10-19 10:00',
                'endTime' => '2024-10-20 14:00',
                'frequency' => 100,
                'amplitude' => 4.0,
                'acceleration' => 9.81,
                'duration' => 144000,
                'batteryName' => '12N12-11B',
                'intensity' => 1.2, // Example value
                'vibrationLevel' => 2.5, // Example value
                'dataPoint' => 'Data Point 10' // Example value
            ],
        ]);
    }
}

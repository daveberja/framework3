<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeasurementSeeder extends Seeder
{
    public function run()
    {
        // Create an array of data to insert
        $measurements = [];
        for ($i = 0; $i < 50; $i++) { // Change 50 to the number of entries you want
            $measurements[] = [
                'amplitude' => rand(1, 100), // Random amplitude between 1 and 100
                'frequency' => rand(1, 1000), // Random frequency between 1 and 1000
                'acceleration' => rand(1, 500), // Random acceleration between 1 and 500
                'duration' => rand(1, 60), // Random duration between 1 and 60 seconds
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert the data into the database
        DB::table('measurements')->insert($measurements);
    }
}
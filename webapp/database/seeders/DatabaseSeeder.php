<?php
use Illuminate\Database\Seeder;
use Database\Seeders\MeasurementSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(MeasurementSeeder::class);
    }
}

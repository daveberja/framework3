<?php
use Illuminate\Database\Seeder;
use Database\Seeders\SimulationResultSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\SimulationSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SimulationSeeder::class);
        $this->call(SimulationResultSeeder::class);
    }
}

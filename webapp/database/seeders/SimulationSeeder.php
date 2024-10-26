<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Simulation;
use App\Models\User;

class SimulationSeeder extends Seeder
{
    public function run()
    {
        // Ensure there are users to associate with simulations
        $users = User::all();

        foreach ($users as $user) {
            // Create one or more simulations per user
            Simulation::factory()->count(2)->create(['user_id' => $user->id]);
        }
    }
}

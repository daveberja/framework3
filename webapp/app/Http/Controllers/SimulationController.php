<?php

namespace App\Http\Controllers;

use App\Models\Simulation; // Adjust this if your model is in a different namespace
use Illuminate\Http\JsonResponse;

class SimulationController extends Controller
{
    public function index(): JsonResponse
    {
        $simulations = Simulation::all(); // Fetch all simulations from the database
        return response()->json($simulations); // Return the simulations as a JSON response
    }
}

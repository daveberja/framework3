<?php

namespace App\Http\Controllers;

use App\Models\SimulationResult;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Retrieve and return simulation result reports with related simulation and user data.
     */
    public function getSimulationResults(Request $request)
    {
        // Set the number of items per page
        $perPage = $request->get('perPage', 10); // Default to 10 items per page

        // Retrieve paginated simulation results, including related simulation and user data
        $simulationResults = SimulationResult::with(['simulation', 'user'])->paginate($perPage);

        return response()->json($simulationResults);
    }
}

<?php
use App\Http\Controllers\ReportController;

Route::get('/simulation-results', [ReportController::class, 'getSimulationResults']);

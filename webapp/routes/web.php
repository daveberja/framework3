<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use Inertia\Inertia;

// Public API route

Route::get('/simulation-results', [ReportController::class, 'getSimulationResults']);


// Welcome Route (No authentication required)
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Routes that require authentication
Route::middleware('auth')->group(function () {
    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // History Route
    Route::get('/history', function () {
        return Inertia::render('History');
    })->name('history');

    // Reports Route
    Route::get('/reports', function () {
        return Inertia::render('reports');
    })->name('reports');

    // Profile Management Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes (Include your auth routes separately)
require __DIR__.'/auth.php';

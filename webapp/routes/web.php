<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimulationController;
use Inertia\Inertia;

Route::get('/api/past-simulations', [SimulationController::class, 'index']);
// Dashboard Route (accessible without login)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// Welcome Route (New welcome page without login and register)
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/simulation', function () {
    return Inertia::render('Simulation');
})->name('simulation');

Route::get('/history', function () {
    return Inertia::render('History');
})->name('history');

// Profile Management Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include authentication routes
require __DIR__.'/auth.php';
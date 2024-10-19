use App\Http\Controllers\SimulationController;

Route::get('/past-simulations', [SimulationController::class, 'index']);

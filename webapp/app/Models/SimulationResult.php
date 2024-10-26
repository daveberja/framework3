<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Simulation;
use App\Models\User;

class SimulationResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'simulation_id',
        'user_id',
        'data_points',
        'frequency',
        'intensity',
        'duration',
        'vibration_level',
    ];

    protected $casts = [
        'data_points' => 'array',  // Converts JSON to array
    ];

    /**
     * Relationship with Simulation model
     */
    public function simulation()
    {
        return $this->belongsTo(Simulation::class);
    }

    /**
     * Relationship with User model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

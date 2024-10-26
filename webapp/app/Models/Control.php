<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Simulation;

class Control extends Model
{
    use HasFactory;

    protected $fillable = [
        'simulation_id',
        'data_points',
        'frequency',
        'intensity',
        'duration',
        'vibration_level',
    ];

    protected $casts = [
        'data_points' => 'array',
    ];

    /**
     * Relationship with Simulation model
     */
    public function simulation()
    {
        return $this->belongsTo(Simulation::class);
    }
}

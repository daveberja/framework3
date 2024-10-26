<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Simulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
    ];

    /**
     * Relationship with User model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with SimulationResult model
     */
    public function results()
    {
        return $this->hasMany(SimulationResult::class);
    }

    /**
     * Relationship with Control model
     */
    public function controls()
    {
        return $this->hasMany(Control::class);
    }
}

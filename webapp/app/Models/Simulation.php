<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulation extends Model
{
    use HasFactory;

    // Optional: specify the table name if it doesn't follow Laravel's naming conventions
    // protected $table = 'simulations'; 

    // Optional: specify fillable fields if you plan to use mass assignment
    protected $fillable = [
        'startTime',
        'endTime',
        'frequency',
        'amplitude',
        'acceleration',
        'duration',
        'batteryName',
    ];
}

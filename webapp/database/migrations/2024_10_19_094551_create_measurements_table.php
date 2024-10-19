<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementsTable extends Migration
{
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->float('amplitude'); // Amplitude column
            $table->float('frequency'); // Frequency column
            $table->float('acceleration'); // Acceleration column
            $table->integer('duration'); // Duration column
            $table->timestamps(); // Timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('measurements');
    }
}

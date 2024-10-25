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
            $table->integer('frequency'); // Frequency column
            $table->float('intensity'); // Intensity column
            $table->float('vibrationLevel'); // Vibration Level column
            $table->integer('duration'); // Duration column
            $table->string('dataPoint'); // Data Point column
            $table->timestamps(); // Timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('measurements');
    }
}

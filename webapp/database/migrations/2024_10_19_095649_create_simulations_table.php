<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimulationsTable extends Migration
{
    public function up()
    {
        Schema::create('simulations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('startTime');
            $table->dateTime('endTime');
            $table->float('frequency');
            $table->float('amplitude');
            $table->float('acceleration');
            $table->integer('duration');
            $table->string('batteryName');
            $table->string('dataPoint'); // Add this line if it doesn't exist
            // Add any other fields you need
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('simulations');
    }
}


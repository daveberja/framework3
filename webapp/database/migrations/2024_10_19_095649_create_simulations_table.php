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
            $table->timestamp('startTime');
            $table->timestamp('endTime');
            $table->integer('frequency');
            $table->float('amplitude');
            $table->float('acceleration');
            $table->integer('duration');
            $table->string('batteryName');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('simulations');
    }
}


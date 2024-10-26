<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlsTable extends Migration
{
    public function up()
    {
        Schema::create('controls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('simulation_id')->constrained('simulations')->onDelete('cascade');
            $table->json('data_points');
            $table->float('frequency');
            $table->float('intensity');
            $table->float('duration');
            $table->enum('vibration_level', ['V1', 'V2', 'V3']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('controls');
    }
}

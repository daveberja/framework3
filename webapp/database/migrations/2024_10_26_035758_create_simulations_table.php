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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('status', 100);
            $table->timestamps();  // Includes both `created_at` and `updated_at`
        });
    }

    public function down()
    {
        Schema::dropIfExists('simulations');
    }
}

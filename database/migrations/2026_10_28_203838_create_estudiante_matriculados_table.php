<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estudiante_matriculados', function (Blueprint $table) {
    $table->id();

    $table->string('estudiante_came');
    $table->foreign('estudiante_came')->references('came')->on('estudiantes')->onDelete('cascade');
    $table->unsignedBigInteger('grupo_id');
    $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
    $table->float('nota');
    $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiante_matriculados');
    }
};

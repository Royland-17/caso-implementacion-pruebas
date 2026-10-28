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
        Schema::create('estudiantes', function (Blueprint $table) {
    $table->string('came')->primary(); // Carné del estudiante
    $table->string('nombre');
    $table->string('apellidos');
    $table->integer('docente_cod_empleado')->nullable();
    $table->foreign('docente_cod_empleado')->references('codEmpleado')->on('docentes')->onDelete('set null');
    $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};

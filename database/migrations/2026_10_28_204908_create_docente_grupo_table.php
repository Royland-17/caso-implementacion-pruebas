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
        Schema::create('docente_grupo', function (Blueprint $table) {
    $table->id();
    
    $table->integer('docente_cod_empleado');
    $table->foreign('docente_cod_empleado')->references('codEmpleado')->on('docentes')->onDelete('cascade');
    $table->unsignedBigInteger('grupo_id');
    $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
    $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docente_grupo');
    }
};

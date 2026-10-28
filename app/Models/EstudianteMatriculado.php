<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EstudianteMatriculado extends Pivot
{
    protected $table = 'estudiante_matriculados';

    protected $fillable = ['estudiante_came', 'grupo_id', 'nota'];
}
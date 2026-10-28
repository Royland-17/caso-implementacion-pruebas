<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = ['numeroCiclo', 'ano', 'numeroGrupo', 'abierto', 'curso_sigla'];

    // Un grupo pertenece a un curso
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_sigla', 'sigla');
    }

    // Un grupo es impartido por 1 o 2 docentes
    public function docentes()
    {
        return $this->belongsToMany(Docente::class, 'docente_grupo', 'grupo_id', 'docente_cod_empleado', 'id', 'codEmpleado');
    }

    // Estudiantes matriculados en el grupo
    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'estudiante_matriculados', 'grupo_id', 'estudiante_came', 'id', 'came')
                    ->using(EstudianteMatriculado::class)
                    ->withPivot('nota');
    }
}
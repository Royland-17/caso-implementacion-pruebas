<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $primaryKey = 'came';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['came', 'nombre', 'apellidos', 'docente_cod_empleado'];

    public function consejero()
    {
        return $this->belongsTo(Docente::class, 'docente_cod_empleado', 'codEmpleado');
    }

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'estudiante_matriculados', 'estudiante_came', 'grupo_id', 'came', 'id')
                    ->withPivot('nota');
    }
}
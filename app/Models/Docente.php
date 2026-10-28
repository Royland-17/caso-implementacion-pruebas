<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $primaryKey = 'codEmpleado';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = ['codEmpleado', 'nombreEmpleado', 'apellidosEmpleado'];

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'docente_cod_empleado', 'codEmpleado');
    }

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'docente_grupo', 'docente_cod_empleado', 'grupo_id', 'codEmpleado', 'id');
    }
}
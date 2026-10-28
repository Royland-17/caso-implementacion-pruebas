<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Curso;
use App\Models\Grupo;

class GrupoTest extends TestCase
{
    use RefreshDatabase;

    public function test_grupo_contiene_informacion_real()
    {
        $curso = Curso::create([
            'sigla' => 'IF6100',
            'nombreCurso' => 'Análisis y Diseño de Sistemas',
            'creditos' => 4,
        ]);

        $grupoCreado = Grupo::create([
            'numeroCiclo' => 2,
            'ano' => 2026,
            'numeroGrupo' => 1,
            'abierto' => true,
            'curso_sigla' => $curso->sigla,
        ]);

        $grupoRecuperado = Grupo::find($grupoCreado->id);

        $this->assertNotNull($grupoRecuperado);
        $this->assertEquals(2, $grupoRecuperado->numeroCiclo);
        $this->assertEquals(2026, $grupoRecuperado->ano);
        $this->assertEquals(1, $grupoRecuperado->numeroGrupo);
        $this->assertTrue((bool) $grupoRecuperado->abierto);
        $this->assertEquals('IF6100', $grupoRecuperado->curso_sigla);
    }
}
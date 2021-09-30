<?php

use App\Models\TipoEstudio;
use Illuminate\Database\Seeder;

class TipoEstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tipoEstudio = TipoEstudio::create([
        	'nombre' => 'Análisis bioquímicos',
        ]);
        $tipoEstudio = TipoEstudio::create([
        	'nombre' => 'Análisis bioquímicos Anexo 01',
        ]);
        $tipoEstudio = TipoEstudio::create([
        	'nombre' => 'Complementarios',
        ]);
        $tipoEstudio = TipoEstudio::create([
        	'nombre' => 'Ex. Clinicos',
        ]);
        $tipoEstudio = TipoEstudio::create([
        	'nombre' => 'Psicotécnico',
        ]);
        $tipoEstudio = TipoEstudio::create([
        	'nombre' => 'Radiología',
        ]);
    }
}

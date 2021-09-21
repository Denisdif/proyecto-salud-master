<?php

use Illuminate\Database\Seeder;
use App\TipoEstudio;

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

        	'nombre' => 'RX',

        ]);

        $tipoEstudio = TipoEstudio::create([

        	'nombre' => 'Laboratorio',

        ]);

        $tipoEstudio = TipoEstudio::create([

        	'nombre' => 'Psicología',
        ]);

        $tipoEstudio = TipoEstudio::create([

        	'nombre' => 'Clinicos',
        ]);
    }
}

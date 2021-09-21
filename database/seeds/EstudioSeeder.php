<?php

use Illuminate\Database\Seeder;
use App\Estudio;

class EstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estudio = Estudio::create([

            'nombre' => 'Torax',
            
            'tipo_estudio_id' => 1,

        ]);

        $estudio = Estudio::create([

            'nombre' => 'Rodilla',
            
            'tipo_estudio_id' => 1,

        ]);

        $estudio = Estudio::create([

            'nombre' => 'Dedo',
            
            'tipo_estudio_id' => 1,

        ]);
        
        $estudio = Estudio::create([

            'nombre' => 'Orina',
            
            'tipo_estudio_id' => 2,

        ]);

        $estudio = Estudio::create([

            'nombre' => 'Sangre',
            
            'tipo_estudio_id' => 2,

        ]);

        $estudio = Estudio::create([

            'nombre' => 'Alturas',
            
            'tipo_estudio_id' => 3,

        ]);

        $estudio = Estudio::create([

            'nombre' => 'Colegios',
            
            'tipo_estudio_id' => 3

        ]);

        $estudio = Estudio::create([

            'nombre' => 'Claustrofobia',
            
            'tipo_estudio_id' => 3,

        ]);

        $estudio = Estudio::create([

            'nombre' => 'Traumas',
            
            'tipo_estudio_id' => 3,

        ]);

        

        
    }
}

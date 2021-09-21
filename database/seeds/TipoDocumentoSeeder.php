<?php

use App\TipoDocumento;
use Illuminate\Database\Seeder;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoDocumento = TipoDocumento::create([

        	'definicion' => 'Documento Nacional de Identidad',

        	'abreviatura' => 'DNI'

        ]);

        $tipoDocumento = TipoDocumento::create([

        	'definicion' => 'Cédula de Identidad',

        	'abreviatura' => 'CI'

        ]);

        $tipoDocumento = TipoDocumento::create([

        	'definicion' => 'Libreta de Enrolamiento',

        	'abreviatura' => 'LE'

        ]);

        $tipoDocumento = TipoDocumento::create([

        	'definicion' => 'Libreta Cívica',

        	'abreviatura' => 'LC'

        ]);
    }
}

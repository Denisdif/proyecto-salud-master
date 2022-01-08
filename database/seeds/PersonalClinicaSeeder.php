<?php

use Illuminate\Database\Seeder;
use App\PersonalClinica;

class PersonalClinicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonalClinica::create([
            'nombres'               =>  'Carlos Lisandro',
            'apellidos'             =>  'Villalba',
            'documento'             =>  '37590136',
            'fecha_nacimiento'      =>  '1993-09-14',
            'cuenta'                =>  true,
            'sexo_id'               =>  2,
            'puesto_id'             =>  1,
            'estado_id'             =>  1,
        ]);



        PersonalClinica::create([
            'nombres'               =>  'Matias',
            'apellidos'             =>  'Kovalski',
            'documento'             =>  '38063440',
            'fecha_nacimiento'      =>  '1994-02-27',
            'cuenta'                =>  true,
            'sexo_id'               =>  2,
            'puesto_id'             =>  1,
            'estado_id'             =>  1,
        ]);

        PersonalClinica::create([
            'nombres'               =>  'Axel',
            'apellidos'             =>  'Britzius',
            'documento'             =>  '22063440',
            'fecha_nacimiento'      =>  '1888-02-27',
            'cuenta'                =>  true,
            'sexo_id'               =>  2,
            'puesto_id'             =>  2,
            'estado_id'             =>  1,
        ]);


               /*PersonalClinica::create([
            'nombres'               =>  'Juan Miguel',
            'apellidos'             =>  'Martinez',
            'documento'             =>  '32144265',
            'fecha_nacimiento'      =>  '1991-01-20',
            'cuenta'                =>  true,
            'tipo_documento_id'     =>  1,
            'sexo_id'               =>  2,
            'puesto_id'             =>  3,
            'estado_id'             =>  2,
        ]);*/

        /*PersonalClinica::create([
            'nombres'               =>  'Maria Andrea',
            'apellidos'             =>  'Pereyra',
            'documento'             =>  '28214421',
            'fecha_nacimiento'      =>  '1993-10-25',
            'cuenta'                =>  true,
            'tipo_documento_id'     =>  1,
            'sexo_id'               =>  1,
            'puesto_id'             =>  4,
            'estado_id'             =>  2,
        ]);*/

    }
}

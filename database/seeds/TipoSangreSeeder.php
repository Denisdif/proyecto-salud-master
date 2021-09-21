<?php

use Illuminate\Database\Seeder;
use App\TipoSangre;

class TipoSangreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // A+
        TipoSangre::create(['sangre'=>'A+']);

        // A-
        TipoSangre::create(['sangre'=>'A-']);


        // B+
        TipoSangre::create(['sangre'=>'B+']);

        // B-
        TipoSangre::create(['sangre'=>'B-']);


        // 0-
        TipoSangre::create(['sangre'=>'0-']);


        // 0+
        TipoSangre::create(['sangre'=>'0+']);


        // AB+
        TipoSangre::create(['sangre'=>'AB+']);


        // AB-
        TipoSangre::create(['sangre'=>'AB-']);



    }
}

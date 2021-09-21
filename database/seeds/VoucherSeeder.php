<?php

use Illuminate\Database\Seeder;
use App\Voucher;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Voucher::create([

        	'codigo' => 0000000001,

        	'declaracion' => 1,

        	'hc_formulario' => 0,

        	'posiciones_forzadas' => 0,

        	'direccionado' => 0,

        	'user_id' => 1,

        	'paciente_id' => 1

        ]);

        Voucher::create([

        	'codigo' => 0000000002,

        	'declaracion' => 1,

        	'hc_formulario' => 0,

        	'posiciones_forzadas' => 0,

        	'direccionado' => 0,

        	'user_id' => 1,

        	'paciente_id' => 2

        ]);

        Voucher::create([

        	'codigo' => 0000000003,

        	'declaracion' => 1,

        	'hc_formulario' => 0,

        	'posiciones_forzadas' => 0,

        	'direccionado' => 0,

        	'user_id' => 1,

        	'paciente_id' => 3

        ]);
    }
}

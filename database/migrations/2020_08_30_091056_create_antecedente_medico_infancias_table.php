<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedenteMedicoInfanciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedente_medico_infancias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('sarampion');
            $table->boolean('rebeola');
            $table->boolean('epilepsia');
            $table->boolean('varicela');
            $table->boolean('parotiditis');
            $table->boolean('cefalea_prolongada');
            $table->boolean('hepatitis');
            $table->boolean('gastritis');
            $table->boolean('ulcera_gastrica');
            $table->boolean('hemorroide');
            $table->boolean('hemorragias');
            $table->boolean('neumonia');
            $table->boolean('asma');
            $table->boolean('tuberculosis');
            $table->boolean('tos_cronica');
            $table->boolean('catarro');

            $table->string('detalle1_m')->nullable(); // (antes observacion)
            $table->enum('especificacion1_m', ['observacion1_m', 'preexistencia1_m'])->nullable();

            $table->unsignedBigInteger('declaracion_jurada_id');
            $table->foreign('declaracion_jurada_id')->references('id')->on('declaracion_juradas')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antecedente_medico_infancias');
    }
}

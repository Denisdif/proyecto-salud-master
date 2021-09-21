<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulacionRodillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulacion_rodillas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('abduccion_derecha_rod');
            $table->boolean('abduccion_izquierda_rod');

            $table->boolean('adduccion_derecha_rod');
            $table->boolean('adduccion_izquierda_rod');

            $table->boolean('flexion_derecha_rod');
            $table->boolean('flexion_izquierda_rod');

            $table->boolean('extension_derecha_rod');
            $table->boolean('extension_izquierda_rod');

            $table->boolean('rexterna_derecha_rod');
            $table->boolean('rexterna_izquierda_rod');

            $table->boolean('rinterna_derecha_rod');
            $table->boolean('rinterna_izquierda_rod');

            $table->boolean('irradiacion_derecha_rod');
            $table->boolean('irradiacion_izquierda_rod');

            $table->boolean('alteracion_derecha_rod');
            $table->boolean('alteracion_izquierda_rod');

            $table->timestamps();

            $table->unsignedBigInteger('posiciones_forzada_id');
            $table->foreign('posiciones_forzada_id')->references('id')->on('posiciones_forzadas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulacion_rodillas');
    }
}

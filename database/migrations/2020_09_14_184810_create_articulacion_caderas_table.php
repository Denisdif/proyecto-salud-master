<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulacionCaderasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulacion_caderas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('abduccion_derecha_cad');
            $table->boolean('abduccion_izquierda_cad');

            $table->boolean('adduccion_derecha_cad');
            $table->boolean('adduccion_izquierda_cad');

            $table->boolean('flexion_derecha_cad');
            $table->boolean('flexion_izquierda_cad');

            $table->boolean('extension_derecha_cad');
            $table->boolean('extension_izquierda_cad');

            $table->boolean('rexterna_derecha_cad');
            $table->boolean('rexterna_izquierda_cad');

            $table->boolean('rinterna_derecha_cad');
            $table->boolean('rinterna_izquierda_cad');

            $table->boolean('irradiacion_derecha_cad');
            $table->boolean('irradiacion_izquierda_cad');

            $table->boolean('alteracion_derecha_cad');
            $table->boolean('alteracion_izquierda_cad');

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
        Schema::dropIfExists('articulacion_caderas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulacionMunecasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulacion_munecas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('abduccion_derecha_m');
            $table->boolean('abduccion_izquierda_m');

            $table->boolean('adduccion_derecha_m');
            $table->boolean('adduccion_izquierda_m');

            $table->boolean('flexion_derecha_m');
            $table->boolean('flexion_izquierda_m');

            $table->boolean('extension_derecha_m');
            $table->boolean('extension_izquierda_m');

            $table->boolean('rexterna_derecha_m');
            $table->boolean('rexterna_izquierda_m');

            $table->boolean('rinterna_derecha_m');
            $table->boolean('rinterna_izquierda_m');

            $table->boolean('irradiacion_derecha_m');
            $table->boolean('irradiacion_izquierda_m');

            $table->boolean('alteracion_derecha_m');
            $table->boolean('alteracion_izquierda_m');

            $table->timestamps();

            $table->unsignedBigInteger('posiciones_forzada_id');
            $table->foreign('posiciones_forzada_id')->references('id')->on('posiciones_forzadas')->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulacion_munecas');
    }
}

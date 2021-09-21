<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulacionTobillosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulacion_tobillos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('abduccion_derecha_t');
            $table->boolean('abduccion_izquierda_t');

            $table->boolean('adduccion_derecha_t');
            $table->boolean('adduccion_izquierda_t');

            $table->boolean('flexion_derecha_t');
            $table->boolean('flexion_izquierda_t');

            $table->boolean('extension_derecha_t');
            $table->boolean('extension_izquierda_t');

            $table->boolean('rexterna_derecha_t');
            $table->boolean('rexterna_izquierda_t');

            $table->boolean('rinterna_derecha_t');
            $table->boolean('rinterna_izquierda_t');

            $table->boolean('irradiacion_derecha_t');
            $table->boolean('irradiacion_izquierda_t');

            $table->boolean('alteracion_derecha_t');
            $table->boolean('alteracion_izquierda_t');

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
        Schema::dropIfExists('articulacion_tobillos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulacionManoDedosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulacion_mano_dedos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('abduccion_derecha_md');
            $table->boolean('abduccion_izquierda_md');

            $table->boolean('adduccion_derecha_md');
            $table->boolean('adduccion_izquierda_md');

            $table->boolean('flexion_derecha_md');
            $table->boolean('flexion_izquierda_md');

            $table->boolean('extension_derecha_md');
            $table->boolean('extension_izquierda_md');

            $table->boolean('rexterna_derecha_md');
            $table->boolean('rexterna_izquierda_md');

            $table->boolean('rinterna_derecha_md');
            $table->boolean('rinterna_izquierda_md');

            $table->boolean('irradiacion_derecha_md');
            $table->boolean('irradiacion_izquierda_md');

            $table->boolean('alteracion_derecha_md');
            $table->boolean('alteracion_izquierda_md');

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
        Schema::dropIfExists('articulacion_mano_dedos');
    }
}

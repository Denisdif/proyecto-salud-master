<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulacionHombrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulacion_hombros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('abduccion_derecha_h');
            $table->boolean('abduccion_izquierda_h');

            $table->boolean('adduccion_derecha_h');
            $table->boolean('adduccion_izquierda_h');

            $table->boolean('flexion_derecha_h');
            $table->boolean('flexion_izquierda_h');

            $table->boolean('extension_derecha_h');
            $table->boolean('extension_izquierda_h');

            $table->boolean('rexterna_derecha_h');
            $table->boolean('rexterna_izquierda_h');

            $table->boolean('rinterna_derecha_h');
            $table->boolean('rinterna_izquierda_h');

            $table->boolean('irradiacion_derecha_h');
            $table->boolean('irradiacion_izquierda_h');

            $table->boolean('alteracion_derecha_h');
            $table->boolean('alteracion_izquierda_h');

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
        Schema::dropIfExists('articulacion_hombros');

    }
}

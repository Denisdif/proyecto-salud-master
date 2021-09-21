<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulacionCodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulacion_codos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('abduccion_derecha_c');
            $table->boolean('abduccion_izquierda_c');

            $table->boolean('adduccion_derecha_c');
            $table->boolean('adduccion_izquierda_c');

            $table->boolean('flexion_derecha_c');
            $table->boolean('flexion_izquierda_c');

            $table->boolean('extension_derecha_c');
            $table->boolean('extension_izquierda_c');

            $table->boolean('rexterna_derecha_c');
            $table->boolean('rexterna_izquierda_c');

            $table->boolean('rinterna_derecha_c');
            $table->boolean('rinterna_izquierda_c');

            $table->boolean('irradiacion_derecha_c');
            $table->boolean('irradiacion_izquierda_c');

            $table->boolean('alteracion_derecha_c');
            $table->boolean('alteracion_izquierda_c');

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
        Schema::dropIfExists('articulacion_codos');
    }
}

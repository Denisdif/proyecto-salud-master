<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedentePersonalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedente_personales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('fuma');
            $table->boolean('bebe');
            $table->boolean('actividad_fisica');

            $table->string('detalle1_p')->nullable();; // (antes observacion)
            $table->enum('especificacion1_p', ['observacion1_p', 'preexistencia1_p'])->nullable();

            $table->string('detalle2_p')->nullable();; // (antes observacion)
            $table->enum('especificacion2_p', ['observacion2_p', 'preexistencia2_p'])->nullable();

            $table->string('detalle3_p')->nullable();; // (antes observacion)
            $table->enum('especificacion3_p', ['observacion3_p', 'preexistencia3_p'])->nullable();

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
        Schema::dropIfExists('antecedente_personales');
    }
}

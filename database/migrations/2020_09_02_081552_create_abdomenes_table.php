<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbdomenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abdomenes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('pregunta1_ab')->nullable();
            $table->string('observacion1_ab')->nullable();

            $table->boolean('pregunta2_ab')->nullable();
            $table->string('observacion2_ab')->nullable();

            $table->boolean('pregunta3_ab')->nullable();
            $table->string('observacion3_ab')->nullable();

            $table->boolean('pregunta4_ab')->nullable();
            $table->string('observacion4_ab')->nullable();

            $table->boolean('pregunta5_ab')->nullable();
            $table->string('observacion5_ab')->nullable();

            $table->boolean('pregunta6_ab')->nullable();
            $table->string('observacion6_ab')->nullable();

            $table->timestamps();

            $table->string('observacion_ab')->nullable();

            $table->unsignedBigInteger('historia_clinica_id');
            $table->foreign('historia_clinica_id')->references('id')->on('historia_clinicas')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abdomenes');
    }
}

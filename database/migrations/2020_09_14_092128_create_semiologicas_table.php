<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemiologicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semiologicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('grado', ['opcion1_s', 'opcion2_s', 'opcion3_s', 'opcion4_s', 'opcion5_s']);
            $table->string('observacion1_s')->nullable();
            $table->unsignedBigInteger('posiciones_forzada_id');
            $table->foreign('posiciones_forzada_id')->references('id')->on('posiciones_forzadas')->onDelete('restrict');
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
        Schema::dropIfExists('semiologicas');
    }
}

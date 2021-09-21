<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoloresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dolores', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->enum('forma', ['opcion1_d', 'opcion2_d', 'opcion3_d']);
            $table->enum('evolucion', ['opcion4_d', 'opcion5_d', 'opcion6_d']);

            $table->string('observacion1_d')->nullable();
            $table->string('observacion2_d')->nullable();

            $table->boolean('pregunta1_d')->default(false);
            $table->boolean('pregunta2_d')->default(false);
            $table->boolean('pregunta3_d')->default(false);
            $table->boolean('pregunta4_d')->default(false);
            $table->boolean('pregunta5_d')->default(false);

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
        Schema::dropIfExists('dolores');
    }
}

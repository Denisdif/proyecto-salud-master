<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->enum('tiempo', ['opcion1', 'opcion2', 'opcion3']);
            $table->enum('ciclo', ['opcion4', 'opcion5', 'opcion6']);
            $table->enum('cargas', ['opcion7', 'opcion8', 'opcion9']);

            $table->boolean('pregunta1')->default(false);
            $table->boolean('pregunta2')->default(false);
            $table->boolean('pregunta3')->default(false);
            $table->boolean('pregunta4')->default(false);
            $table->boolean('pregunta5')->default(false);
            $table->boolean('pregunta6')->default(false);
            $table->boolean('pregunta7')->default(false);
            $table->boolean('pregunta8')->default(false);

            $table->string('observacion_tarea')->nullable();

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
        Schema::dropIfExists('tareas');
    }
}

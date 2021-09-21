<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedenteRecientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedente_recientes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('pregunta1_reciente'); //enfermedad de los ojos, oidos,  nariz o garganta
            $table->string('detalle1_reciente')->nullable();; // (antes observacion)
            $table->enum('especificacion1_reciente', ['observacion1_reciente', 'preexistencia1_reciente'])->nullable();


            $table->boolean('pregunta2_reciente'); //mareo, desmayo, convulsiones...
             $table->string('detalle2_reciente')->nullable();; // (antes observacion)
            $table->enum('especificacion2_reciente', ['observacion2_reciente', 'preexistencia2_reciente'])->nullable();

            $table->boolean('pregunta3_reciente'); //isnuficiencia respi...
             $table->string('detalle3_reciente')->nullable();; // (antes observacion)
            $table->enum('especificacion3_reciente', ['observacion3_reciente', 'preexistencia3_reciente'])->nullable();

            $table->boolean('pregunta4_reciente'); //dolor de pecho, palpi...
             $table->string('detalle4_reciente')->nullable();; // (antes observacion)
            $table->enum('especificacion4_reciente', ['observacion4_reciente', 'preexistencia4_reciente'])->nullable();

            $table->boolean('pregunta5_reciente'); //ictericia, hemorragia intestinal...
             $table->string('detalle5_reciente')->nullable();; // (antes observacion)
            $table->enum('especificacion5_reciente', ['observacion5_reciente', 'preexistencia5_reciente'])->nullable();

            $table->boolean('pregunta6_reciente'); //azucar, sangre o pus en la orina
             $table->string('detalle6_reciente')->nullable();; // (antes observacion)
            $table->enum('especificacion6_reciente', ['observacion6_reciente', 'preexistencia6_reciente'])->nullable();

            $table->boolean('pregunta7_reciente'); //diabetes
             $table->string('detalle7_reciente')->nullable();; // (antes observacion)
            $table->enum('especificacion7_reciente', ['observacion7_reciente', 'preexistencia7_reciente'])->nullable();

            $table->boolean('pregunta8_reciente'); //gota, afecciones musculares u oseas,etc
             $table->string('detalle8_reciente')->nullable();; // (antes observacion)
            $table->enum('especificacion8_reciente', ['observacion8_reciente', 'preexistencia8_reciente'])->nullable();

            $table->boolean('pregunta9_reciente'); //deformidades
             $table->string('detalle9_reciente')->nullable();; // (antes observacion)
            $table->enum('especificacion9_reciente', ['observacion9_reciente', 'preexistencia9_reciente'])->nullable();

            $table->boolean('pregunta10_reciente'); //enfermedades de la piel
             $table->string('detalle10_reciente')->nullable();; // (antes observacion)
            $table->enum('especificacion10_reciente', ['observacion10_reciente', 'preexistencia10_reciente'])->nullable();

            $table->boolean('pregunta11_reciente'); //alergias, anemias, etc
             $table->string('detalle11_reciente')->nullable();; // (antes observacion)
            $table->enum('especificacion11_reciente', ['observacion11_reciente', 'preexistencia11_reciente'])->nullable();

            $table->boolean('pregunta12_reciente'); //esta usted actualemnte bajo observacion...
             $table->string('detalle12_reciente')->nullable();; // (antes observacion)
            $table->enum('especificacion12_reciente', ['observacion12_reciente', 'preexistencia12_reciente'])->nullable();

            $table->boolean('pregunta13_reciente'); //cambio de peso en el ultimo año
             $table->string('detalle13_reciente')->nullable();; // (antes observacion)
            $table->enum('especificacion13_reciente', ['observacion13_reciente', 'preexistencia13_reciente'])->nullable();

            $table->boolean('pregunta14_reciente'); //hernia
             $table->string('detalle14_reciente')->nullable();; // (antes observacion)
            $table->enum('especificacion14_reciente', ['observacion14_reciente', 'preexistencia14_reciente'])->nullable();



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
        Schema::dropIfExists('antecedente_recientes');
    }
}

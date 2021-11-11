<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAptitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aptituds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->binary('firma')->nullable();
            $table->char('riesgos',10)->nullable();
            $table->boolean('preexistencias')->nullable();
            $table->string('aptitud_laboral')->nullable();
            $table->string('comentarios')->nullable();
            $table->string('pdf')->nullable();
            
            $table->unsignedBigInteger('voucher_id')->nullable();
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('restrict');

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
        Schema::dropIfExists('aptituds');
    }
}

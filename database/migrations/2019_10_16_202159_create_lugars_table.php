<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('estacionamiento_id');//automaticamente nos crea la relacion 
            $table->smallInteger('discapacitado')->default('0');//Flag para saber si el lugar es de discapacitado
            $table->smallInteger('disponible')->default('1');//Flag para saber si el lugar está disponible
            $table->timestamps();

            $table->foreign('estacionamiento_id')->references('id')->on('estacionamientos');//onDelete('cascade')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lugars');
    }
}

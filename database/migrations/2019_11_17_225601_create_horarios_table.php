<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('horario');
            $table->timestamps();
        });

        Schema::create('horario_lugar', function (Blueprint $table) {
            $table->unsignedBigInteger('horario_id');
            $table->unsignedBigInteger('lugar_id');

            $table->foreign('horario_id')
              ->references('id')
              ->on('horarios')
              ->onDelete('cascade');
            

            $table->foreign('lugar_id')
              ->references('id')
              ->on('lugars')
              ->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horario_lugar');
        Schema::dropIfExists('horarios');
        
    }
}

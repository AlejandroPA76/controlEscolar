<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_grupos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('estudiante_id')->unsigned();
            $table->bigInteger('ciclo_id')->unsigned();
            $table->bigInteger('grupo_id')->unsigned();
            $table->timestamps();

            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->foreign('ciclo_id')->references('id')->on('ciclo_escolars');
            $table->foreign('grupo_id')->references('id')->on('grupos');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista_grupos');
    }
}

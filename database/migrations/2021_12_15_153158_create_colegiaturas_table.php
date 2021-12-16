<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColegiaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colegiaturas', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('nivel_id')->unsigned();
            $table->bigInteger('grupo_id')->unsigned();
            $table->bigInteger('ciclo_id')->unsigned();
            $table->bigInteger('precio');

            $table->timestamps();
            $table->foreign('nivel_id')->references('id')->on('nivels');
            $table->foreign('grupo_id')->references('id')->on('grupos');
            $table->foreign('ciclo_id')->references('id')->on('ciclo_escolars');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colegiaturas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_tutor');
            $table->string('apellido_p_tutor');
            $table->string('apellido_m_tutor');
            $table->string('email')->nullable();
             $table->integer('id_tutor')->nullable();
            $table->string('num_operacion')->nullable();
             $table->string('motivo')->nullable();
            $table->string('status');
             $table->integer('cantidad_pagada');
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
        Schema::dropIfExists('pagos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observacions', function (Blueprint $table) {
            $table->id();
            $table->text('observacion');
            $table->string('estado')->nullable();
            $table->bigInteger('docente_id')->unsigned();
            $table->bigInteger('estudiante_id')->unsigned();
            $table->timestamps();

            $table->foreign('docente_id')->references('id')->on('docentes');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('observacions');
    }
}

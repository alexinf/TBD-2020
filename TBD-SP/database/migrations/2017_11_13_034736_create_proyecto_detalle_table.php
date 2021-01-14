<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_detalle', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('proyecto_id');
            $table->string('titulo_proyecto');
            $table->text('resumen_proyecto');

            $table->primary(['id', 'proyecto_id']);
            $table->foreign('proyecto_id')->references('id')->on('proyecto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto_detalle');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_proyecto_id');
            $table->integer('dependencia_academica_id');
            $table->integer('proyecto_status_id');
            $table->integer('area_academica_id');

            $table->foreign('tipo_proyecto_id')->references('id')->on('tipo_proyecto');
            $table->foreign('dependencia_academica_id')->references('id')->on('dependencia_academica');
            $table->foreign('proyecto_status_id')->references('id')->on('proyecto_status');
            $table->foreign('area_academica_id')->references('id')->on('area_academica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto');
    }
}

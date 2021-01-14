<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcion_rol', function (Blueprint $table) {
            $table->integer('funcion_id')->unsigned();
            $table->integer('rol_id')->unsigned();
            $table->boolean('activo');

            $table->primary(['funcion_id', 'rol_id']);

            $table->foreign('funcion_id')->references('id')->on('funcion');
            $table->foreign('rol_id')->references('id')->on('rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcion_rol');
    }
}

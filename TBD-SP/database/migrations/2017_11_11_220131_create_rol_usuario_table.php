<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_usuario', function (Blueprint $table) {
            //$table->increments('id');
            $table->integer('rol_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->boolean('activo');

            $table->primary(['rol_id', 'usuario_id']);

            $table->foreign('rol_id')->references('id')->on('rol');
            $table->foreign('usuario_id')->references('id')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol_usuario');
    }
}

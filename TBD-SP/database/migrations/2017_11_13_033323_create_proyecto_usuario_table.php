<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_usuario', function (Blueprint $table) {
            $table->integer('proyecto_id');
            $table->integer('usuario_id');
            $table->boolean('activo')->default(true);

            $table->primary(['proyecto_id', 'usuario_id']);

            $table->foreign('proyecto_id')->references('id')->on('proyecto');
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
        Schema::dropIfExists('proyecto_usuario');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionUiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcion_ui', function (Blueprint $table) {
            $table->integer('funcion_id')->unsigned();
            $table->integer('ui_id')->unsigned();
            $table->boolean('activo');

            $table->primary(['funcion_id', 'ui_id']);

            $table->foreign('funcion_id')->references('id')->on('funcion');
            $table->foreign('ui_id')->references('id')->on('ui');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcion_ui');
    }
}

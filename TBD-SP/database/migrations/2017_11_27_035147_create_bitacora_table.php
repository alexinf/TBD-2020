<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora', function (Blueprint $table) {
            $table->increments('id');
            $table->string('data_new', 200)->nullable();
            $table->string('data_old', 200)->nullable();
            $table->string('operacion', 20)->nullable();
            $table->string('on_table', 50)->nullable();
            $table->string('usuario', 20)->nullable();
            $table->timestamp('fecha')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora');
    }
}

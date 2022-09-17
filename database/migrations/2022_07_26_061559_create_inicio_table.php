<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inicio', function (Blueprint $table) {
            $table->id();
            $table->text('dias');
            $table->text('email');
            $table->text('horaInicio');
            $table->text('horaFin');
            $table->text('direccion');
            $table->text('telefono');
            $table->text('logo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inicio');
    }
}

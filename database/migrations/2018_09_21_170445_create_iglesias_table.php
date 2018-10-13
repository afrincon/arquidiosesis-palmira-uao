<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIglesiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iglesias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('direccion', 100);
            $table->string('telefono', 10);
            $table->integer('user')->unsigned();
            $table->string('arquidiocesis',100);
            $table->enum('estado', array('Activo', 'Inactivo'));
            $table->timestamps();

            $table->foreign('user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iglesias');
    }
}

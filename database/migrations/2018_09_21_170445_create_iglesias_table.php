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
            $table->integer('id_user')->unsigned();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
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

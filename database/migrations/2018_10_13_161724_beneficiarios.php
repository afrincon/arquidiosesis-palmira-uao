<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Beneficiarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->increments('id_beneficiario');
            $table->string('documento',15)->unique();
            $table->integer('id_tipo_documento')->unsigned();
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->enum('estado', array('Activo', 'Inactivo'));
            $table->string('direccion',50);
            $table->string('telefono',10);
            $table->string('clasificacion',20);
            $table->timestamps();

            $table->foreign('id_tipo_documento')->references('id')->on('tipo_documento');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiario');
    }
}

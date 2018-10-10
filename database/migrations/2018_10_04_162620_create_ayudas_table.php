<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAyudasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayudas', function (Blueprint $table) {
            $table->increments('id_ayuda');
            $table->date('fecha_ayuda');
            
            $table->integer('id_tipoayuda')->unsigned();
            #$table->foreign('id_tipoayuda')->references('id_tipoayuda')->an('ayudas');

            $table->integer('id_beneficiario')->unsigned();
            #$table->foreign('id_beneficiario')->references('id_beneficiario')->an('beneficiarios');

            $table->integer('id_iglesia')->unsigned();
            $table->foreign('id_iglesia')->references('id')->on('iglesias');
            
            $table->string('observaciones');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ayudas');
    }
}

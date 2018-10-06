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
            
            $table->numeric('id_tipoayuda', 10);
            $table->foreign('id_tipoayuda')->references('id_tipoayuda')->an('ayudas');

            $table->numeric('id_beneficiario', 10);
            $table->foreign('id_beneficiario')->references('id_beneficiario')->an('beneficiarios');

            $table->numeric('id_iglesia', 10);
            $table->foreign('id_iglesia')->references('id_iglesia')->an('iglesias');

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

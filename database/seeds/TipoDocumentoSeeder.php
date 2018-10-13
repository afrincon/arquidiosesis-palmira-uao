<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_documento')->insert([
            'descripcion' => 'Cedúla',
        ]);

        DB::table('tipo_documento')->insert([
            'descripcion' => 'Tarjeta de identidad',
        ]);
        DB::table('tipo_documento')->insert([
            'descripcion' => 'Pasaporte',
        ]);

        DB::table('tipo_documento')->insert([
            'descripcion' => 'Cedúla de extrajeria',
        ]);



        

    }
}

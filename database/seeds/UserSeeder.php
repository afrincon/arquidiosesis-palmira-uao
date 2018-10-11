<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Andrés Felipe Rincón',
            'email' => 'andres_felipe.rincon@uao.edu.co',
            'password' => bcrypt('Autonoma18'),
        ]);

        DB::table('users')->insert([
            'name' => 'Pepito Perez',
            'email' => 'pepito.perez@uao.edu.co',
            'password' => bcrypt('Autonoma18'),
        ]);
    }
}

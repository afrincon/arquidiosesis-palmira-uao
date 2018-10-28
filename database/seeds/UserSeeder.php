<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;

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
        $role_user = Role::where('nombre', 'usuario')->first();
        $role_admin = Role::where('nombre', 'admin')->first();

        $user = new User();
        $user->name = 'Andrés Felipe Rincón';
        $user->telefono = "8893959";
        $user->email = 'andres_felipe.rincon@uao.edu.co';
        $user->password = bcrypt('Autonoma18');
        $user->fecha_nacimiento = '1999-10-15';
        $user->fecha_ingreso = '2009-12-14';
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Pepito Perez';
        $user->telefono = "8893959";
        $user->email = 'pepito.perez@uao.edu.co';
        $user->password = bcrypt('Autonoma18');
        $user->fecha_nacimiento = '1999-10-15';
        $user->fecha_ingreso = '2009-12-14';
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Mauricio Medrano';
        $user->telefono = "4026754";
        $user->email = 'ramit.medrano@uao.edu.co';
        $user->password = bcrypt('Holamundo123');
        $user->fecha_nacimiento = '1994-10-01';
        $user->fecha_ingreso = '2010-01-01';
        $user->save();
        $user->roles()->attach($role_admin);
    }
}

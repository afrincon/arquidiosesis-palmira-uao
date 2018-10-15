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
        $user->email = 'andres_felipe.rincon@uao.edu.co';
        $user->password = bcrypt('Autonoma18');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Pepito Perez';
        $user->email = 'pepito.perez@uao.edu.co';
        $user->password = bcrypt('Autonoma18');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}

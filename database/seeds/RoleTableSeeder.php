<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrador';
        $role->save();

        $role = new Role();
        $role->name = 'user';
        $role->description = 'Parroco';
        $role->save();
    }
}

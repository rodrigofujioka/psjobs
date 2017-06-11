<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->nome = 'usuario';
        $role_employee->save();

        $role_manager = new Role();
        $role_manager->nome = 'admin';
        $role_manager->save();
    }
}

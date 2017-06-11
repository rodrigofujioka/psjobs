<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('nome', 'usuario')->first();
        $role_admin = Role::where('nome', 'admin')->first();

        $employee = new User();
        $employee->name = 'Jose da Silva';
        $employee->email = 'user@user.com';
        $employee->password = bcrypt('secret');
        $employee->save();
        $employee->roles()->attach($role_user);

        $manager = new User();
        $manager->name = 'Administrador Sistema';
        $manager->email = 'admin@admin.com';
        $manager->password = bcrypt('secret');
        $manager->save();
        $manager->roles()->attach($role_admin);
    }
}

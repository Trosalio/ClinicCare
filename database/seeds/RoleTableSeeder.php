<?php

use Illuminate\Database\Seeder;
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
        // create a role for admin;
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->save();

        // create a role for client;
        $role_client = new Role();
        $role_client->name = 'client';
        $role_client->save();

        // create a role for doctor;
        $role_doctor = new Role();
        $role_doctor->name = 'doctor';
        $role_doctor->save();
    }
}

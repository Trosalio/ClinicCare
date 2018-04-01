<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_client = Role::where('name', 'client')->first();
        $role_doctor = Role::where('name', 'doctor')->first();

        // create admin
        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@sample.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        // create client
        $client = new User();
        $client->name = 'client';
        $client->email = 'client@sample.com';
        $client->password = bcrypt('client');
        $client->save();
        $client->roles()->attach($role_client);

        // create doctor
        $doctor = new User();
        $doctor->name = 'doctor';
        $doctor->email = 'doctor@sample.com';
        $doctor->password = bcrypt('doctor');
        $doctor->save();
        $doctor->roles()->attach($role_doctor);
    }
}

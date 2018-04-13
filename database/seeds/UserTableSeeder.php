<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Doctor;

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
        $user_admin = new User();
        $user_admin->username = 'admin';
        $user_admin->email = 'admin@sample.com';
        $user_admin->password = bcrypt('admin');
        if($user_admin->save()){
            $user_admin->roles()->attach($role_admin);
        };
        $admin = new Admin();
        $admin->user()->associate($user_admin);
        $admin->save();

        // create client
        $user_client = new User();
        $user_client->username = 'client';
        $user_client->email = 'client@sample.com';
        $user_client->password = bcrypt('client');
        if($user_client->save()){
            $user_client->roles()->attach($role_client);
        };
        $client = new Client();
        $client->user()->associate($user_client);
        $client->save();

        // create doctor
        $user_doctor = new User();
        $user_doctor->username = 'doctor';
        $user_doctor->email = 'doctor@sample.com';
        $user_doctor->password = bcrypt('doctor');
        if($user_doctor->save()){
        $user_doctor->roles()->attach($role_doctor);
        $user_doctor->roles()->attach($role_client);
        };

        // doctor is a doctor!
        $doctor = new Doctor();
        $doctor->user()->associate($user_doctor);
        $doctor->save();

        // but also is a client!
        $c_doctor = new Client();
        $c_doctor->user()->associate($user_doctor);
        $c_doctor->save();
    }
}

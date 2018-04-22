<?php

use Illuminate\Database\Seeder;
use App\User;
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
        // create admin
        $user_admin = new User();
        $user_admin->username = 'admin';
        $user_admin->email = 'admin@sample.com';
        $user_admin->password = bcrypt('admin');
        $user_admin->role = 'admin';
        $user_admin->save();

        // create client
        $user_client = new User();
        $user_client->username = 'client';
        $user_client->email = 'client@sample.com';
        $user_client->password = bcrypt('client');
        $user_client->role = 'client';
        if($user_client->save()){
            $client = new Client();
            $client->user()->associate($user_client);
            $client->save();
        }

        // create doctor
        $user_doctor = new User();
        $user_doctor->username = 'doctor';
        $user_doctor->email = 'doctor@sample.com';
        $user_doctor->password = bcrypt('doctor');
        $user_doctor->role = 'doctor';
        if($user_doctor->save()){
            // doctor is a doctor!
            $doctor = new Doctor();
            $doctor->user()->associate($user_doctor);
            $doctor->save();
            // but also is a client!
            $c_doctor = new Client();
            $c_doctor->user()->associate($user_doctor);
            $c_doctor->save();
        }

        factory(User::class, 30)->create()->each(function ($user) {
            if($user->save()){
                $client = new Client();
                $client->user()->associate($user);
                $client->save();
                if($user->role === 'doctor'){
                    $doctor = new Doctor();
                    $doctor->user()->associate($user);
                    $doctor->save();
                }
            }
        });
    }
}

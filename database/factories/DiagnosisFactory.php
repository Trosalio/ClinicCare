<?php

use Faker\Generator as Faker;

$factory->define(App\Diagnosis::class, function (Faker $faker) {
    $doctor_ids = App\Models\Doctor::all()->pluck('id')->toArray();
    $client_ids = App\Models\Client::all()->pluck('id')->toArray();
    return [
    
        'doctor_id' => $faker->randomElement($doctor_ids),
        'client_id' => $faker->randomElement($client_ids),
        'opinion' => $faker->realText()
    ];
});

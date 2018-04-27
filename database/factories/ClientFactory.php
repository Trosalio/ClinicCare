<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Client::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'id_no' => $faker->numerify('#############'),
        'tel_no' => $faker->numerify('##########'),
        'gender' => $faker->randomElement(['m', 'f']),
        'weight' => $faker->numberBetween(50,150),
        'height' => $faker->numberBetween(100,180),
        'blood_type' => $faker->randomElement(['A+','A-','B+','B-','O+','O-','AB+','AB-']),
        'intolerances' => $faker->optional()->realText(50),
        'health_conditions' => $faker->optional()->realText(50),
    ];
});

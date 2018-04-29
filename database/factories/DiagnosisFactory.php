<?php

use Faker\Generator as Faker;

$factory->define(App\Diagnosis::class, function (Faker $faker) {
    return [
        'opinion' => $faker->realText(),
        'medicine' => $faker->realText()
    ];
});

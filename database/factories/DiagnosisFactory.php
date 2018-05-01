<?php

use Faker\Generator as Faker;

$factory->define(App\Diagnosis::class, function (Faker $faker) {
    return [
        'opinion' => $faker->randomElement(['Probably paranoid', 'Probably cancer', 'Probably just an imagination', 'Probably fine']),
        'medicine' => $faker->randomElement(['No cure, just escape', 'Take two cough drop pills and call me in the morning', 'Take aspirin two times a day', 'Take two placebos a day'])
    ];
});

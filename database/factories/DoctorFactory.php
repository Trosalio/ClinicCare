<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Doctor::class, function (Faker $faker) {
    $work_day = $faker->boolean;
    $weekday = null;
    if ($work_day) {
        $weekday = json_encode(['1', '2', '3', '4', '5']);
    }
    return [
        'medical_license_no' => $faker->numerify('##########'),
        'work_day' => $work_day,
        'weekday' => $weekday,
        'start_hour' => $faker->numberBetween(9, 11),
        'end_hour' => $faker->numberBetween(13, 17)
    ];
});

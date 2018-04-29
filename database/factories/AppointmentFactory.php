<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Appointment::class, function (Faker $faker) {
    $clients = App\Models\Client::pluck('id')->all();
    $doctors = App\Models\Doctor::pluck('id')->all();
    $random_date = $starts_at = Carbon::createFromTimestamp($faker->dateTimeBetween($startDate = '+2 days', $endDate = '+1 week')->getTimeStamp())->setTime(9, 0, 0);
    $start_at = Carbon::createFromFormat('Y-m-d H:i:s', $random_date)->addHours($faker->numberBetween(1, 8))->addMinutes($faker->randomElement([0, 30]));
    return [
        'name' => $faker->realText(50),
        'description' => $faker->realText(200),
        'start_date' => $start_at,
        'end_date' => Carbon::createFromFormat('Y-m-d H:i:s', $start_at)->addHours($faker->numberBetween(1, 8)),
        'status' => $faker->numberBetween(0, 2),
        'client_id' => $faker->randomElement($clients),
        'doctor_id' => $faker->randomElement($doctors),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Flights\Flight::class, function (Faker $faker) {
  return [
    'flight_datetime' => now()->addDays($faker->randomNumber(2))->toDateTimeString(),
    'duration' => $faker->randomNumber(3),
    'description' => $faker->text(500),
  ];
});

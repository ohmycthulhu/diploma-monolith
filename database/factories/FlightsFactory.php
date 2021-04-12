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

$factory->define(\App\Models\Flights\TicketType::class, function (Faker $faker) {
  return [
    'seats' => $faker->randomNumber(2),
    'price' => $faker->randomFloat(3, 1, 250),
    'name' => $faker->words(3, true),
  ];
});

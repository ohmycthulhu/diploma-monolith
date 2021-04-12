<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Airport\Employee::class, function (Faker $faker) {
  return [
    'name' => $faker->name,
    'email' => $faker->companyEmail,
    'password' => \Illuminate\Support\Facades\Hash::make('p@22w0rd'),
  ];
});

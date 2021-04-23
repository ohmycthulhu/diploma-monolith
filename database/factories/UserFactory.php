<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Web\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
      'phone' => $faker->phoneNumber,
      'email' => $faker->email,
      'password' => \Illuminate\Support\Facades\Hash::make('password'),
    ];
});

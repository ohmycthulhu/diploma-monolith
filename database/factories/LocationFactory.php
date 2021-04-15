<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Location\City::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
    ];
});

$factory->define(\App\Models\Location\Airport::class, function (Faker $faker) {
  do {
    $code = join('', array_map(function () use ($faker) {
      return $faker->randomAscii;
    }, [1, 2, 3]));
  } while (\App\Models\Location\Airport::query()->where('code', $code)->first());
  return [
    'name' => $faker->words($faker->numberBetween(1, 3), true),
    'code' => $code,
  ];
});

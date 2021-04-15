<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
  protected $path;

  public function __construct()
  {
    $this->path = storage_path("data/countries.json");
  }

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $countries = json_decode(\Illuminate\Support\Facades\File::get($this->path), true);

    foreach ($countries as $countryData) {
      $country = \App\Models\Location\Country::create($countryData);
      $country->cities()
        ->createMany(
          factory(\App\Models\Location\City::class, 5)
            ->make()
            ->toArray()
        )
        ->each(function ($city) {
          $city->airports()
            ->createMany(
              factory(\App\Models\Location\Airport::class, rand(3, 5))
                ->make()
                ->toArray()
            );
        });
    }
  }
}

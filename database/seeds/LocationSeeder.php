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
      $citiesData = $countryData['cities'];
      unset($countryData['cities']);
      $country = \App\Models\Location\Country::create($countryData);
      foreach ($citiesData as $cityInfo) {
        $airportsInfo = $cityInfo['airports'];
        unset($cityInfo['airports']);
        $city = $country->cities()->create($cityInfo);

        foreach ($airportsInfo as $airportInfo) {
          $city->airports()->create($airportInfo);
        }
      }
    }
  }
}

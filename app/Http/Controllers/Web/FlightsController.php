<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Flights\Flight;
use App\Http\Requests\Web\FlightSearchRequest;
use App\Models\Location\City;
use App\Models\Location\Country;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FlightsController extends Controller
{
  /* @var Flight $flight */
    protected $flight;

    public function __construct(Flight $flight)
    {
      $this->flight = $flight;
    }

    /**
     * Route for searching flights
     *
     * @param FlightSearchRequest $request
     *
     * @return View|JsonResponse
    */
    public function search(FlightSearchRequest $request) {
      $query = $this->flight::query()
        ->with(['ticketTypes', 'airportDepart', 'airportArrival'])
        ->publiclyAvailable();

      $pageSize = min($request->input('pageSize', 15), 50);

      $params = $request->validated();

      // Set departure information
      $this->scopeLocation(
        $query,
        'departure',
        null,
        $params['city_from'] ?? null,
        $params['airport_from'] ?? null
      );

      // Set arrival information
      $this->scopeLocation(
        $query,
        'arrival',
        $params['country'] ?? null,
        $params['city_to'] ?? null,
        $params['airport_tp'] ?? null
      );
      $priceFrom = $params['price_from'] ?? null;
      $priceTo = $params['price_to'] ?? null;
      if ($priceFrom || $priceTo) {
        $query->whereHas('ticketTypes', function ($q) use ($priceFrom, $priceTo) {
          if ($priceFrom) {
            $q->where("price", '>=', $priceFrom);
          }
          if ($priceTo) {
            $q->where('price', '<=', $priceTo);
          }
          return $q;
        });
      }

      if ($date = $params['depart_date'] ?? null) {
        $query->whereRaw("DATE(flight_datetime) = '$date'");
      }

      $flights = $query->paginate($pageSize);
      return response()->json([
        'flights' => $flights
      ]);
    }

    /**
     * Configure location
     *
     * @param Builder $builder
     * @param string $scope
     * @param ?Country $country
     * @param ?int $cityId
     * @param ?int $airportId
     *
     * @return Builder
    */
    public function scopeLocation(
          Builder $builder,
          string $scope,
          ?Country $country,
          ?int $cityId,
          ?int $airportId
    ): Builder {
      if ($airportId) {
        $builder->{$scope}($airportId);
      } elseif ($cityId) {
        $city = City::find($cityId)->load('airports');
        if ($city) {
          $builder->{$scope}($city->airports->pluck('id')->toArray());
        }
      } elseif ($country) {
        $country = Country::where('slug', $country)->with('airports')->first();
        if ($country) {
          $builder->{$scope}($country->airports->pluck('id')->toArray());
        }
      }
      return $builder;
    }


}

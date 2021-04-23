<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Flights\Flight;
use App\Http\Requests\Web\FlightSearchRequest;
use App\Models\Flights\FlightTicketType;
use App\Models\Flights\TicketType;
use App\Models\Location\Airport;
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

      $cityFrom = $params['city_from'] ?? null;
      $cityTo = $params['city_to'] ?? null;
      $airportFrom = $params['airport_from'] ?? null;
      $airportTo = $params['airport_to'] ?? null;

      $cityFromName = $cityFrom ? City::find($cityFrom)->name : null;
      $cityToName = $cityTo ? City::find($cityTo)->name : null;
      $airportFromName = $airportFrom ? Airport::find($airportFrom)->name : null;
      $airportToName = $airportTo ? Airport::find($airportTo)->name : null;

      // Set departure information
      $this->scopeLocation(
        $query,
        'departure',
        null,
        $cityFrom,
        $airportFrom
      );

      // Set arrival information
      $this->scopeLocation(
        $query,
        'arrival',
        $params['country'] ?? null,
        $cityTo,
        $airportTo
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

      $allTicketTypes = FlightTicketType::query()
        ->whereIn('flight_id', $query->pluck('id'))->pluck('price');
      $prices = [
        'min' => $allTicketTypes->min(),
        'max' => $allTicketTypes->max(),
      ];

      $ticketTypes = TicketType::all();

      $flights = $query->paginate($pageSize);
      return view('flights.search', compact('flights',
        'cityFrom', 'cityFromName', 'cityTo', 'cityToName',
        'airportFrom', 'airportFromName', 'airportTo', 'airportToName',
        'date', 'priceFrom', 'priceTo', 'ticketTypes', 'prices'));
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

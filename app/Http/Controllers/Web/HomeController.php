<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Flights\Flight;
use App\Models\Location\Country;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
  protected $country;
  protected $flight;

  public function __construct(Country $country, Flight $flight)
  {
    $this->country = $country;
    $this->flight = $flight;
  }

  /**
     * Route to home page
     *
     * @return View
    */
    public function home(): View {
      $countries = $this->country::query()
        ->inRandomOrder()
        ->get();
      $flights = $this->flight::query()
        ->with(['airportArrival.country', 'ticketTypes'])
        ->publiclyAvailable()
        ->groupByDestination()
        ->inRandomOrder()
        ->limit(16)
        ->get();
      return view('home', compact('countries', 'flights'));
    }
}

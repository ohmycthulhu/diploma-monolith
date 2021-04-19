<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Flights\Flight;
use App\Http\Requests\Web\FlightSearchRequest;
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
     * @return View
    */
    public function search(FlightSearchRequest $request): View {

      return view('flights.search');
    }
}

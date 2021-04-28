<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Models\Flights\Flight;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FlightsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:airport,crm.login');
  }

  /**
     * Method to get the page of flight
     *
     * @param int $id
     *
     * @return View|RedirectResponse
    */
    public function getFlightPage(int $id) {
      $flight = Flight::query()
        ->with(['airportDepart.city', 'airportArrival.city', 'ticketTypes.ticketType', 'bookings'])
        ->approveStatus(1)
        ->where('id', $id)
        ->first();

      if ($flight) {
        return view('crm.flight', compact('flight'));
      } else {
        return redirect()->back();
      }
    }

    /**
     * Function to set next status
     *
     * @param int $id
     *
     * @return RedirectResponse
    */
    public function nextStatus(int $id): RedirectResponse {
      /* @var ?Flight $flight */
      $flight = Flight::query()
        ->approveStatus(1)
        ->where('id', $id)
        ->first();

      if ($flight) {
        $flight->setFlightStatus(Auth::user(), $flight->flight_status + 1);
      }

      return redirect()->back();
    }
}

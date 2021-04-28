<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Models\Flights\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:airport,crm.login');
    }

    public function index(Request $request) {
      $query = Flight::query()
        ->with(['airportDepart.city', 'airportArrival.city', 'ticketTypes'])
        ->approveStatus(1)
        ->orderBy('flight_datetime', 'desc');
      $dateRaw = $request->input('date');
      if ($dateRaw) {
        try {
          $date = Carbon::parse($dateRaw);
          $query->where('flight_datetime', 'LIKE', "{$date->toDateString()}%");
        } catch (\Exception $exception) {

        }
      }
      $flights = $query->paginate(10);
      return view('crm.home', compact('flights', 'dateRaw'));
    }
}

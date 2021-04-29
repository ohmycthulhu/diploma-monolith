<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Models\Flights\Booking;
use App\Models\Flights\Flight;
use App\Models\Location\City;
use App\Models\Location\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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

    /**
     * Method for new book page
     *
     * @param int $id
     *
     * @return View|RedirectResponse
    */
    public function getBookingPage(int $id) {
      /* @var ?Flight $flight */
      $flight = Flight::query()
        ->with(['ticketTypes.ticketType'])
        ->approveStatus(1)
        ->flightStatus(0)
        ->where('id', $id)
        ->first();

      if (!$flight) {
        return redirect(route('crm.home'));
      }

      $countries = Country::query()->with('cities')->get();

      return view('crm.book', compact('flight', 'countries'));
    }

    public function createBooking(Request $request, int $id) {
      /* @var ?Flight $flight */
      $flight = Flight::query()
        ->approveStatus(1)
        ->flightStatus(0)
        ->where('id', $id)
        ->first();

      if (!$flight) {
        return redirect(route('crm.home'));
      }

      $employee = Auth::user();

      $fullName = "{$request->input('firstName')} {$request->input('lastName')}";
      $passportUuid = $request->input('passportUuid');
      $phone = $request->input('phone');
      $email = $request->input('email');

      $ticketType = $flight->ticketTypes()->find($request->input('ticketTypeId'));
      $city = City::find($request->input('cityId'));

      $booking = $flight->bookings()
        ->create([
          'employee_id' => $employee->id,
          'name' => $fullName,
          'uuid' => Str::uuid(),
          'passport_uuid' => $passportUuid,
          'phone' => $phone,
          'email' => $email,
          'is_approved' => null,
          'price' => $ticketType->price,
          'city_id' => $city->id,
          'country_id' => $city->country_id,
        ]);

      $booking->seats()
        ->create([
          'flight_id' => $flight->id,
          'seat' => 1,
          'flight_ticket_type_id' => $ticketType->id,
          'name' => $fullName,
        ]);

      return redirect(route('crm.flights.id', ['id' => $flight->id]));
    }

    public function getPaymentPage(int $id) {
      $book = Booking::query()
        ->where('id', $id)
        ->with('flight')
        ->first();

      if (!$book) {
        return redirect('crm.home');
      }

      if ($book->is_approved || $book->flight->flight_status >= 2) {
        return redirect(route('crm.flights.id', ['id' => $book->flight_id]));
      }

      return view('crm.payment', compact('book'));
    }

    public function createPayment(Request $request, int $id) {
      $book = Booking::query()
        ->where('id', $id)
        ->with('flight')
        ->first();

      if (!$book) {
        return redirect('crm.home');
      }

      if ($book->is_approved || $book->flight->flight_status >= 2) {
        return redirect(route('crm.flights.id', ['id' => $book->flight_id]));
      }

      $isCache = $request->input('isCache', 'false') == 'true';

      $book->payments()
        ->create([
          'amount' => $book->price,
          'in_progress' => false,
          'uuid' => Str::uuid(),
          'is_cache' => $isCache,
          'is_card' => !$isCache,
          'payment_uuid' => Str::uuid(),
          'employee_id' => Auth::id(),
        ]);

      $book->is_approved = true;
      $book->save();

      return redirect(route('crm.flights.id', ['id' => $book->flight_id]));
    }
}

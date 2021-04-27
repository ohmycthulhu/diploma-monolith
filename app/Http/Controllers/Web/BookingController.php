<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\EnterPaymentDetailsRequest;
use App\Http\Requests\Web\InputPersonalDataRequest;
use App\Models\Flights\Booking;
use App\Models\Flights\Flight;
use App\Models\Location\City;
use App\Models\Location\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BookingController extends Controller
{
    protected $flight;

    public function __construct(Flight $flight)
    {
      $this->flight = $flight;
    }

    public function getPage(Request $request, Flight $flight) {
      $countries = Country::query()
        ->with('cities')
        ->get();

      $flight->load(['airportDepart.city', 'airportArrival.city', 'ticketTypes.ticketType']);

      $session = $request->session();
      $savedData = $session->get("order.{$flight->id}", []);
      $selectedCity = $savedData['city_id'] ?? $flight->airportDepart->city->id;
      $ticketTypes = $flight->ticketTypes;
      $user = Auth::user();

      return view('flights.book_personal',
        compact('countries', 'flight', 'selectedCity', 'ticketTypes', 'savedData', 'user')
      );
    }

    public function inputPersonalData(InputPersonalDataRequest $request, Flight $flight) {
      $session = $request->session();

      $session->put("order.{$flight->id}", $request->validated());

      return response()->redirectTo(route('flights.book.payment', compact('flight')));
    }

    public function getPaymentPage(Request $request, Flight $flight) {
      $savedData = $request->session()->get("order.{$flight->id}");
      $ticketType = $flight->ticketTypes()
        ->where('id', $savedData['ticket_type_id'] ?? null)
        ->first();
      if (!$ticketType) {
        return redirect()->route('flights.book.personal', compact('flight'));
      }
      return view('flights.book_payment', compact('flight', 'ticketType'));
    }

    public function inputPaymentData(EnterPaymentDetailsRequest $request, Flight $flight) {
      // Create booking and mark as unpaid
      $savedData = $request->session()->get("order.{$flight->id}");
      $user = Auth::user();
      $ticketType = $flight->ticketTypes()->find($savedData['ticket_type_id']);
      $fullName = "{$savedData['firstName']} {$savedData['lastName']}";
      $city = City::find($savedData['city_id']);
      $booking = $flight->bookings()
        ->create([
          'user_id' => $user ? $user->id : null,
          'name' => $fullName,
          'uuid' => Str::uuid(),
          'passport_uuid' => $savedData['passport_uuid'],
          'phone' => $savedData['phone'],
          'email' => $savedData['email'],
          'is_approved' => null,
          'price' => $ticketType->price,
          'city_id' => $city->id,
          'country_id' => $city->country_id,
        ]);

      // Create booking seat
      $seat = $booking->seats()
        ->create([
          'flight_id' => $flight->id,
          'seat' => 1,
          'flight_ticket_type_id' => $ticketType->id,
          'name' => $fullName,
        ]);

      //
      $request->session()
        ->put("awaiting_order", ['flightId' => $flight->id, 'bookingId' => $booking->id]);
      return redirect(route('flights.book.confirmation', ['flight' => $flight->id]));
    }

    public function getConfirmPage(Request $request, Flight $flight) {
      $orderInfo = $request->session()->get('awaiting_order');
      $flightId = $orderInfo['flightId'] ?? null;
      $bookingId = $orderInfo['bookingId'] ?? null;
      if (!$flightId || !$bookingId) {
        return redirect()->route('flights.book', compact('flight'));
      }

      $flight = Flight::find($flightId);
      $booking = $flight->bookings()
        ->find($flight->id)
        ->load('city', 'country');
      $ticketType = $flight->ticketTypes()
        ->find($request->session()->get("order.{$flight->id}.ticket_type_id"))
        ->load('ticketType');

      $confirmable = $booking->payments()->count() <= 0;

      return view(
        'flights.book_details',
        compact('flight', 'booking', 'ticketType', 'confirmable')
      );
    }

    public function confirmOrder(Request $request, Flight $flight) {
      $orderInfo = $request->session()->get('awaiting_order');
      $flightId = $orderInfo['flightId'] ?? null;
      $bookingId = $orderInfo['bookingId'] ?? null;
      if (!$flightId || !$bookingId) {
        return redirect()->route('flights.book', compact('flight'));
      }

      $booking = Booking::query()->find($bookingId);

      $booking->payments()
      ->create([
        'amount' => $booking->price,
        'in_progress' => false,
        'uuid' => Str::uuid(),
        'is_card' => true,
        'payment_uuid' => Str::uuid(),
        'user_id' => Auth::id(),
      ]);

      return redirect(route('books.details', ['uuid' => $booking->uuid]));
    }

    public function rejectOrder(Request $request, Flight $flight) {
      $orderInfo = $request->session()->get('awaiting_order');
      $flightId = $orderInfo['flightId'] ?? null;
      $bookingId = $orderInfo['bookingId'] ?? null;
      if (!$flightId || !$bookingId) {
        return redirect()->route('flights.book', compact('flight'));
      }

      $booking = Booking::find($bookingId);
      $booking->seats()->delete();
      $booking->delete();

      return redirect(route('home'));
    }

    public function getBookingDetails(string $uuid) {
      $booking = Booking::where('uuid', $uuid)
        ->with('seats.ticketType', 'flight.ticketTypes')
        ->withCount('payments')
        ->first();

      if (!$booking) {
        return redirect(route('home'));
      }

      $flight = $booking->flight;
      $ticketTypeId = $booking->seats[0]->ticketType;
      $ticketType = $flight->ticketTypes
        ->filter(function ($t) use ($ticketTypeId) { return $t->ticket_type_id == $ticketTypeId; })
        ->first();
      $confirmable = $booking->payments_count <= 0;

      return view('flights.book_details',
        compact('booking', 'flight', 'ticketType', 'confirmable')
      );
    }

    public function getBooks(): View {
      $user = Auth::user();
      $bookings = $user->bookings()
        ->with('flight')
        ->orderByDesc('created_at')
        ->get();

      return view('user_books', compact('user', 'bookings'));
    }
}

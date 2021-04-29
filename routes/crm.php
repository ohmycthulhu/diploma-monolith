<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (config('app.debug')) {
  Route::get('/login/{id}', function (int $id) {
    \Illuminate\Support\Facades\Auth::guard('airport')->loginUsingId($id);
    return redirect()->back();
  });
}

Route::get('/', 'CRM\\HomeController@index')
  ->name('home');

Route::get('/login', 'CRM\\LoginController@getPage')
  ->name('login');
Route::post('/login', 'CRM\\LoginController@login')
  ->name('login');
Route::get('/logout', 'CRM\\LoginController@logout')
  ->name('logout');

Route::get('/flights/{id}', 'CRM\\FlightsController@getFlightPage')
  ->name('flights.id');

Route::post('/flights/{id}/statuses', 'CRM\\FlightsController@nextStatus')
  ->name('flights.nextStatus');

// Bookings control
Route::get('/flights/{id}/bookings', 'CRM\\FlightsController@getBookingPage')
  ->name('flights.bookings');
Route::post('/flights/{id}/bookings', 'CRM\\FlightsController@createBooking')
  ->name('flights.bookings.add');
Route::get('/books/{id}/payments', 'CRM\\FlightsController@getPaymentPage')
  ->name('books.payments');
Route::post('/books/{id}/payments', 'CRM\\FlightsController@createPayment')
  ->name('books.payments.create');
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

Route::get('/', 'Web\\HomeController@home')
  ->name('home');

Route::post('/login', 'Web\\UserController@login')
  ->name('login');

Route::post('/register', 'Web\\UserController@register')
  ->name('registration');


Route::match(['get', 'post'], '/logout', 'Web\\UserController@logout')
  ->name('logout');

Route::get('/user', function () {
  return response()->json(['user' => \Illuminate\Support\Facades\Auth::user()]);
});

Route::get('/search', 'Web\\FlightsController@search')->name('search');
Route::get('/flights/{flight}/book/personal', 'Web\\BookingController@getPage')
  ->name('flights.book');
Route::post('/flights/{flight}/book/personal', 'Web\\BookingController@inputPersonalData')
  ->name('flights.book.personal');
Route::get('/flights/{flight}/book/payment', 'Web\\BookingController@getPaymentPage')
  ->name('flights.book.payment');
Route::post('/flights/{flight}/book/payment', 'Web\\BookingController@inputPaymentData')
  ->name('flights.book.payment');
Route::get("/flights/{flight}/book/confirmation", 'Web\\BookingController@getConfirmPage')
  ->name('flights.book.confirmation');
Route::post('/flights/{flight}/book/confirm', 'Web\\BookingController@confirmOrder')
  ->name('flights.book.confirm');
Route::post('/flights/{flight}/book/reject', 'Web\\BookingController@rejectOrder')
  ->name('flights.book.reject');

Route::get('/bookings/{uuid}', 'Web\\BookingController@getBookingDetails')
  ->name('books.details');

if (config('app.debug')) {
  Route::get('/login/{id}', function (int $id) {
    \Illuminate\Support\Facades\Auth::loginUsingId($id);
    return redirect()->back();
  });
}

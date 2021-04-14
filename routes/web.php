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

Route::get('/', 'Web\\HomeController@home');

Route::post('/login', 'Web\\UserController@login')
  ->name('login');

Route::post('/register', 'Web\\UserController@register')
  ->name('registration');


Route::match(['get', 'post'], '/logout', 'Web\\UserController@logout')
  ->name('logout');

Route::get('/user', function () {
  return response()->json(['user' => \Illuminate\Support\Facades\Auth::user()]);
});

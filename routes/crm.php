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

Route::get('/home', 'CRM\\HomeController@index')
  ->name('home');

Route::get('/login', 'CRM\\LoginController@getPage')
  ->name('login');
Route::post('/login', 'CRM\\LoginController@login')
  ->name('login');


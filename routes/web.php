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

Route::get('/', function () {
    return redirect('country');
});

Route::resource('country', \App\Http\Controllers\CountryController::class);
Route::resource('airline', \App\Http\Controllers\AirlineController::class);
Route::resource('airport', \App\Http\Controllers\AirportController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

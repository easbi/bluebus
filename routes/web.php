<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
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

Route::resource('booking', BookingController::class);

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/booking2', function () {
    return view('home.reservation');
});

Route::get('/admin', function () {
    return view('admin.index');
});

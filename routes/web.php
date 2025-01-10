<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SpjController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/driver', [ProfileController::class, 'index'])->name('admin.driver');
Route::get('/admin/driver/{id}/edit', [ProfileController::class, 'editAdmin'])->name('admin.driveredit');
Route::patch('/admin/driver/{id}', [ProfileController::class, 'updateAdmin'])->name('admin.driverupdate');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/admin', [BookingController::class, 'index']);
Route::get('/createbyDriver', [BookingController::class, 'createbyDriver']);
Route::get('/booking2', [BookingController::class, 'create'])->name('booking2');;
Route::get('/booking2/api/bookings', [BookingController::class, 'getBooking'])->name('getBooking');
Route::get('/kalender', [BookingController::class, 'kalender'])->name('kalender');;
Route::resource('booking', BookingController::class);

Route::post('/spj/{booking}', [SpjController::class, 'store2'])->name('spj.store2');
Route::get('/spj/driver', [SpjController::class, 'index2'])->name('spj.driver');
Route::resource('spj', SpjController::class);

require __DIR__.'/auth.php';

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');



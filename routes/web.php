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

Route::get('/', function () {
    return redirect()->route('booking.create');
});


//Route::resource('/booking', BookingController::class);

Route::post('/booking/confirm', [BookingController::class, 'confirm']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('booking/new', [App\Http\Controllers\BookingController::class, 'create'])->name('booking.create');
Route::post('booking', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');



Route::middleware([auth::class])->group(function () {
    Route::get('/admin', function () {
        return redirect()->route('booking.index');
    });
    Route::get('/bookings', function () {
        return redirect()->route('booking.index');
    });
    Route::get('admin/bookings', [App\Http\Controllers\BookingController::class, 'index'])->name('booking.index');
    Route::get('admin/booking/{booking}/edit', [App\Http\Controllers\BookingController::class, 'edit'])->name('booking.edit');
    Route::put('admin/booking/{booking}', [App\Http\Controllers\BookingController::class, 'update'])->name('booking.update');
    Route::delete('admin/booking/{booking}', [App\Http\Controllers\BookingController::class, 'destroy'])->name('booking.destroy');
});


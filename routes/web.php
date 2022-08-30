<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ResortController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
Route::get('/', [FrontendController::class, 'index'])->name('Homepage');
Route::get('/resorts/{resort}', [FrontendController::class, 'resortDetails'])->name('frontend.resort.detail');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('auth')->prefix('backend')->group(function () {
    Route::get('/', [BackendController::class, 'index'])->name('backend.index');
    Route::get('booking-list/{user}',  [CustomerController::class, 'booking'])->name('customer.bookingList'); 
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('resorts', ResortController::class);
    Route::get('/resorts/{resort}/bookings', [BookingController::class, 'index'])
    ->name('bookings.index');
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking');
    Route::get('/check-resort-available', [BookingController::class, 'chackResort'])->name('check.available');
});

require __DIR__.'/auth.php';

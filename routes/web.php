<?php

use App\Http\Controllers\TripController;
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

Route::get('/', function () { return view('home'); });

Route::middleware(['auth'])->group(function () {
    Route::post('/trips', [TripController::class, 'store']);
    Route::get('/trips/{unique_key}', [TripController::class, 'show']);
    Route::get('/add-trip', [TripController::class, 'create']);
    Route::get('/user-trips', function() {
        return view('trips.user-trips', ['trips' => auth()->user()->trips]);
    });

    Route::get('/account', function () { return view('account.index'); });
    Route::get('/logout', [UserController::class, 'logout'])->name("auth.logout");
});

//Trips Routes
Route::get('/trips', [TripController::class, 'index']);


//Auth Routes
Route::get('/register', function () { return view('auth.register'); })->name('auth.register');
Route::post('/register', [UserController::class, 'store']);
Route::get('/login', function () { return view('auth.login'); })->name('auth.login');
Route::post('/login', [UserController::class, 'authenticate']);


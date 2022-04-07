<?php

use App\Models\Trip;
use Illuminate\Http\Request;
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
    return view('home');
});

Route::get('/trips', function (Request $request) {

    $departureCity = $request->query('departure');

    $arrivalCity = $request->query('arrival');

    $departureDate = $request->query('date');

    $numberOfSeats = $request->query('seats');

    $cheaperTrip = Trip::where('departure_city', 'like', '%'.$departureCity.'%')
        ->where('arrival_city', 'like', '%'.$arrivalCity.'%')
        ->where('departure_date', '>=', $departureDate)
        ->where('number_of_seats', '>=', $numberOfSeats)
        ->orderBy('price')
        ->first();

    $fasterTrip = Trip::where('departure_city', 'like', '%'.$departureCity.'%')
        ->where('arrival_city', 'like', '%'.$arrivalCity.'%')
        ->where('departure_date', '>=', $departureDate)
        ->where('number_of_seats', '>=', $numberOfSeats)
        ->orderByRaw('(arrival_date - departure_date) asc')
        ->first();

    $trips = Trip::where('departure_city', 'like', '%'.$departureCity.'%')
        ->where('arrival_city', 'like', '%'.$arrivalCity.'%')
        ->where('departure_date', '>=', $departureDate)
        ->where('number_of_seats', '>=', $numberOfSeats)
        ->where('id', '!=', $cheaperTrip->id)
        ->where('id', '!=', $fasterTrip->id)
        ->orderBy('departure_date')
        ->get();

    return view('trip.show', ['cheaperTrip' => $cheaperTrip, 'fasterTrip' => $fasterTrip, 'trips' => $trips]);
});

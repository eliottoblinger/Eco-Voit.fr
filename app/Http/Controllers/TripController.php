<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departureCity = $request->query('departure');

        $arrivalCity = $request->query('arrival');

        $departureDate = Carbon::parse(preg_replace('/\(.*$/', '', $request->query('date')))->startOfDay();

        $numberOfSeats = $request->query('seats');

        $userId = auth()->user()->id;

        $cheaperTrip = Trip::whereDoesntHave('users', function($q) use ($userId) {
            $q->where('user_id', $userId);
        })
            ->where('departure_city', 'like', '%'.$departureCity.'%')
            ->where('arrival_city', 'like', '%'.$arrivalCity.'%')
            ->where('departure_date', '>=', $departureDate)
            ->where('number_of_seats', '>=', $numberOfSeats)
            ->orderBy('price')
            ->first();

        $fasterTrip = Trip::whereDoesntHave('users', function($q) use ($userId) {
            $q->where('user_id', $userId);
        })
            ->where('departure_city', 'like', '%'.$departureCity.'%')
            ->where('arrival_city', 'like', '%'.$arrivalCity.'%')
            ->where('departure_date', '>=', $departureDate)
            ->where('number_of_seats', '>=', $numberOfSeats)
            ->orderBy('duration', 'asc')
            ->first();

        $trips = Trip::whereDoesntHave('users', function($q) use ($userId) {
            $q->where('user_id', $userId);
        })
            ->where('departure_city', 'like', '%'.$departureCity.'%')
            ->where('arrival_city', 'like', '%'.$arrivalCity.'%')
            ->where('departure_date', '>=', $departureDate)
            ->where('number_of_seats', '>=', $numberOfSeats);

        if($cheaperTrip && $trips->count() > 2){
            $trips->where('id', '!=', $cheaperTrip->id);
        }
        if($fasterTrip && $trips->count() > 2){
            $trips->where('id', '!=', $fasterTrip->id);
        }

        $trips = $trips->orderBy('departure_date')->get();

        return view('trips.index', ['cheaperTrip' => $cheaperTrip, 'fasterTrip' => $fasterTrip, 'trips' => $trips]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('trips.add');
    }

    public function pay(Request $request){

        Stripe::setApiKey('sk_test_51LkYdKG2x14CtAPX2Xpyg0xs84yA9pC7CZf6XD7aUPLv1edgECnxtkWDYb1t8uWL54rx3m3VRhoHn6lrvjRRwrDG00RCytbDlf');

        $intent = PaymentIntent::create([
            'amount' => $request->amount,
            'currency' => 'eur',
            'metadata' => ['integration_check'=>'accept_a_payment']
        ]);

        return json_encode($intent, 201);
    }

    public function showPayment($unique_key) {
        $trip = Trip::where('unique_key', $unique_key)
            ->first();

        return view('payment.index', ['trip' => $trip]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departureCity = $request->departureCity;
        $departureZipCode = $request->departureZipCode;
        $departureAddress = $request->departureAddress;
        $arrivalCity = $request->arrivalCity;
        $arrivalZipCode = $request->arrivalZipCode;
        $arrivalAddress = $request->arrivalAddress;
        $departureDate = Carbon::parse($request->departureDate);
        $nbOfPassengers = $request->nbOfPassengers;
        $price = $request->price;
        $description = $request->description;
        $meters = $request->meters;
        $duration = $request->duration;

        $trip = Trip::create([
            'departure_city' => $departureCity,
            'departure_zip_code' => $departureZipCode,
            'departure_address' => $departureAddress,
            'arrival_city' => $arrivalCity,
            'arrival_zip_code' => $arrivalZipCode,
            'arrival_address' => $arrivalAddress,
            'departure_date' => $departureDate,
            'duration' => $duration,
            'meters' => $meters,
            'price' => $price,
            'description' => $description,
            'number_of_seats' => $nbOfPassengers,
            'status' => 'planned',
            'unique_key' => substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"), 10, 30),
        ]);

        auth()->user()->trips()->attach($trip->id, [
            'qr_code_url' => '',
            'is_driver' => true
        ]);

        return json_encode($trip, 200);
    }

    public function reserveTrip(Trip $trip){
        auth()->user()->trips()->attach($trip->id, [
            'qr_code_url' => '',
            'is_driver' => false
        ]);

        $trip->update([
            'number_of_seats' => ($trip->number_of_seats - 1)
        ]);

        return json_encode($trip, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($uniqueKey)
    {
        $trip = Trip::where('unique_key', $uniqueKey)->first();

        $reserved = Trip::where('unique_key', $uniqueKey)->whereHas('users', function($q) {
            $q->where('user_id', auth()->user()->id);
        })->first();

        if($reserved){
            $reserved = true;
        }else{
            $reserved = false;
        }

        return view('trips.show', ['trip' => $trip, 'reserved' => $reserved]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        //
    }
}

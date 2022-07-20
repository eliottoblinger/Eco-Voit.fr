<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        return view('trips.show', ['trip' => $trip]);
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

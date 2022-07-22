@extends('layouts.default')

@section('content')
    <div class="bg-gray-light-app my-5">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center">
            <div class="p-3 m-3">
                <h2 class="p-3 text-green-app">Le moins cher</h2>
                <trip-component
                    :trip="{{ json_encode($cheaperTrip, null) }}"
                    :is-filterable="false"/>
            </div>
            <div class="p-3 m-3">
                <h2 class="p-3">Le plus rapide</h2>
                <trip-component
                    :trip="{{ json_encode($fasterTrip, null) }}"
                    :is-filterable="false"/>
            </div>
        </div>

    </div>
    <div>
        <filters-component
            :departure-date="{{ json_encode($trips->first()->departure_date, null) }}"/>
    </div>

    <trips-component
        :trips="{{ json_encode($trips, null) }}"/>
@endsection

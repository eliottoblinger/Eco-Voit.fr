@extends('layouts.default')

@section('content')
    @if($trips->count())
        <div class="bg-gray-light-app my-5">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-center">
                <div class="p-3 m-3">
                    <h2 class="p-3 text-green-app">Le moins cher</h2>
                    <trip-component
                        :trip="{{ json_encode($cheaperTrip, null) }}"
                        :is-filterable="false"></trip-component>
                </div>
                <div class="p-3 m-3">
                    <h2 class="p-3">Le plus rapide</h2>
                    <trip-component
                        :trip="{{ json_encode($fasterTrip, null) }}"
                        :is-filterable="false"></trip-component>
                </div>
            </div>

        </div>
        <filters-component
            :departure-date="{{ json_encode($trips->first()->departure_date, null) }}"></filters-component>

        <trips-component
            :trips="{{ json_encode($trips, null) }}"></trips-component>
    @else
        <div class="min-vh-100 d-flex justify-content-center align-items-center">
            <div class="d-flex align-items-center bg-green-app text-white rounded p-5 shadow-lg">
                <i class="fa-solid fa-face-sad-tear fa-3x me-3"></i>
                <div class="fa-xl">Aucun trajet ne correspond à votre recherche...</div>
            </div>
        </div>
    @endif
@endsection

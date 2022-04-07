@extends('layouts.default')

@section('content')
    <div class="bg-gray-light-app my-5" style="height: 50vh;">
        <div class="h-100 w-100 d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-column align-items-center my-3">
                <h2 class="fw-bold">Trouver votre prochaine destination</h2>
                <p class="text-muted">Indiquer dans la barre ci-dessous votre itinéraire</p>
            </div>
            <searching-bar></searching-bar>
        </div>
    </div>
@endsection

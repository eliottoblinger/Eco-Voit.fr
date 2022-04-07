@extends('layouts.default')

@section('content')
    <div class="min-vh-100 bg-darker-gradient-app">

        <div class="min-vh-100 d-flex justify-content-center align-items-center container">
            <div class="d-none d-lg-block">
                <img src="{{ asset('img/register/register-img.png') }}" alt="trip" style="height: 60vh">
            </div>
            <div class="d-flex bg-white" style="height: 70vh; width: 67vh">
                <div class="row w-100">
                    <div class="col-12 d-flex justify-content-center mt-3 align-items-start" style="height: 5%">
                        <h1 class="mt-5 border-bottom pb-1 pb-lg-3 border-dark fs-2">Inscription</h1>
                    </div>

                    <register-container></register-container>
                </div>

            </div>
        </div>

    </div>
@endsection

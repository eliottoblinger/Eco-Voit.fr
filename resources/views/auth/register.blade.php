@extends('layouts.default')

@section('content')
    <div class="min-vh-100 bg-darker-gradient-app d-flex justify-content-center align-items-center">
        <div class="d-none d-lg-block">
            <img src="{{ asset('img/register/register-img.png') }}" alt="trip" style="height: 60vh">
        </div>
        <div class="d-flex bg-white" style="height: 75vh">
            <register-component></register-component>
        </div>
    </div>
@endsection

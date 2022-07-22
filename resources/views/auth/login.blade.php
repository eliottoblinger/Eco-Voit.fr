@extends('layouts.default')

@section('content')
    <div class="min-vh-100 bg-darker-gradient-app d-flex justify-content-center align-items-center">
        <div class="d-flex bg-white" style="height: 75vh">
            <login-component></login-component>
        </div>
        <div class="d-none d-lg-block">
            <img src="{{ asset('img/login/login-img.png') }}" alt="trip" style="height: 65vh">
        </div>
    </div>
@endsection

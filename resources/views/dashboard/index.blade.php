@extends('layouts.default')

@section('content')
    <div class="min-vh-100">
        <div class="d-flex justify-content-center align-items-center p-3">
            <div class="w-50 me-3 bg-white text-green-app fw-bold d-flex justify-content-center align-items-center shadow-lg" style="height: 200px;">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <i class="fa fa-user fa-3x mb-3">

                    </i>
                    <h4 class="fw-bold">
                        {{ App\Models\User::count() }} utilisateurs
                    </h4>
                </div>
            </div>
            <div class="w-50 me-3 bg-white text-green-app fw-bold d-flex justify-content-center align-items-center shadow-lg" style="height: 200px;">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <i class="fa-solid fa-car fa-3x mb-3"></i>
                    <h4 class="fw-bold">
                        {{ App\Models\Trip::count() }} trajets
                    </h4>
                </div>
            </div>
        </div>

        <div class="p-3" style="pointer-events: none;">
            <h4 class="fw-bold">
                Derniers trajets
            </h4>
            <trips-component :trips="{{ json_encode(App\Models\Trip::latest()->take(10)->get(), null) }}"></trips-component>
        </div>
    </div>
@endsection

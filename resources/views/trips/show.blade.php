@extends('layouts.default')

@section('content')
    <div class="bg-gray-light-app my-5" style="font-size: 16px;">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center">
            <div class="w-100 m-3 m-3">
                <trip-checkout :trip="{{ json_encode($trip, null) }}" />
            </div>
        </div>
    </div>
@endsection

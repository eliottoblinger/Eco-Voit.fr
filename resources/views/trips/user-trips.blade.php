@extends('layouts.default')

@section('content')
   <user-trips-component :trips="{{ json_encode($trips, null) }}"></user-trips-component>
@endsection

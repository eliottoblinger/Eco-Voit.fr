@extends('layouts.default')

@section('content')
   <user-trips-component :trips="{{ json_encode($trips, null) }}"/>
@endsection

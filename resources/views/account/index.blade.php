@extends('layouts.default')
@section('content')
    <account-component :user="{{ json_encode(auth()->user(), null) }}"></account-component>
@endsection

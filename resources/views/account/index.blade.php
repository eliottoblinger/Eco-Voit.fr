@extends('layouts.default')
@section('content')
    <account-component :user="{{ json_encode(auth()->user()->load(['trips']), null) }}"></account-component>
@endsection

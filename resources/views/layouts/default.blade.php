<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eco-Voit.fr</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div id="app">
    @if(!Route::is('auth.*'))
        <app-header :user="{{ json_encode(auth()->user(), null) }}"></app-header>
    @endif
    @yield('content')
    @if(!Route::is('auth.*'))
        <app-footer></app-footer>
    @endif
</div>

<script type="text/javascript" src="{{ asset('js/app.js') }}" ></script>

</body>
</html>

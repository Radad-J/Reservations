<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://use.fontawesome.com/c3bd807fb1.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2d332e0009.js" crossorigin="anonymous"></script>


    <!-- Placeholder for Stripe's security script checkout@index.black.php-->
@yield('payment-script')

<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/trierfilter.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @include('feed::links')

</head>
<body>
@include('../layouts/header')

@if(Route::currentRouteName() === "welcome")
    <div class="col-12">
@else
    <div class="container">
@endif
    @yield('content')
    </div>

    @include('../layouts/footer')
    @yield('payment-js')
</body>
</html>

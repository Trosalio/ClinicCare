<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('meta')
    <title>Clinic Care - @yield('title')</title>
    <link rel="icon" href="{{ asset('icon.png') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
            integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
            crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!-- Styles -->
    @stack('style')
</head>
<body class="fixed-nav sticky-footer sidenav-toggled">
<div id="app">
    @section('navbar')
        @include('inc.navbar')
    @show
    <div id="app" class="content-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    @section('footer')
    @include('inc.footer')
    @show
</div>
<!-- Scripts -->
<script src="{{ asset('js/main.js') }}" rel="stylesheet"></script>
@stack('script')
</body>
</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}:: @yield('title')</title>
     <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/materialize.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- yielded css -->
        @yield('css')
    <!-- yielded js -->
        @yield('js')
</head>
<body>
    <div id="app">
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i>  Logout</a></li>
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>  Dashboard</a></li>
        </ul>
        <nav>
            <div class="nav-wrapper">
                <a href="{{ route('welcome') }}" class="brand-logo">BD NOTES</a>
                <ul class="right hide-on-med-and-down">
                    @if(!Auth::check())
                        <!-- Dropdown Trigger -->
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else 
                        <li><a class="dropdown-button" href="{{ route('register') }}" data-activates="dropdown1">{{ Auth::user()->name }}<i class="fa fa-caret-down right"></i></a></li>
                    @endif
                </ul>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}"></script>-->
</body>
</html>

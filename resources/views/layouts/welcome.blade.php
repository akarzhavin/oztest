<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .top-right {
                position: absolute;
                right: 30px;
                top: 18px;
                z-index: 1000;
                font-size: large;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 34px;
            }

            .text {
                font-size: 24px;
                font-weight: 400;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <div class="container">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <b>Welcome <a href="{{ url('/home') }}">{{ Auth::user()->first_name }}</a>!</b>
                   @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            @yield('content')
        </div>
        <script src="js/app.js"></script>
    </body>
</html>

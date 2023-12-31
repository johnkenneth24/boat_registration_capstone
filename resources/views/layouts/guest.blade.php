<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Boat Registration') }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2/sweetalert2.all.js') }}">
    <link rel="stylesheet" href="{{ asset('bs5/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/webp/lgo.webp') }}" type="image/x-icon">

    <style>
        .overlay-login {
            position: fixed;
            top: 0;
            right: 0;
            width: 120%;
            height: 100vh;
            background-color: #F2F42E;
            clip-path: ellipse(50% 100% at 100% 50%);
            z-index: 1;
        }

        .overlay-register {
            position: fixed;
            top: 0;
            left: 0;
            width: 120%;
            height: 100vh;
            background-color: #F2F42E;
            clip-path: ellipse(50% 100% at 0% 50%);
            z-index: 1;
            overflow: hidden;
        }

        .container-login {
            background: linear-gradient(rgba(66, 68, 142, 0.5), rgba(66, 68, 142, 0.5)), url("{{ asset('images/webp/sb-orig.webp') }}") left no-repeat;
            background-attachment: fixed;
            position: relative;
            height: 100vh;
            font-family: 'Roboto', sans-serif;
            background-size: contain;
            background-position: left;
        }

        .container-register {
            background: linear-gradient(rgba(66, 68, 142, 0.5), rgba(66, 68, 142, 0.5)), url("{{ asset('images/webp/sb-ai generated.webp') }}") right no-repeat;
            background-attachment: fixed;
            position: relative;
            height: 110vh;
            font-family: 'Roboto', sans-serif;
            background-size: cover;
        }

        .con-log,
        .con-reg {
            position: relative;
            z-index: 2;
            height: 100%;
        }

        body::-webkit-scrollbar {
            display: none;
        }
    </style>
    @yield('styles')
</head>

<body class="hold-transition login-page">
    <div>
        @yield('content')
    </div>

    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('bs5/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/adminlte.min.js') }}" defer></script>
    <script src="{{ asset('css/sweetalert2/sweetalert2.all.min.js') }}"></script>

    @yield('scripts')
    {{--  make the overlay to disappear after 2 seconds --}}
    <script>
        setTimeout(function() {
            document.querySelector('.overlay').style.display = 'none';
        }, 2000);
    </script>
</body>

</html>

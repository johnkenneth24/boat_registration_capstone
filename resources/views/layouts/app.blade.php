<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'SORSU-BC Library Management System') }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2/sweetalert2.all.min.js') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/lgo.png') }}" type="image/x-icon">
    <style>
        .nav .nav-item-active {
            background-color: #6e7174;
            color: white !important;
            border-radius: 3px;
        }

        .nav-pills .nav-link {
            color: black !important;
        }

        .form-control:focus {
            border-color: #2187FE !important;
            box-shadow: 0 0 0 2px #a0b4f6 !important;
        }

        .content-wrapper {
            background-image: linear-gradient(75deg, rgba(255, 247, 247, 0.763), rgba(0, 0, 0, 0.605)), url("{{ asset('images/sb-ai generated.jpg') }}");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: right;
        }
    </style>
    @yield('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light sticky-top">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}
                        <span class="text-muted small"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px;">
                        <a href="{{ route('profile.show') }}" class="dropdown-item">
                            <i class="mr-2 fas fa-file"></i>
                            {{ __('My profile') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="mr-2 fas fa-sign-out-alt"></i>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar elevation-4" style="background-color: #F1F32E; position: fixed !important;">
            <a href="/" class="brand-link text-center">
                <img src="{{ asset('images/webp/lgo.webp') }}" alt="Bulan Logo"
                    class="img-fluid img-circle elevation-3" style="opacity: .8; max-height: 100px;"> <br>
                <h2 class="brand-text mt-2 font-weight-bold text-center text-dark d-inline-block text-break">IMS of RMB
                </h2> <br>
                <p class=" brand-text small  text-dark">Municipal Agriculture Office <br> of Bulan,
                    Sorsogon</p>
            </a>
            @include('layouts.navigation')
        </aside>

        <div class="content-wrapper">
            @yield('content')
        </div>

        {{-- <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside> --}}

        {{-- <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer> --}}
    </div>

    <!-- REQUIRED SCRIPTS -->

    @vite('resources/js/app.js')
    <script src="{{ asset('js/adminlte.min.js') }}" defer></script>
    <script src="{{ asset('css/sweetalert2/sweetalert2.all.min.js') }}"></script>
    @yield('scripts')

</body>

</html>

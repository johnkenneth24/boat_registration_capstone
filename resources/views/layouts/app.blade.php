<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Boat Registration</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2/sweetalert2.all.js') }}">
    <link rel="stylesheet" href="{{ asset('bs5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/lgo.png') }}" type="image/x-icon">
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <style>
        .nav .nav-item .nav-item-active {
            background-color: #2094f4;
            color: white !important;
            border-radius: 3px;
            padding-bottom: 0;
        }

        .nav .nav-item .nav-treeview .nav-item.nav-tree-view-active {
            background-color: #61ddff;
            color: white !important;
            border-radius: 3px;
            padding-bottom: 0;
        }

        .nav .nav-item .nav-link {
            width: auto !important;
        }

        .nav .nav-item {
            overflow: hidden !important;
        }

        .nav .nav-item .nav-link:hover {
            background-color: #43b3d1;
            color: white !important;
            border-radius: 3px;
        }

        .nav .nav-item .nav-treeview .nav-item.nav-tree-view-active:hover {
            background-color: #43b3d1;
            color: white !important;
            border-radius: 3px;
            padding-bottom: 0;
            overflow: hidden !important;
        }

        .nav-pills .nav-link {
            color: black !important;
        }

        .form-control:focus {
            border-color: #2187FE !important;
            box-shadow: 0 0 0 2px #a0b4f6 !important;
        }

        .content-wrapper {
            /* background-image: linear-gradient(75deg, rgba(255, 247, 247, 0.763), rgba(0, 0, 0, 0.605)), url("{{ asset('images/sb-ai generated.jpg') }}");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: right; */
            background-color: rgba(250, 250, 250, 0.979);
        }

        .form-group label {
            font-size: 0.9rem;
        }

        .progresses {
            display: flex;
            align-items: center;
        }

        .line {
            width: 120px;
            height: 6px;
            background: #63d19e;
        }

        .steps {
            display: flex;
            background-color: #63d19e;
            color: #fff;
            font-size: 14px;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .inactive {
            background-color: #e9ecef;
            color: #6c757d;
        }

        /* hides the scrollbar */
        body::-webkit-scrollbar {
            display: none;
        }
    </style>
    @yield('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-lg sticky-top">
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
                        <a href="{{ route('users.profile') }}" class="dropdown-item">
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
            <a href="/" class="brand-link text-center" style="text-decoration: none;">
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

        {{-- <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer> --}}
    </div>

    <!-- REQUIRED SCRIPTS -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('bs5/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/adminlte.min.js') }}" defer></script>
    <script src="{{ asset('css/sweetalert2/sweetalert2.all.min.js') }}"></script>

    {{--  make the overlay to disappear after 2 seconds --}}
    <script>
        setTimeout(function() {
            document.querySelector('.overlay').style.display = 'none';
        }, 2000);
    </script>

    {{-- <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(2000, function() {
                $(this).remove();
            });
        }, 4000);
    </script> --}}

    @yield('scripts')

</body>

</html>

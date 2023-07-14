@extends('layouts.guest')

@section('content')
    <div class="overlay">
    </div>
    <div class="container container-login">
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 p-0 mt-5">
                <h4 class="text-center text-uppercase">BOAT REGISTRATION AND INFORMATION MANAGEMENT SYSTEM</h4>
                <h6 class="text-center">Municipal Agriculture Office in Bulan, Sorsogon</h6>
                <hr class="border-white border-2 border text-white opacity-75 mb-5">
            </div>
            <div class="col-md-3 mt-3"></div>
            <div class="col-md-3 mt-3 ms-0 ps-0 text-center d-none d-sm-block">
                <img src="{{ asset('images/lgo.png') }}" alt="bulan-logo" height="300px" class="img-fluid">
            </div>
            <div class="col-md-6 mt-3 d-flex justify-content-center">
                <form action="{{ route('login') }}" method="post" class="mt-3 col-md-9 m-2 text-center">
                    @csrf
                    <h4 class="text-uppercase mb-2">Log in Form</h4>
                    <div class="form-group mb-2 mt-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="username"
                                class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"
                                autocomplete="username" required placeholder="Username">
                        </div>
                        @error('username')
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" required placeholder="Password"
                                autocomplete="off password">
                        </div>
                        @error('password')
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <input class="btn btn-primary btn-md col-md-5 mt-2 rounded-pill text-uppercase" type="submit"
                            value="Log in">
                    </div>
                    {{-- <div class="text-center mt-2">
                        <span class="text-muted">Already have an account?</span>
                        <a href="{{ route('register') }}" class="text-decoration-none text-dark">Register here</a>
                    </div> --}}
                </form>
            </div>

        </div>
    </div>
@endsection

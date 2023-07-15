@extends('layouts.guest')

@section('content')
    <div class="container-register">
        <div class="overlay-register">
        </div>
        <div class="container con-reg">
            <div class="row">
                <div class="col-md-6 p-0 mt-5">
                    <h4 class="text-center text-uppercase">BOAT REGISTRATION AND INFORMATION MANAGEMENT SYSTEM</h4>
                    <h6 class="text-center">Municipal Agriculture Office in Bulan, Sorsogon</h6>
                    <hr class="border-white border-2 border text-white opacity-75 mb-5">
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-6 mt-0 d-flex justify-content-center">
                    <form method="POST" action="{{ route('register') }}" class="mt-0 col-md-9 m-2 text-center">
                        @csrf
                        <h4 class="text-uppercase text-secondary mb-2">Sign up</h4>
                        <div class="form-group mb-2 mt-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    autocomplete="name" required placeholder="Name">
                            </div>
                            @error('name')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2 mt-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" name="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username') }}" autocomplete="username" required placeholder="Username">
                            </div>
                            @error('username')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2 mt-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    autocomplete="email" required placeholder="Email">
                            </div>
                            @error('email')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2 mt-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    value="{{ old('password') }}" autocomplete="password" required placeholder="Password">
                            </div>
                            @error('password')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2 mt-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    value="{{ old('password_confirmation') }}" autocomplete="new-password" required
                                    placeholder="Password Confirmation">
                            </div>
                            @error('password_confirmation')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <input class="btn btn-primary btn-md col-md-5 mt-2 rounded-pill text-uppercase" type="submit"
                                value="Register">
                        </div>
                        <div class="text-center mt-2">
                            <span class="text-dark">Already have an account?</span>
                            <a href="{{ route('login') }}" class="text-muted">Log in Here</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 mt-3 ms-0 ps-0 text-center d-none d-sm-block">
                    <img src="{{ asset('images/lgo.png') }}" alt="bulan-logo" height="300px" class="img-fluid">
                </div>
                <div class="col-md-3 mt-3"></div>

            </div>
        </div>
    </div>
@endsection

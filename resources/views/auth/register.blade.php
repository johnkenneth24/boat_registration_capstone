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
                    <hr class="border-white border-2 border text-white opacity-75">
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
                                <div class="invalid-feedback" style="display: inline-block !important;">
                                    {{ $message }}
                                </div>
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
                                <div class="invalid-feedback" style="display: inline-block !important;">
                                    {{ $message }}
                                </div>
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
                                <div class="invalid-feedback" style="display: inline-block !important;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2 mt-4">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password" id="password" placeholder="Password"
                                    class="form-control" autocomplete="new-password" value="{{ old('password') }}" required>
                                <button type="button" class="btn btn-sm btn-light" id="showPasswordBtn">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <p class="text-danger small" id="passwordError"></p>
                        </div>
                        <div class="form-group mb-2 mt-4">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                    id="passwordConfirmation" autocomplete="new-password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror" required>
                                <button type="button" class="btn btn-sm btn-light" id="showPasswordConfirmationBtn">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <p class="text-danger" id="passwordConfirmationError"></p>
                            @error('password_confirmation')
                                <div class="invalid-feedback" style="display: inline-block !important;">
                                    {{ $message }}
                                </div>
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

@section('scripts')
    <script>
        const passwordField = document.getElementById('password');
        const passwordConfirmationField = document.getElementById('passwordConfirmation');
        const passwordConfirmationError = document.getElementById('passwordConfirmationError');
        const passwordError = document.getElementById('passwordError');
        const showPasswordBtn = document.getElementById('showPasswordBtn');
        const showPasswordConfirmationBtn = document.getElementById('showPasswordConfirmationBtn');


        showPasswordBtn.addEventListener('click', function() {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                showPasswordBtn.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordField.type = 'password';
                showPasswordBtn.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });

        showPasswordConfirmationBtn.addEventListener('click', function() {
            if (passwordConfirmationField.type === 'password') {
                passwordConfirmationField.type = 'text';
                showPasswordConfirmationBtn.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordConfirmationField.type = 'password';
                showPasswordConfirmationBtn.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });


        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/;
        // At least one uppercase letter, one lowercase letter, and one number

        // Real-time password validation
        passwordField.addEventListener('input', function() {
            // Check if the password passes the validation rules
            if (!passwordRegex.test(passwordField.value)) {
                // Add the `is-invalid` class to the password field and display error message
                passwordField.classList.add('is-invalid');
                passwordField.setCustomValidity(
                    'The password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.'
                );
                passwordError.innerHTML =
                    'The password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.';
            } else {
                // Remove the `is-invalid` class from the password field and the message
                passwordField.classList.remove('is-invalid');
                passwordField.setCustomValidity('');
                passwordError.innerHTML = '';
            }
        });

        passwordConfirmationField.addEventListener('input', function() {
            // Check if the passwords match
            if (passwordField.value !== passwordConfirmationField.value) {
                // Add the `is-invalid` class to the password confirmation field
                passwordConfirmationField.classList.add('is-invalid');
                // Display an error message
                passwordConfirmationField.setCustomValidity('The passwords do not match.');
                passwordConfirmationError.innerHTML = 'The passwords do not match.';
            } else {
                // remove error message
                passwordConfirmationField.classList.remove('is-invalid');
                passwordConfirmationField.setCustomValidity('');
                passwordConfirmationError.innerHTML = '';
            }
        });
    </script>
@endsection

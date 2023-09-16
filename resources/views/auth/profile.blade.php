@extends('layouts.app')

@section('content')
    <div class="content-header"></div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <x-success></x-success>
                    <div class="card card-outline card-warning">
                        <div class="row">
                            <div class="col-md-4 d-none d-md-block">
                                <img src="{{ asset('images/per.png') }}" class="img-fluid mt-4 px-3" alt="personal info"
                                    title="Derived from: https://www.flaticon.com/free-icons/personal-information">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="row">
                                        <form action="{{ route('users.profileUpdate', auth()->user()->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row border border-secondary">
                                                <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                                    <h5 class="font-weight-bolder text-white m-0">Manage your account
                                                        details
                                                        here</h5>
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label>Fullname</label>
                                                    <input type="text" name="name"
                                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                        value="{{ old('name', auth()->user()->name) }}">
                                                    @error('name')
                                                        <div class="invalid-feedback" style="display: inline-block !important;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Username</label>
                                                    <input type="text" name="username"
                                                        class="form-control form-control-sm @error('username') is-invalid @enderror"
                                                        value="{{ old('username', auth()->user()->username) }}">
                                                    @error('username')
                                                        <div class="invalid-feedback" style="display: inline-block !important;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Email</label>
                                                    <input type="email" name="email"
                                                        class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                        value="{{ old('email', auth()->user()->email) }}">
                                                    @error('email')
                                                        <div class="invalid-feedback" style="display: inline-block !important;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <input type="hidden" name="role" value="{{ auth()->user()->role }}">
                                                <div class="form-group col-md-6">
                                                    <label>Contact Number</label>
                                                    <input type="text" name="contact_no"
                                                        class="form-control form-control-sm @error('contact_no') is-invalid @enderror"
                                                        required value="{{ auth()->user()->contact_no }}">
                                                    @error('contact_no')
                                                        <div class="invalid-feedback" style="display: inline-block !important;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-2 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-sm btn-primary ">
                                                        <i class="fas fa-save"></i> Save Changes
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <form action="{{ route('users.passwordUpdate', auth()->user()->id) }}"
                                            method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="row border border-secondary">
                                                <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                                    <h6 class="font-weight-bolder text-white m-0">Change Password</h6>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Password</label>
                                                    <div class="input-group">
                                                        <input type="password" name="password" id="password"
                                                            placeholder="Password" class="form-control form-control-sm"
                                                            autocomplete="new-password" value="{{ old('password') }}"
                                                            required>
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            id="showPasswordBtn">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </div>
                                                    <p class="text-danger" id="passwordError"></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Confirm Password</label>
                                                    <div class="input-group">
                                                        <input type="password" name="password_confirmation"
                                                            placeholder="Confirm Password" id="passwordConfirmation"
                                                            autocomplete="new-password"
                                                            class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror"
                                                            required>
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            id="showPasswordConfirmationBtn">
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
                                                <div class="col-md-12 mb-2 d-flex justify-content-end">
                                                    <a href="{{ route('home') }}"
                                                        class="btn btn-sm btn-danger mr-3 "><span><i
                                                                class="fa fa-arrow-left" aria-hidden="true"></i></span> Go
                                                        Back</a>
                                                    <button type="submit" class="btn btn-sm btn-primary ">
                                                        <i class="fas fa-save"></i> Save Changes
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="overlay dark">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function validatePassword() {
            const password = document.getElementById('password').value;
            const errorElement = document.getElementById('passwordError');

            // Define your validation conditions
            const conditions = [
                password.length >= 8,
                /[A-Z]/.test(password),
                /[a-z]/.test(password),
                /\d/.test(password)
            ];

            // Display checkmark (green) or X mark (red) for each condition
            const icons = conditions.map(condition => condition ? '<i class="fas fa-check text-success"></i>' :
                '<i class="fas fa-times text-danger"></i>');

            // Create a list of validation messages
            const messages = [
                'Minimum of 8 characters',
                'Should have an uppercase letter',
                'Should have a lowercase letter',
                'Should have a number'
            ];

            // Generate the final error message
            errorElement.innerHTML = '';
            for (let i = 0; i < conditions.length; i++) {
                const message = conditions[i] ? `<span class="text-success">${icons[i]} ${messages[i]}</span>` :
                    `${icons[i]} ${messages[i]}`;
                errorElement.innerHTML += message + '<br>';
            }
        }

        // Add an event listener to validate the password confirmation on input
        document.getElementById('password').addEventListener('input', validatePassword);
    </script>

    {{-- make a script to hide or show the password value on click of showPasswordBtn --}}
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

        passwordConfirmationField.addEventListener('input', function() {
            // Check if the passwords match
            if (passwordField.value !== passwordConfirmationField.value) {
                // Add the `is-invalid` class to the password confirmation field
                passwordConfirmationField.classList.add('is-invalid');
                // Display an error message
                passwordConfirmationField.setCustomValidity('The passwords do not match.');
                // icon for x mark
                passwordConfirmationError.innerHTML = '<i class="fas fa-times text-danger"></i>' +
                    ' The passwords do not match.';
            } else {
                // remove error message
                passwordConfirmationField.classList.remove('is-invalid');
                passwordConfirmationField.setCustomValidity('');
                // a message with class of text-success
                passwordConfirmationError.innerHTML = '<span class="text-success">' +
                    '<i class="fas fa-check text-success"></i>' +
                    ' The passwords match.' + '</span>';
            }
        });
    </script>
@endsection

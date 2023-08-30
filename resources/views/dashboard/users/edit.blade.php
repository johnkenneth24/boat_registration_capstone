@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="content">
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-md-12">
                    <div class="card card-outline card-warning mt-5">
                        <div class="row">
                            <div class="col-md-4 lni-text-align-center d-none d-md-block">
                                <img src="{{ asset('images/per.png') }}" class="img-fluid mt-4 px-3" alt="personal info"
                                    title="Derived from: https://www.flaticon.com/free-icons/personal-information">
                            </div>
                            <div class="col-md-8">
                                <form action="{{ route('users.update', $user->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body mt-0">
                                        <div class="row border border-secondary">
                                            <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                                <h4 class="font-weight-bolder text-white m-0">Edit User details</h4>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>ID-Number</label>
                                                <input type="text" name="id_number" class="form-control form-control-sm"
                                                    readonly value="{{ $user->id_number }}">
                                            </div>
                                            <div class="form-group col-md-10">
                                                <label>Fullname</label>
                                                <input type="text" name="name"
                                                    class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                    required value="{{ $user->name }}">
                                                @error('name')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Role</label>
                                                <input type="text" name="role" class="form-control form-control-sm"
                                                    readonly value="{{ $user->roles }}">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Email</label>
                                                <input type="email" name="email"
                                                    class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                    required value="{{ $user->email }}">
                                                @error('email')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Contact No.</label>
                                                <input type="text" name="contact_no"
                                                    class="form-control form-control-sm @error('contact_no') is-invalid @enderror"
                                                    required value="{{ $user->contact_no }}">
                                                @error('contact_no')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Username</label>
                                                <input type="text" name="username"
                                                    class="form-control form-control-sm @error('username') is-invalid @enderror"
                                                    required value="{{ $user->username }}">
                                                @error('username')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-5">
                                                <label>Password</label>
                                                <div class="input-group">
                                                    <input type="password" name="password" id="password"
                                                        class="form-control form-control-sm" autocomplete="new-password"
                                                        value="{{ old('password') }}" required>
                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                        id="showPasswordBtn">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Confirm Password</label>
                                                <div class="input-group">
                                                    <input type="password" name="password_confirmation"
                                                        id="passwordConfirmation" autocomplete="new-password"
                                                        class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror"
                                                        required>
                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                        id="showPasswordConfirmationBtn">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-end">
                                        <a href="{{ route('users.index') }}"
                                            class="btn btn-danger col-md-2 mr-2">Cancel</a>
                                        <button type="submit" class="btn btn-primary col-md-2">Update</button>
                                    </div>
                                </form>
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
        const passwordField = document.getElementById('password');
        const passwordConfirmationField = document.getElementById('passwordConfirmation');
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

        passwordField.addEventListener('input', function() {
            if (passwordField.value !== passwordConfirmationField.value) {
                passwordConfirmationField.classList.add('is-invalid');
            } else {
                passwordConfirmationField.classList.remove('is-invalid');
            }
        });

        passwordConfirmationField.addEventListener('input', function() {
            if (passwordField.value !== passwordConfirmationField.value) {
                passwordConfirmationField.classList.add('is-invalid');
            } else {
                passwordConfirmationField.classList.remove('is-invalid');
            }
        });
    </script>
@endsection

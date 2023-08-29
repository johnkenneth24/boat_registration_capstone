@extends('layouts.app')

@section('content')
    <div class="content-header">
        {{-- <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('My profile') }}</h1>
                </div>
            </div>
        </div> --}}
    </div>

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
                                <form action="{{ route('users.profileUpdate', auth()->user()->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="row border border-secondary">
                                            <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                                <h5 class="font-weight-bolder text-white m-0">Manage your account details
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
                                            <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                                <h6 class="font-weight-bolder text-white m-0">Change Password</h6>
                                            </div>
                                            <div class="form-group col-md-6">
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
                                            <div class="form-group col-md-6">
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
                                            <div class="col-md-12 mb-2 d-flex justify-content-end">
                                                <a href="{{ route('home') }}" class="btn btn-sm btn-danger mr-3 "><span><i
                                                            class="fa fa-arrow-left" aria-hidden="true"></i></span> Go
                                                    Back</a>
                                                <button type="submit" class="btn btn-sm btn-primary ">
                                                    <i class="fas fa-save"></i> Save Changes
                                                </button>
                                            </div>
                                        </div>
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

{{-- @section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection --}}
{{-- 
@section('scripts')
    @if ($message = Session::get('success'))
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script>
            toastr.options = {
                "closeButton": true,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            toastr.success('{{ $message }}')
        </script>
    @endif
@endsection --}}

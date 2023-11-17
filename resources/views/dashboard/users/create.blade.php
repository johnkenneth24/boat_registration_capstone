@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid ">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card card-outline card-warning mt-5">
                        <div class="row">
                            <div class="col-md-4 lni-text-align-center d-none d-md-block">
                                <img src="{{ asset('images/per.png') }}" class="img-fluid mt-4 px-3" alt="personal info"
                                    title="Derived from: https://www.flaticon.com/free-icons/personal-information">
                            </div>
                            <div class="col-md-8">
                                <form action="{{ route('users.store') }}" method="post">
                                    @csrf
                                    <div class="card-body mt-0">
                                        <div class="row border border-secondary">
                                            <span class="text-muted font-italic small">*Please be reminded that only staff
                                                accounts are created here.</span>
                                            <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                                <h4 class="font-weight-bolder text-white m-0">Staff Registration</h4>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>ID-Number</label>
                                                <input type="text" name="id_number" class="form-control form-control-sm"
                                                    readonly value="{{ $latestId }}">
                                            </div>
                                            <div class="form-group col-md-10">
                                                <label>Fullname</label>
                                                <input type="text" name="name"
                                                    class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                    required value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Role</label>
                                                <input type="text" name="role" class="form-control form-control-sm"
                                                    readonly value="Staff">
                                            </div>
                                            <div class="form-group col-md-10">
                                                <label>Contact No.</label>
                                                <input type="text" name="contact_no"
                                                    class="form-control form-control-sm @error('contact_no') is-invalid @enderror"
                                                    required value="{{ old('contact_no') }}">
                                                @error('contact_no')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Username</label>
                                                <input type="text" name="username"
                                                    class="form-control form-control-sm @error('username') is-invalid @enderror"
                                                    required value="{{ old('username') }}">
                                                @error('username')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Default Password</label>
                                                <input type="text" name="password" class="form-control form-control-sm"
                                                    value="12345Staff" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-end">
                                        <a href="{{ route('users.index') }}"
                                            class="btn btn-danger col-md-2 mr-2">Cancel</a>
                                        <button type="submit" class="btn btn-primary col-md-2">Submit</button>
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

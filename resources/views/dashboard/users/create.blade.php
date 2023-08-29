@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-warning mt-5">
                        {{-- <div class="card-header m-0 mb-0">
                            <div class="card-title">
                                <h4 class="text-uppercase">Staff Registration</h4>
                            </div>
                        </div> --}}
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="card-body mt-0">
                                <div class="row border border-secondary">
                                    <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                        <h4 class="font-weight-bolder text-white m-0">Staff Registration</h4>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>ID-Number</label>
                                        <input type="text" name="id_number" class="form-control form-control-sm" readonly
                                            value="{{ $latestId }}">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Fullname</label>
                                        <input type="text" name="name" class="form-control form-control-sm" required
                                            value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group col-md-5">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control form-control-sm" required
                                            value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Role</label>
                                        <input type="text" name="role" class="form-control form-control-sm" readonly
                                            value="Staff">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control form-control-sm" required
                                            value="{{ old('username') }}">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Contact No.</label>
                                        <input type="text" name="contact_no" class="form-control form-control-sm"
                                            required value="{{ old('contact_no') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ route('users.index') }}" class="btn btn-danger col-md-2 mr-2">Cancel</a>
                                <button type="submit" class="btn btn-primary col-md-2">Submit</button>
                            </div>
                        </form>
                        <div class="overlay dark">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

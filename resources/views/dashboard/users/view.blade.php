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
                                <form>
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body mt-0">
                                        <div class="row border border-secondary">
                                            <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                                <h4 class="font-weight-bolder text-white m-0">User Details</h4>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>ID-Number</label>
                                                <input type="text" name="id_number" class="form-control form-control-sm"
                                                    readonly value="{{ $user->id_number }}">
                                            </div>
                                            <div class="form-group col-md-9">
                                                <label>Fullname</label>
                                                <input type="text" name="name" class="form-control form-control-sm"
                                                    readonly value="{{ $user->name }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Role</label>
                                                <input type="text" name="role" class="form-control form-control-sm"
                                                    readonly value="{{ $user->role }}">
                                            </div>
                                            <div class="form-group col-md-9">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control form-control-sm"
                                                    readonly value="{{ $user->username }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control form-control-sm"
                                                    readonly value="{{ $user->email }}">

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Contact No.</label>
                                                <input type="text" name="contact_no" class="form-control form-control-sm"
                                                    readonly value="{{ $user->contact_no }}">

                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-end">
                                        <a href="{{ route('users.index') }}" class="btn btn-info col-md-2 mr-2"><span><i
                                                    class="fa fa-arrow-left" aria-hidden="true"></i></span> Go back</a>
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

@extends('layouts.app')

@section('content')
    <div class="content-header">
        {{-- <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-12">
                    <h1 class="m-0">{{ __('Users') }}</h1>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Users List</h4>
                            </div>
                            <div class="card-tools">
                                <a href="{{ route('users.create') }}" class="btn btn-success px-5">
                                    <span><i class="fa fa-user-plus" aria-hidden="true"></i></span> Add User
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-sm table-responsive-md">
                                <thead class="thead-dark">
                                    <tr class="align-middle">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Contact Info.</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="align-middle">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->contact_no ?? '' }}</td>
                                            <td class="d-flex justify-content-around align-middle">
                                                <button class="btn btn-sm btn-primary">Edit</button>
                                                <button class="btn btn-sm btn-warning">View</button>
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

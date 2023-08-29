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
            <x-success></x-success>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Users List</h4>
                            </div>
                            <div class="card-tools">
                                <a href="{{ route('users.create') }}" class="btn btn-success px-5">
                                    <span><i class="fa fa-user-plus" aria-hidden="true"></i></span> Add a Staff Account
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-sm table-hover table-borderless">
                                <thead class="thead-dark">
                                    <tr class="align-middle">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th class="text-center">Role</th>
                                        <th>Email</th>
                                        <th>Contact Info.</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="align-middle">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->contact_no ?? '' }}</td>
                                            <td class="d-flex justify-content-center align-middle">
                                                @if ($user->role != 'admin')
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-sm btn-primary mr-2" title="Edit">EDIT</a>
                                                    <a href="{{ route('users.show', $user->id) }}"
                                                        class="btn btn-sm btn-warning mr-2" title="View">VIEW</a>
                                                    <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                                        data-toggle="modal" data-target="#confirmationModal">
                                                        DELETE
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!-- Modal -->
                                <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog"
                                    aria-labelledby="confirmationModalLabel" aria-hidden="true" data-backdrop="static">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content modal-static">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body mt-2 mb-2 text-center">
                                                <i class="fas fa-exclamation-triangle fa-4x text-warning"></i>
                                                <h3>Are you sure you want to delete this user?</h3>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

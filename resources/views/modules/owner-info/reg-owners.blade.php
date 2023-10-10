@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <x-success></x-success>
                    <div class="card  card-outline card-warning mt-5">
                        <div class="card-header">
                            <div class="card-title mb-0">
                                <h4>Registered Owners</h4>
                            </div>
                            <div class="card-tools d-flex justify-content-end mb-0">
                                <div class="d-sm-none d-md-block">
                                    <form action="{{ route('owner-info.registered-owners') }}" method="get">
                                        @csrf
                                        <div class="form-group mb-0">
                                            <input class="form-control form-control-md d-sm-none d-md-block mr-3 mb-0"
                                                type="search" placeholder="Search..." name="search" style="width: 300px;"
                                                autofocus>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-sm">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Name</th>
                                        <th>Application Date</th>
                                        <th>Address</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($regOwners as $regOwner)
                                        <tr>
                                            <td>{{ $regOwner->full_name }}</td>
                                            <td>{{ $regOwner->created_at->format('M. d, Y') }}</td>
                                            <td>{{ $regOwner->address }}</td>
                                            <td class="d-flex justify-content-center align-middle">
                                                <button type="button" class="btn btn-sm btn-warning mr-2" title="VIEW"
                                                    data-toggle="modal" data-target="#viewModal{{ $regOwner->id }}">
                                                    VIEW
                                                </button>
                                                {{-- <a href="#" class="btn btn-sm btn-primary mr-2">EDIT</a>
                                                <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                                    data-toggle="modal" data-target="#confirmationModal{{ $regOwner->id }}">
                                                    DELETE
                                                </button> --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No Data</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{ $regOwners->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

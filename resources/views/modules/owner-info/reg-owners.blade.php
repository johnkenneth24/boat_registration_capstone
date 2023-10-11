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
                                        {{-- <th>Status</th> --}}
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($regOwners as $regOwner)
                                        <tr>
                                            <td>{{ $regOwner->full_name }}</td>
                                            <td>{{ $regOwner->created_at->format('M. d, Y') }}</td>
                                            <td>{{ $regOwner->address }}</td>
                                            {{-- <td>{{ ucfirst($regOwner->status) }}</td> --}}
                                            <td class="d-flex justify-content-center align-middle">
                                                <button type="button" class="btn btn-sm btn-warning mr-2 px-4 fw-bold"
                                                    title="VIEW" data-toggle="modal"
                                                    data-target="#viewModal{{ $regOwner->id }}">
                                                    VIEW
                                                </button>
                                                {{-- <a href="{{ route('regOwner.edit',$regOwner->id) }}" class="btn btn-sm btn-primary mr-2">EDIT</a>
                                                <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                                    data-toggle="modal" data-target="#confirmationModal{{ $regOwner->id }}">
                                                    DELETE
                                                </button> --}}
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="viewModal{{ $regOwner->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true"
                                            data-backdrop="static">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content modal-static">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewModalLabel">View Owner
                                                            Details
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body mt-2 mb-2">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="fw-bold">Fullname:</label>
                                                                    <input type="text"
                                                                        class="form-control-plaintext form-control-sm"
                                                                        readonly value="{{ $regOwner->fullname }}">

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6"></div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-end">
                                                        <button class="btn btn-primary px-5 fw-bold"
                                                            data-target="#modalToggle2{{ $regOwner->id }}"
                                                            data-dismiss="modal" data-toggle="modal">NEXT</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modalToggle2{{ $regOwner->id }}" aria-hidden="true"
                                            aria-labelledby="modalToggle2Label" tabindex="-1">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content modal-static">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalToggle2Label">View Owner
                                                            Details
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body mt-2 mb-2 text-center">
                                                        jdfjfbjf
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary"
                                                            data-target="#viewModal{{ $regOwner->id }}" data-dismiss="modal"
                                                            data-toggle="modal">Back to first</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No Data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                {{-- Modal --}}
                                {{-- @foreach ($regOwners as $regOwner)
                                    <div class="modal fade" id="viewModal{{ $regOwner->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="viewModalLabel{{ $regOwner->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewModalLabel{{ $regOwner->id }}">
                                                        regOwner Details
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true" class="text-danger"
                                                            title="Close">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body mt-2 mb-2 text-center">
                                                    <h4 class="text-center">{{ $regOwner->title }}</h4>
                                                    <span class="font-italic">{{ $regOwner->date->format('F d, Y') }}
                                                    </span>
                                                    <p class="text-center text-justify mt-3">{{ $regOwner->content }}
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary float-right"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="confirmationModal{{ $regOwner->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="confirmationModalLabel{{ $regOwner->id }}" aria-hidden="true"
                                        data-backdrop="static">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content modal-static">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmationModalLabel{{ $regOwner->id }}">Confirm Deletion
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body mt-2 mb-2 text-center">
                                                    <i class="fas fa-exclamation-triangle fa-4x text-warning"></i>
                                                    <h3>Are you sure you want to delete this regOwner?</h3>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('regOwner.destroy', $regOwner->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach --}}
                            </table>
                        </div>
                        {{-- <div class="card-footer clearfix">
                            $regOwners->links()
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

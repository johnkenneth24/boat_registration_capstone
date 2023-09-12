@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <x-success></x-success>
                    <div class="card  card-outline card-warning mt-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Pending Registration</h4>
                            </div>
                            {{-- <div class="card-tools">
                                <a href="{{ route('item.create') }}" class="btn btn-success"><span><i
                                            class="fa fa-plus" aria-hidden="true"></i></span> Add
                                    items</a>
                            </div> --}}
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-responsive-md">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Name</th>
                                        <th>Application Date</th>
                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pendingOwners as $item)
                                        <tr>
                                            <td>{{ $item->fullname }}</td>
                                            <td>{{ $item->created_at->format('F d, Y') }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td class="d-flex justify-content-center align-middle">
                                                <button type="button" class="btn btn-sm btn-primary mr-2" title="VIEW"
                                                    data-toggle="modal" data-target="#viewModal{{ $item->id }}">
                                                    VIEW
                                                </button>
                                                <a href="{{ route('owner-info.approve', $item->id) }}"
                                                    class="btn btn-sm btn-warning mr-2">APPROVE</a>
                                                <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                                    data-toggle="modal" data-target="#confirmationModal{{ $item->id }}">
                                                    DELETE
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No Data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                {{-- Modal --}}
                                {{-- @foreach ($items as $item)
                                    <div class="modal fade" id="viewModal{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="viewModalLabel{{ $item->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewModalLabel{{ $item->id }}">
                                                        item Details
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true" class="text-danger"
                                                            title="Close">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body mt-2 mb-2 text-center">
                                                    <h4 class="text-center">{{ $item->title }}</h4>
                                                    <span class="font-italic">{{ $item->date->format('F d, Y') }}
                                                    </span>
                                                    <p class="text-center text-justify mt-3">{{ $item->content }}
                                                    </p>
                                                </div>
                                                {{-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary float-right"
                                                        data-dismiss="modal">Close</button>
                                                </div> --}}
                        </div>
                    </div>
                </div>
                {{-- <div class="modal fade" id="confirmationModal{{ $item->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="confirmationModalLabel{{ $item->id }}" aria-hidden="true"
                    data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content modal-static">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmationModalLabel{{ $item->id }}">Confirm Deletion
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body mt-2 mb-2 text-center">
                                <i class="fas fa-exclamation-triangle fa-4x text-warning"></i>
                                <h3>Are you sure you want to delete this item?</h3>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <form action="{{ route('item.destroy', $item->id) }}" method="post">
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
            <div class="card-footer clearfix">
                {{ $pendingOwners->links() }}
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection

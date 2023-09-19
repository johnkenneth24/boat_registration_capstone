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
                                <h4>Announcements</h4>
                            </div>
                            <div class="card-tools">
                                <a href="{{ route('announcement.create') }}" class="btn btn-success"><span><i
                                            class="fa fa-plus" aria-hidden="true"></i></span> Add
                                    Announcements</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-responsive-md">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="min-width: 250px;" class="text-center">Subject</th>
                                        <th>Date</th>
                                        <th>Content</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($announcements as $announcement)
                                        <tr>
                                            <td>{{ $announcement->title }}</td>
                                            <td>{{ $announcement->date->format('M. d, Y') }}</td>
                                            <td>{{ Str::words($announcement->content, 5, $end = '...') }}</td>
                                            <td class="d-flex justify-content-center align-middle">
                                                <button type="button" class="btn btn-sm btn-warning mr-2" title="VIEW"
                                                    data-toggle="modal" data-target="#viewModal{{ $announcement->id }}">
                                                    VIEW
                                                </button>
                                                <a href="{{ route('announcement.edit', $announcement->id) }}"
                                                    class="btn btn-sm btn-primary mr-2">EDIT</a>
                                                <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                                    data-toggle="modal"
                                                    data-target="#confirmationModal{{ $announcement->id }}">
                                                    DELETE
                                                </button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="viewModal{{ $announcement->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="viewModalLabel{{ $announcement->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewModalLabel{{ $announcement->id }}">
                                                            Announcement Details
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true" class="text-danger"
                                                                title="Close">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body mt-2 mb-2 text-center">
                                                        <h4 class="text-center">{{ $announcement->title }}</h4>
                                                        <span
                                                            class="font-italic">{{ $announcement->date->format('F d, Y') }}
                                                        </span>
                                                        <p class="text-center text-justify mt-3">
                                                            {{ $announcement->content }}
                                                        </p>
                                                    </div>
                                                    {{-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary float-right"
                                                        data-dismiss="modal">Close</button>
                                                </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="confirmationModal{{ $announcement->id }}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="confirmationModalLabel{{ $announcement->id }}"
                                            aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content modal-static">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="confirmationModalLabel{{ $announcement->id }}">Confirm
                                                            Deletion
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body mt-2 mb-2 text-center">
                                                        <i class="fas fa-exclamation-triangle fa-4x text-warning"></i>
                                                        <h3>Are you sure you want to delete this announcement?</h3>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form
                                                            action="{{ route('announcement.destroy', $announcement->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No Data</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{ $announcements->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

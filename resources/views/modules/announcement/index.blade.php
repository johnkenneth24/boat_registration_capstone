@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Announcement</h4>
                            </div>
                            <div class="card-tools">
                                <a href="{{ route('announcement.create') }}" class="btn btn-success">Add Announcements</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-responsive-md">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="min-width: 250px;" class="text-center">Subject</th>
                                        <th>Announcement Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($announcements as $announcement)
                                        <tr>
                                            <td>{{ $announcement->title }}</td>
                                            <td>{{ $announcement->date }}</td>
                                            <td class="text-center">
                                                <a href="" class="btn btn-sm btn-success">View</a>
                                                <a href="" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No Data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="card-footer clearfix">
                            {{ $users->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

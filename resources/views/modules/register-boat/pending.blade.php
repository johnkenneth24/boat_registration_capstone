@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <x-success></x-success>
                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="card-title">
                                @role('staff')
                                    <h4>Pending Boat Registrations</h4>
                                @endrole
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-responsive-md  table-sm">
                                <thead class="thead-dark">
                                    <tr class="text-center align-middle">
                                        <th>Registration No.</th>
                                        @role('staff')
                                            <th>Owner</th>
                                        @endrole
                                        <th>Date of Registration</th>
                                        {{-- @role('user') --}}
                                        <th>Status</th>
                                        {{-- @endrole --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pendingBoats as $pBoats)
                                        <tr class="text-center align-middle">
                                            <td>{{ $pBoats->registration_no }}</td>
                                            @role('staff')
                                                <td>{{ $pBoats->ownerInfo->fullname }}</td>
                                            @endrole

                                            <td>{{ date('M. d, Y', strtotime($pBoats->registration_date)) }}</td>
                                            <td>{{ $pBoats->status }}</td>
                                            <td class="">
                                                <a href="#" class="btn btn-sm btn-warning">Process</a>
                                                <a href="#" class="btn btn-sm btn-success">View</a>
                                                {{-- <a href="" class="btn btn-sm btn-primary">Edit</a> --}}
                                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{ $pendingBoats->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

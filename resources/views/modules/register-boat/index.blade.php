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
                                @role('user')
                                    <h4>Boat Registration</h4>
                                @endrole
                                @role('staff')
                                    <h4>Registered Boats</h4>
                                @endrole
                            </div>
                            @role('user')
                                <div class="card-tools">
                                    <a href="{{ route('reg-boat.create') }}" class="btn btn-success">Create Registration</a>
                                </div>
                            @endrole
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
                                        @role('user')
                                            <th>Status</th>
                                        @endrole
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($registeredBoats as $rBoats)
                                        <tr class="text-center align-middle">
                                            <td>{{ $rBoats->registration_no }}</td>
                                            @role('staff')
                                                <td>{{ $rBoats->ownerInfo->fullname }}</td>
                                            @endrole

                                            <td>{{ date('M. d, Y', strtotime($rBoats->registration_date)) }}</td>
                                            @role('user')
                                                <td>{{ $rBoats->status }}</td>
                                            @endrole
                                            <td class="">
                                                {{-- <a href="{{ route('reg-boat.process') }}"
                                                    class="btn btn-sm btn-info">Process</a> --}}
                                                <a href="{{ route('reg-boat.show', $rBoats->id) }}"
                                                    class="btn btn-sm btn-success">View</a>
                                                <a href="{{ route('reg-boat.edit', $rBoats->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{ $registeredBoats->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

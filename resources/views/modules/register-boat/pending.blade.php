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
                                {{-- @role('staff|admin') --}}
                                <h4>Pending Boat Registrations</h4>
                                {{-- @endrole --}}
                            </div>
                            <div class="card-tools d-flex justify-content-end mb-0">
                                <div class="d-sm-none d-md-block">
                                    <form action="{{ route('reg-boat.pending') }}" method="get">
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
                                                <a href="{{ route('reg-boat.view', $pBoats->id) }}"
                                                    class="btn btn-sm btn-primary">View details</a>
                                                <a href="{{ route('reg-boat.approve', $pBoats->id) }}"
                                                    class="btn btn-sm btn-success">Approve</a>
                                                <a href="{{ route('reg-boat.disapprove', $pBoats->id) }}"
                                                    class="btn btn-sm btn-danger">Disapprove</a>
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

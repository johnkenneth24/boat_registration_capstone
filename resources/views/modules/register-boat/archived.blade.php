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
                                <h4>Archived Boat Registrations</h4>
                            </div>
                            <div class="card-tools d-flex justify-content-end mb-0">
                                <div class="d-sm-none d-md-block">
                                    <form action="{{ route('reg-boat.archived') }}" method="get">
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
                                    @forelse ($archivedBoats as $arcBoats)
                                        <tr class="text-center align-middle">
                                            <td>{{ $arcBoats->registration_no }}</td>
                                            @role('staff')
                                                <td>{{ $arcBoats->ownerInfo->fullname }}</td>
                                            @endrole

                                            <td>{{ date('M. d, Y', strtotime($arcBoats->registration_date)) }}</td>
                                            <td>{{ $arcBoats->status }}</td>
                                            <td class="">
                                                <a href="{{ route('reg-boat.view', $arcBoats->id) }}"
                                                    class="btn btn-sm btn-primary">View details</a>
                                                <a href="{{ route('reg-boat.approve', $arcBoats->id) }}"
                                                    class="btn btn-sm btn-success">Approve</a>
                                                <a href="{{ route('reg-boat.disapprove', $arcBoats->id) }}"
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
                            {{ $archivedBoats->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <x-success></x-success>
                    <div class="card  card-outline card-warning mt-5 shadow-lg">
                        <div class="card-header pb-0">
                            <div class="card-title align-middle mb-0">
                                @role('staff|admin')
                                    <h4>Walk In Registered Boats</h4>
                                @endrole
                            </div>
                            @role('admin|staff')
                                <div class="card-tools d-flex justify-content-end">
                                    <div class="d-sm-none d-md-block">
                                        <form action="{{-- route('reg-boat.index') --}}" method="get">
                                            @csrf
                                            <div class="form-group">
                                                <input class="form-control form-control-md d-sm-none d-md-block mr-3"
                                                    type="search" placeholder="Search..." name="search" style="width: 300px;"
                                                    autofocus>
                                            </div>
                                        </form>
                                    </div>
                                    <div>
                                        <a href="{{ route('walk-in.create') }}" class="btn btn-success mb-1"> <span><i class="fa fa-plus"
                                                    aria-hidden="true"></i></span>
                                            Create Registration (Walk-in)</a>
                                    </div>
                                </div>
                            @endrole
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-sm">
                                <thead class="thead-dark">
                                    <tr class="text-center align-middle">
                                        <th>Registration No.</th>
                                        <th>Vessel Name</th>
                                        @role('staff|admin')
                                            <th>Owner</th>
                                        @endrole
                                        <th>Date of Registration</th>
                                        {{---- @role('user') ----}}
                                        <th>Status</th>
                                        {{---- @endrole ----}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @forelse ($registeredBoats as $rBoats) --}}
                                        <tr class="text-center align-middle">
                                            <td>{{-- $rBoats->registration_no --}}</td>
                                            <td>{{-- $rBoats->boat->vessel_name ?? '' --}}</td>
                                            @role('staff|admin')
                                                <td>{{-- $rBoats->ownerInfo->fullname --}}</td>
                                            @endrole

                                            <td>{{-- date('M. d, Y', strtotime($rBoats->registration_date)) --}}</td>
                                            {{---- @role('user') ----}}
                                            <td>{{-- $rBoats->status --}}</td>
                                            {{---- @endrole ----}}
                                            <td class="">
                                                {{---- <a href="{{-- route('reg-boat.process') }}"
                                                    class="btn btn-sm btn-info">Process</a> --}}
                                                <a href="{{-- route('reg-boat.show', $rBoats->id) --}}"
                                                    class="btn btn-sm btn-success">View</a>
                                                <a href="{{-- route('reg-boat.edit', $rBoats->id) --}}"
                                                    class="btn btn-sm btn-primary">Edit</a>

                                                <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                                    data-toggle="modal"
                                                    data-target="#confirmationModal{{-- $rBoats->id --}}">
                                                    DELETE
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="confirmationModal{{-- $rBoats->id --}}" tabindex="-1"
                                            role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true"
                                            data-backdrop="static">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content modal-static">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body mt-2 mb-2 text-center">
                                                        <i class="fas fa-exclamation-triangle fa-4x text-warning"></i>
                                                        <h3>Are you sure you want to delete this boat record? This cannot be
                                                            undone.</h3>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form action="{{-- route('reg-boat.destroy', $rBoats->id) --}}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- @empty --}}
                                        <tr>
                                            <td colspan="5" class="text-center">No data available</td>
                                        </tr>
                                    {{-- @endforelse --}}
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{-- $registeredBoats->links() --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

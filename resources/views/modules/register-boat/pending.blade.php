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
                                <h4>Pending Boat Registrations</h4>
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
                                        <th>Status</th>
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
                                                <button type="button" class="btn btn-sm btn-success" title="Approve"
                                                    data-toggle="modal"
                                                    data-target="#confirmationApprove{{ $pBoats->id }}">
                                                    APPROVE
                                                </button>

                                                <button type="button" class="btn btn-sm btn-danger" title="Disapprove"
                                                    data-toggle="modal"
                                                    data-target="#confirmationDisapprove{{ $pBoats->id }}">
                                                    DISAPPROVE
                                                </button>
                                            </td>
                                        </tr>
                                        {{-- confirmationDisapprove --}}
                                        <div class="modal fade" id="confirmationDisapprove{{ $pBoats->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel"
                                            aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content modal-static">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmationModalLabel">Confirm
                                                            Disapproval
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body mt-2 mb-2 text-center">
                                                        <i class="fas fa-exclamation-triangle fa-4x text-warning mb-3"></i>
                                                        <h3>Are you sure you want to disapprove this registration?</h3>
                                                        <span class="text-danger fw-bold">Note: This cannot be
                                                            undone.</span>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-around">
                                                        <button type="button" class="btn btn-secondary px-5 rounded-3"
                                                            data-dismiss="modal">Cancel</button>
                                                        <a href="{{ route('reg-boat.disapprove', $pBoats->id) }}"
                                                            class="btn btn-danger px-5 rounded-3">Yes, Disapprove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- confirmApprove --}}
                                        <div class="modal fade" id="confirmationApprove{{ $pBoats->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true"
                                            data-backdrop="static">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content modal-static">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmationModalLabel">Confirm
                                                            Approval
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body mt-2 mb-2 text-center">
                                                        <i class="fas fa-question fa-4x text-secondary mb-3"></i>
                                                        <h3>Are you sure you want to Approve this registration?</h3>
                                                        {{-- <span class="text-danger">Note: This cannot be undone.</span> --}}
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-around">
                                                        <button type="button" class="btn btn-secondary px-5 rounded-3"
                                                            data-dismiss="modal">Cancel</button>
                                                        <a href="{{ route('reg-boat.approve', $pBoats->id) }}"
                                                            class="btn btn-success px-5 rounded-3">Yes, Approve</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

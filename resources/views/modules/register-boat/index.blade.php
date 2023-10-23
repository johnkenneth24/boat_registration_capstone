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
                                @role('user')
                                    @if ($ownerInfo != null)
                                        <h4>Boat Registration</h4>
                                    @endif
                                @endrole
                                @role('staff|admin')
                                    <h4>Registered Boats</h4>
                                @endrole
                            </div>
                            @role('admin|staff')
                                <div class="card-tools d-flex justify-content-end">
                                    <div class="d-sm-none d-md-block">
                                        <form action="{{ route('reg-boat.index') }}" method="get">
                                            @csrf
                                            <div class="form-group">
                                                <input class="form-control form-control-md d-sm-none d-md-block mr-3"
                                                    type="search" placeholder="Search..." name="search" style="width: 300px;"
                                                    autofocus>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endrole
                            @role('user')
                                @if ($ownerInfo == null)
                                    <div class="alert shadow alert-custom shadow bg-warning fade show d-flex justify-content-start"
                                        role="alert">
                                        <div class="alert-icon me-2"><i class="fas fa-exclamation-triangle"></i></div>
                                        <div class="alert-text">Please complete owner information before proceeding with the
                                            registration. <a href="{{ route('owner-info.index') }}"
                                                class="text-black fw-bold">Click
                                                here</a> to edit owner information.
                                        </div>
                                    </div>
                                @else
                                    <div class="card-tools">
                                        <a href="{{ route('reg-boat.create') }}" class="btn btn-success mb-1 mt-0"> <span><i
                                                    class="fa fa-plus mr-2 mb-1" aria-hidden="true"></i></span>Create
                                            Registration</a>
                                    </div>
                                @endif
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
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($registeredBoats as $rBoats)
                                        <tr class="text-center justify-content-between">
                                            <td class="align-middle">{{ $rBoats->registration_no }}</td>
                                            <td class="align-middle">{{ $rBoats->boat->vessel_name ?? '' }}</td>
                                            @role('staff|admin')
                                                <td class="align-middle">{{ $rBoats->ownerInfo->fullname }}</td>
                                            @endrole
                                            <td class="align-middle">
                                                {{ date('M. d, Y', strtotime($rBoats->registration_date)) }}</td>
                                            <td class="align-middle">
                                                @if ($rBoats->status == 'registered')
                                                    @if (\Carbon\Carbon::parse($rBoats->approved_at)->endOfYear() < \Carbon\Carbon::now())
                                                        <span class="badge rounded-2 badge-danger px-3 py-2 opacity-75"
                                                            style="font-size: 0.8rem;">
                                                            Expired
                                                        </span>
                                                    @else
                                                        <span class="badge rounded-2 badge-success px-3 py-2 opacity-75"
                                                            style="font-size: 0.8rem;">
                                                            {{ ucFirst($rBoats->status) }}
                                                        </span>
                                                    @endif
                                                @elseif ($rBoats->status == 'pending')
                                                    <span class="badge rounded-2 badge-warning px-3 py-2 opacity-75"
                                                        style="font-size: 0.8rem;">
                                                        {{ ucFirst($rBoats->status) }}
                                                    </span>
                                                @elseif ($rBoats->status == 'disapproved')
                                                    <span class="badge rounded-2 badge-danger px-3 py-2 opacity-75"
                                                        style="font-size 0.8rem;">
                                                        {{ ucFirst($rBoats->status) }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="align-middle d-flex justify-content-end gap-2">
                                                {{-- @unlessrole('user') --}}
                                                @if ($rBoats->status == 'registered')
                                                    @if (\Carbon\Carbon::parse($rBoats->approved_at)->endOfYear() < \Carbon\Carbon::now())
                                                        <a href="{{-- route('reg-boat.show',$rBoats->id) --}}"
                                                            class="btn btn-sm btn-dark">RENEW</a>
                                                    @endif
                                                    @livewire('reg-boat.export', ['rBoats' => $rBoats], key($rBoats->id))
                                                @endif
                                                {{-- @endunlessrole --}}
                                                {{-- <a href="{{ route('reg-boat.process') }}"
                                                    class="btn btn-sm btn-info">Process</a> --}}
                                                <a href="{{ route('reg-boat.show', $rBoats->id) }}"
                                                    class="btn btn-sm btn-success">VIEW</a>
                                                @role('user')
                                                    <a href="{{ route('reg-boat.edit', $rBoats->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                @endrole
                                                <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                                    data-toggle="modal"
                                                    data-target="#confirmationModal{{ $rBoats->id }}">
                                                    DELETE
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="confirmationModal{{ $rBoats->id }}" tabindex="-1"
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
                                                        <i class="fas fa-exclamation-triangle fa-4x text-warning mb-3"></i>
                                                        <h3>Are you sure you want to delete this boat record? This cannot be
                                                            undone.</h3>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('reg-boat.destroy', $rBoats->id) }}"
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
                                            <td colspan="6" class="text-center">No data available</td>
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

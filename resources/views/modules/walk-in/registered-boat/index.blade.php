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
                                    <h4>{{ $walkin->fullname }} | Registered Boats</h4>
                                @endrole
                            </div>
                            @role('admin|staff')
                                <div class="card-tools d-flex justify-content-end">
                                    <div class="d-sm-none d-md-block">

                                    </div>
                                    <div>
                                        <a href="{{ route('walkin-regboat.create' , $walkin->id) }}" class="btn btn-success mb-1"> <span><i class="fa fa-plus"
                                                    aria-hidden="true"></i></span>
                                            Create Registration Boat (Walk-in)</a>
                                    </div>
                                </div>
                            @endrole
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-sm">
                                <thead class="thead-dark">
                                    <tr class=" align-middle">
                                        <th>Registration No.</th>
                                        <th>Vessel Name</th>
                                        <th>Vessel Type</th>
                                        <th>Registration Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($walkin_reg_boat as $wrg)
                                        <tr class=" align-middle">
                                            <td>{{ $wrg->registration_no }}</td>
                                            <td>{{ $wrg->vessel_name }}</td>
                                            <td>{{ $wrg->vessel_type }}</td>
                                            <td>{{ $wrg->registration_date->format('F d, Y') }}</td>
                                            <td class="">
                                                <a href="" class="btn btn-sm btn-primary">EXPORT</a>
                                                <a href="{{-- route('walk-in.create',$wrg->id) --}}"
                                                    class="btn btn-sm btn-success">VIEW</a>
                                                <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                                    data-toggle="modal"
                                                    data-target="#confirmationModal{{$wrg->id }}">
                                                    DELETE
                                                </button>
                                            </td>
                                        </tr>
                                        <! Modal >
                                        <div class="modal fade" id="confirmationModal{{ $wrg->id }}" tabindex="-1"
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
                                                        <form action="{{ route('walk-in.destroy', $wrg->id) }}"
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
                                            <td colspan="5" class="text-center">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                           {{-- {{ $walk_in->links()}} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

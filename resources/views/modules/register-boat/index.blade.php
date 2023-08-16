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
                                <h4>Boat Registration</h4>
                            </div>
                            <div class="card-tools">
                                <a href="{{ route('form1.create') }}" class="btn btn-success">Create Registration</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-responsive-md  table-sm">
                                <thead class="thead-dark">
                                    <tr class="text-center align-middle">
                                        <th>Registration No.</th>
                                        <th>Date of Registration</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($registeredBoats as $rBoats)
                                        <tr class="text-center align-middle">
                                            <td>{{ $rBoats->registration_no }}</td>
                                            <td>{{ date('M. d, Y', strtotime($rBoats->registration_date)) }}</td>
                                            <td>{{ $rBoats->status }}</td>
                                            <td class="">
                                                <a href="{{ route('reg-boat.process') }}"
                                                    class="btn btn-sm btn-info">Process</a>
                                                <a href="" class="btn btn-sm btn-success">View</a>
                                                <a href="" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="" class="btn btn-sm btn-danger">Delete</a>
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

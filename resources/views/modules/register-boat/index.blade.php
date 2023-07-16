@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Register Boat</h4>
                            </div>
                            <div class="card-tools">
                                <a href="{{ route('reg-boat.create') }}" class="btn btn-success">Create Registration</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-responsive-md">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID No.</th>
                                        <th>Date Registration</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>001</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td class="">
                                                <a href="{{ route('reg-boat.process') }}" class="btn btn-sm btn-info">Process</a>
                                                <a href="" class="btn btn-sm btn-success">View</a>
                                                <a href="" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
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

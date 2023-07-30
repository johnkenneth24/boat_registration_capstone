@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'staff')
                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>All Registered Boat</h4>
                            </div>
                            {{-- <div class="card-tools">
                                <a href="{{ route('reg-boat.create') }}" class="btn btn-success">Create Registration</a>
                            </div> --}}
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-responsive-md">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Serial Number</th>
                                        <th>Owner Full Name</th>
                                        <th>Date Registered</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>001</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td class="">
                                                <a href="" class="btn btn-sm btn-success">View</a>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="card-footer clearfix">
                            {{ $users->links() }}
                        </div> --}}
                    </div>
                    @else
                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Registered Boat</h4>
                            </div>
                            {{-- <div class="card-tools">
                                <a href="{{ route('reg-boat.create') }}" class="btn btn-success">Create Registration</a>
                            </div> --}}
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-responsive-md">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Serial Number</th>
                                        <th>Date Registered</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>001</td>
                                            <td>test</td>
                                            <td class="">
                                                <a href="" class="btn btn-sm btn-success">View</a>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="card-footer clearfix">
                            {{ $users->links() }}
                        </div> --}}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
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
                                        <th>Registration Number</th>
                                        <th>Owner Full Name</th>
                                        <th>Date Registered</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($registeredBoats as $item)
                                        <tr>
                                            <td>{{ $item->registration_no }}</td>
                                            <td>{{ implode(' ', array_filter([$item->owner->salutation, $item->owner->first_name, $item->owner->middle_name, $item->owner->lastname, $item->owner->suffix])) }}
                                            </td>
                                            <td>{{ date('F d, Y', strtotime($item->registration_date)) }}</td>
                                            <td class="">
                                                <a href="" class="btn btn-sm btn-success">View</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No Registered Boat</td>
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

@extends('layouts.app')

@section('content')
    -
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-start d-flex align-items-center">
                            <img src="{{ asset('images/kindpng_3354824.png') }}" alt="books" height="50px">
                            <h4 class="text-left text-uppercase font-weight-bolder ml-2 mr-2">Have A Nice Day</h4>
                            <h4 class="text-left text-uppercase font-weight-bolder text-primary">
                                {{ Auth::user()->username }}!</h4>
                        </div>
                    </div>
                </div>
            </div>
            @unlessrole('user')
                {{-- @if (auth()->user()->role != 'user') --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body card-bcc">
                                <p class="card-text">
                                    {{-- {{ __('You are logged in!') }} --}}
                                </p>
                                <div class="row">
                                    <div class="col-md-3 col-6">
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3>{{ $renewalCount }}</h3>
                                                <p>Renewal</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-sync-alt" aria-hidden="true"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-danger">
                                            <div class="inner">
                                                <h3>{{ $registeredCount }}</h3>
                                                <p>Registered Boats</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-ship" aria-hidden="true"></i>
                                            </div>
                                            <a href="{{ route('reg-boat.index') }}" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                                <h3>{{ $ownerCount }}</h3>
                                                <p>Registered Owners</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-user-check" aria-hidden="true"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                                <h3>{{ $expiredCount }}</h3>
                                                <p>Expired Registrations</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endunlessrole
            @unlessrole('admin')
                {{-- @if (auth()->user()->role != 'admin')n --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="card" style="height: 335px;">
                            <div class="card-header border-0">
                                <h3 class="card-title">Pending Registrations</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr class="text-center align-middle">
                                            <th>Serial Number</th>
                                            <th>Date Registered</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pendings as $pending)
                                            <tr class="text-center align-middle">
                                                <td>
                                                    <a href="{{ route('reg-boat.index') }}">
                                                        {{ $pending->registration_no }}
                                                    </a>
                                                </td>
                                                <td>{{ date('M. d, Y', strtotime($pending->registration_date)) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="text-center">No Pending Registrations</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="height: 335px;">
                            <div class="card-header border-0">
                                <h3 class="card-title">Announcements</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr class="text-center align-middle">
                                            <th>Subject</th>
                                            <th>Announcement Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($announcements as $announcement)
                                            <tr class="text-center align-middle">
                                                <td>{{ $announcement->title }}</td>
                                                <td>{{ $announcement->date->format('F d, Y') }}</td>
                                                <td><button type="button" class="btn btn-sm btn-primary mr-2" title="VIEW"
                                                        data-toggle="modal" data-target="#viewModal{{ $announcement->id }}">
                                                        VIEW
                                                    </button></td>
                                            </tr>
                                            <div class="modal fade" id="viewModal{{ $announcement->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="viewModalLabel{{ $announcement->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="viewModalLabel{{ $announcement->id }}">
                                                                Announcement Details
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true" class="text-danger"
                                                                    title="Close">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body mt-2 mb-2 text-center">
                                                            <h4 class="text-center">{{ $announcement->title }}</h4>
                                                            <span
                                                                class="font-italic">{{ $announcement->date->format('F d, Y') }}
                                                            </span>
                                                            <p class="text-center text-justify mt-3">
                                                                {{ $announcement->content }}
                                                            </p>
                                                        </div>
                                                        {{-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary float-right"
                                                        data-dismiss="modal">Close</button>
                                                </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">No Announcements</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endunlessrole
            {{-- @endif --}}

            {{-- @if (auth()->user()->role != 'user')
                <div class="row">
                    <div class="col-md-6">

                    </div>
                </div>
            @endif --}}
        </div>
    </div>
@endsection

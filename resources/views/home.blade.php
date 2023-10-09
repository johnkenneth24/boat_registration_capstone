@extends('layouts.app')

@section('content')
    <div class="content mt-3 mb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @role('user')
                        @if (!$owner_info)
                            <div class="alert alert-custom shadow bg-warning fade show d-flex justify-content-start"
                                role="alert">
                                <div class="alert-icon me-2"><i class="fas fa-exclamation-triangle"></i></div>
                                <div class="alert-text">Please complete owner information before proceeding with the
                                    registration. <a href="{{ route('owner-info.index') }}" class="text-black fw-bold">Click
                                        here</a> for
                                    more information.
                                </div>
                            </div>
                        @endif
                    @endrole
                    <div class="card shadow">
                        <div class="card-body text-start d-flex align-items-center">
                            <img src="{{ asset('images/kindpng_3354824.png') }}" alt="books" height="50px">
                            <h4 class="text-left text-uppercase font-weight-bolder ml-2 mr-2">Have A Nice Day</h4>
                            <h4 class="text-left text-uppercase font-weight-bolder text-primary">
                                {{ Auth::user()->username }}!</h4>
                        </div>
                    </div>
                    @role('user')
                        @if ($expiredCount > 0)
                            <div class="alert alert-custom shadow bg-danger fade show d-flex justify-content-start"
                                role="alert">
                                <div class="alert-icon me-2"><i class="fas fa-exclamation-triangle"></i></div>
                                <div class="alert-text">You have <strong>{{ $expiredCount }}</strong> expired registration/s. <a
                                        href="javascript:void(0)" class="text-black fw-bold">Click
                                        here</a> to renew your registration.
                                </div>
                            </div>
                        @endif
                    @endrole
                </div>
            </div>
            @unlessrole('user')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-body card-bcc">
                                <p class="card-text">
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
                                            <a href="{{ route('reg-boat.index') }}" class="small-box-footer">More info <i
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
                                            <a href="{{ route('owner-info.registered-owners') }}" class="small-box-footer">More
                                                info <i class="fas fa-arrow-circle-right"></i></a>
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
                                            <a href="{{ route('reg-boat.index') }}" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endunlessrole
            @unlessrole('admin')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow" style="height: 335px;">
                            <div class="card-header border-0">
                                <h3 class="card-title fw-bold">Pending Registrations</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover table-valign-middle">
                                    <thead>
                                        <tr class="align-middle">
                                            <th>Registration Number</th>
                                            <th>Registration Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pendings as $pending)
                                            <tr class="align-middle">
                                                <td>
                                                    @role('user')
                                                        <a href="{{ route('reg-boat.index') }}">
                                                            {{ $pending->registration_no }}
                                                        </a>
                                                    @endrole
                                                    @role('staff|admin')
                                                        <a href="{{ route('reg-boat.pending') }}">
                                                            {{ $pending->registration_no }}
                                                        </a>
                                                    @endrole
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
                        <div class="card shadow " style="height: 335px;">
                            <div class="card-header border-0">
                                <h3 class="card-title fw-bold">Announcements</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover table-valign-middle">
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
                                                            <h5 class="modal-title"
                                                                id="viewModalLabel{{ $announcement->id }}">
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
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">No Announcements Yet!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endunlessrole
        </div>
    </div>
@endsection

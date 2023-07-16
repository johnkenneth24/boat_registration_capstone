@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        {{-- <div class="container-fluid">
            <h1 class="m-0">Dashboard</h1>

        </div><!-- /.container-fluid --> --}}
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        @if (auth()->user()->role != 'user')
                            <div class="card-body card-bcc">
                                <p class="card-text">
                                    {{-- {{ __('You are logged in!') }} --}}
                                </p>
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3>67</h3>
                                                <p>Renewal</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-sync-alt" aria-hidden="true"></i>
                                            </div>
                                            <a href="{{-- route('books.index') --}}" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-danger">
                                            <div class="inner">
                                                <h3>46</h3>
                                                <p>Registered Boats</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-ship" aria-hidden="true"></i>
                                            </div>
                                            <a href="{{-- route('users.index') --}}" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                                <h3>18</h3>
                                                <p>Registered Owners</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-user-check" aria-hidden="true"></i>
                                            </div>
                                            <a href="{{-- route('borrowers.index') --}}" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                                <h3>11</h3>
                                                <p>Expired Registrations</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                                            </div>
                                            <a href="{{-- route('borrowers.index') --}}" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body card-bcc text-center">
                                    <img src="{{ asset('images/kindpng_3354824.png') }}" alt="books" height="150px">
                                    <h5 class="text-left text-uppercase font-weight-bolder mb-0">Welcome Back!</h5>
                                    <h3 class="text-left text-uppercase font-weight-bolder text-primary">
                                        {{ Auth::user()->username }}</h3>
                                    <h6 class="text-left text-uppercase">ID Number:
                                        <span class="font-weight-bold">{{ Auth::user()?->id_number ?? '' }}</span>
                                    </h6>
                                    <h6 class="text-left text-uppercase">Email: <span
                                            class="text-lowercase font-weight-bold">{{ Auth::user()->email }}</span> </h6>
                                    <h6 class="text-left text-uppercase">Mobile Number: <span
                                            class="text-lowercase font-weight-bold">{{ Auth::user()?->contact_no ?? '' }}</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        @if (auth()->user()->role != 'user')
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body card-bcc">
                                        <h3 class="text-center">Analysis here</h3>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        @endsection

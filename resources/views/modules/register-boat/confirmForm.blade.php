@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-warning mt-5">
                        <div class="card-header m-0 mb-0">
                            <div class="card-title">
                                <h4 class="text-uppercase">Step 3 | Confirm submitted details</h4>
                            </div>
                        </div>
                        <div class="card-body mt-0">
                            <div class="d-flex justify-content-center mb-3">
                                <div class="progresses">
                                    <div class="steps">
                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                    </div>
                                    <span class="line"></span>
                                    <div class="steps">
                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                    </div>
                                    <span class="line"></span>
                                    <div class="steps">
                                        <span class="font-weight-bolder">3</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row border border-secondary">
                                <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                    <h6 class="font-weight-bolder text-white m-0">Registration Details</h6>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-inline-block font-weight-bold" style="width: 40%;">
                                        Registration
                                        No.:</div> {{ $regBoat->registration_no }} <br>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-inline-block font-weight-bold" style="width: 40%;">
                                        Registration Date:
                                    </div>{{ date('F d, Y', strtotime($regBoat->registration_date)) }} <br>
                                </div>
                                <div class="col-md-12">
                                    <hr class="dark horizontal border border-dark my-1">
                                </div>
                                <div class="col-md-6">
                                    <div class="d-inline-block font-weight-bold" style="width: 40%;">
                                        Fullname:
                                    </div>
                                    {{ implode(' ', array_filter([$regBoat->salutation, $regBoat->first_name, $regBoat->middle_name, $regBoat->lastname, $regBoat->suffix])) }}
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-inline-block font-weight-bold" style="width: 40%;">
                                        Gender:
                                    </div>{{ $regBoat->gender }}
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-inline-block font-weight-bold" style="width: 40%;">
                                        Address:
                                    </div>{{ $regBoat->address }}
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-inline-block font-weight-bold" style="width: 40%;">
                                        Resident since:
                                    </div>{{ date('F  Y', strtotime($regBoat->resident_since)) }}
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-inline-block font-weight-bold" style="width: 40%;">
                                        Nationality:
                                    </div>{{ $regBoat->nationality }}
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-inline-block font-weight-bold" style="width: 40%;">
                                        Civil Status:
                                    </div>{{ $regBoat->civil_status }}
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-inline-block font-weight-bold" style="width: 40%;">
                                        Contact Number:
                                    </div>{{ $regBoat->contact_no }}
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-inline-block font-weight-bold" style="width: 40%;">
                                        Birthdate:
                                    </div>{{ $regBoat->birthdate }}
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('styles')
    <style>
        tr th {
            /* text-align: right; */
            width: 20%;
            /* display: flex; */
            /* align-items: center; */
        }
    </style>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <x-success></x-success>

                    <div class="card mt-5">
                        <div class="card-body mt-0">
                            <div class="row border border-secondary">
                                <div class="col-md-12 mt-0 mb-2 py-1 bg-dark">
                                    <h6 class="font-weight-bolder text-white m-0">Personal Information</h6>
                                </div>
                                <div class="col-md-3 d-none d-md-block">
                                    <img src="{{ asset('images/per.png') }}" class="img-fluid mt-4 px-3" alt="personal info"
                                        title="Derived from: https://www.flaticon.com/free-icons/personal-information">
                                </div>
                                <div class="col-md-9">
                                    {{-- <table class="table table-sm table-borderless table-hover table-responsive-sm">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Fullname:</th>
                                                <td>
                                                    {{ $ownerInfo->full_name ?? '' }}
                                                </td>
                                                <th scope="row">Gender:</th>
                                                <td>{{ $ownerInfo->gender ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Address:</th>
                                                <td>{{ $ownerInfo->address ?? '' }}</td>
                                                <th scope="row">Resident Since:</th>
                                                <td>{{ $ownerInfo?->resident_since?->format('F Y') ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Nationality:</th>
                                                <td>{{ $ownerInfo->nationality ?? '' }}</td>
                                                <th scope="row">Civil Status:</th>
                                                <td>{{ $ownerInfo->civil_status ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Contact Number:</th>
                                                <td>{{ $ownerInfo->contact_no ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Birthdate:</th>
                                                <td>{{ $ownerInfo?->birthdate?->format('F d, Y') ?? '' }}</td>
                                                <th scope="row">Age:</th>
                                                <td>{{ $ownerInfo->age ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Birthplace:</th>
                                                <td>{{ $ownerInfo->birthplace ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Educational Background:</th>
                                                <td>{{ $ownerInfo->educ_background ?? ($ownerInfo->other_educ_background ?? '') }}
                                                </td>
                                                <th scope="row">No. of Children:</th>
                                                <td>{{ $ownerInfo->children_count ?? 'none' }}</td>
                                            </tr>
                                            <tr class="table-danger">
                                                <th scope="row">Emergency contact person:</th>
                                                <td>{{ $ownerInfo->emContact_person ?? '' }}</td>
                                                <th scope="row">Relationship</th>
                                                <td>{{ $ownerInfo->emRelationship ?? '' }}</td>
                                            </tr>
                                            <tr class="table-danger">
                                                <th scope="row">Contact no.:</th>
                                                <td>{{ $ownerInfo->emContact_no ?? '' }}</td>
                                                <th scope="row">Address</th>
                                                <td>{{ $ownerInfo->emAddress ?? '' }}</td>
                                            </tr>
                                        </tbody>
                                    </table> --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="fw-bold  mb-0">Fullname:</label>
                                                <input type="text" class="form-control form-control-sm my-0 pt-0"
                                                    readonly value="{{ $ownerInfo?->fullname ?? auth()->user()->name }}">
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="fw-bold mb-0">Birthdate:</label>
                                                    <input type="text" class="form-control form-control-sm my-0 pt-0"
                                                        readonly
                                                        value="{{ $ownerInfo?->birthdate?->format('F d, Y') ?? '' }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="fw-bold  mb-0">Age:</label>
                                                    <input type="text" class="form-control form-control-sm my-0 pt-0"
                                                        readonly value="{{ $ownerInfo?->age ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="fw-bold mb-0">Birthplace:</label>
                                                <input type="text" class="form-control form-control-sm my-0 pt-0"
                                                    readonly value="{{ $ownerInfo?->birthplace ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="fw-bold mb-0">Nationality:</label>
                                                <input type="text" class="form-control form-control-sm my-0 pt-0"
                                                    readonly value="{{ $ownerInfo?->nationality ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="fw-bold mb-0">Address:</label>
                                                <input type="text" class="form-control form-control-sm my-0 pt-0"
                                                    readonly value="{{ $ownerInfo?->address ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="fw-bold mb-0">Resident
                                                    since:</label>
                                                <input type="text" class="form-control form-control-sm my-0 pt-0"
                                                    readonly
                                                    value="{{ $ownerInfo?->resident_since?->format('F Y') ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="fw-bold mb-0">Educational
                                                        Background:</label>
                                                    @if ($ownerInfo?->educ_background === 'Others')
                                                        <input type="text" class="form-control form-control-sm my-0 pt-0"
                                                            readonly
                                                            value="{{ $ownerInfo?->other_educational_background ?? '' }}">
                                                    @else
                                                        <input type="text" class="form-control form-control-sm my-0 pt-0"
                                                            readonly
                                                            value="{{ $ownerInfo?->other_educational_background ?? ($ownerInfo?->educ_background ?? '') }}">
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="fw-bold mb-0">Sex:</label>
                                                    <input type="text" class="form-control form-control-sm my-0 pt-0"
                                                        readonly value="{{ $ownerInfo?->gender ?? '' }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="fw-bold  mb-0">Contact
                                                        No:</label>
                                                    <input type="text" class="form-control form-control-sm my-0 pt-0"
                                                        readonly value="{{ $ownerInfo?->contact_no ?? '' }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="fw-bold  mb-0">Marital
                                                        Status:</label>
                                                    <input type="text" class="form-control form-control-sm my-0 pt-0"
                                                        readonly value="{{ $ownerInfo?->civil_status ?? '' }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="fw-bold  mb-0">Number of
                                                        Children:</label>
                                                    <input type="text" class="form-control form-control-sm my-0 pt-0"
                                                        readonly value="{{ $ownerInfo?->children_count ?? '' }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="fw-bold text-danger  mb-0">Emergency
                                                        Contact Person:</label>
                                                    <input type="text" class="form-control form-control-sm my-0 pt-0"
                                                        readonly value="{{ $ownerInfo?->emContact_person ?? '' }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="fw-bold text-danger mb-0">Relationship:</label>
                                                    <input type="text" class="form-control form-control-sm my-0 pt-0"
                                                        readonly value="{{ $ownerInfo?->emRelationship ?? '' }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="fw-bold text-danger  mb-0">
                                                        Contact No.:</label>
                                                    <input type="text" class="form-control form-control-sm my-0 pt-0"
                                                        readonly value="{{ $ownerInfo?->emContact_no ?? '' }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="fw-bold text-danger  mb-0">Address:</label>
                                                    <input type="text" class="form-control form-control-sm my-0 pt-0"
                                                        readonly value="{{ $ownerInfo?->emAddress ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- insert button --}}
                                <div class="col-md-12 text-right">
                                    @if ($ownerInfo != null)
                                        <a href="{{ route('owner-info.adss', $ownerInfo->id ?? auth()->user()->id) }}"
                                            class="btn btn-success mb-2 me-2"> Add
                                            Beneficiaries
                                            for
                                            Insurance</a>
                                    @endif
                                    <a href="{{ route('owner-info.edit', $ownerInfo->id ?? auth()->user()->id) }}"
                                        class="btn col-md-2 mb-2 btn-primary">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

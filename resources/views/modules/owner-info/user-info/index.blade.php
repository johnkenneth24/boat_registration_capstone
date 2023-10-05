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
                                    <table class="table table-sm table-borderless table-hover table-responsive-sm">
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
                                    </table>
                                </div>
                                {{-- insert button --}}
                                <div class="col-md-12 text-right">
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

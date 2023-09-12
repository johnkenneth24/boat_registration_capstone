@extends('layouts.app')

@section('styles')
    <style>
        .col-md-12.text-center h5::before,
        .col-md-12.text-center h5::after {
            content: "";
            display: inline-block;
            border-top: 1px solid #646464;
            margin: 0 5px;
            vertical-align: middle;
        }

        /* Media query for small screens */
        @media (max-width: 767px) {

            .col-md-12.text-center h5::before,
            .col-md-12.text-center h5::after {
                width: 20%;
            }
        }

        /* Media query for larger screens */
        @media (min-width: 768px) {

            .col-md-12.text-center h5::before,
            .col-md-12.text-center h5::after {
                width: 30%;
            }
        }
    </style>
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-warning mt-5">
                        <div class="card-header m-0 mb-0">
                            <div class="card-title">
                                <h4 class="text-uppercase">Boat Registration</h4>
                            </div>
                            {{-- <div class="card-tools">
                                <a href="{{ route('reg-boat.index') }}" class="btn btn-danger">Cancel</a>
                            </div> --}}
                        </div>
                        <form action="{{ route('reg-boat.store') }}" method="post">
                            @csrf
                            <div class="card-body mt-0">
                                {{-- <div class="d-flex justify-content-center mb-3">
                                    <div class="progresses">
                                        <div class="steps">
                                            <span class="font-weight-bolder">1</span>
                                        </div>
                                        <span class="line inactive"></span>
                                        <div class="steps inactive">
                                            <span class="font-weight-bolder">2</span>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row border border-secondary">
                                    <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                        <h6 class="font-weight-bolder text-white m-0">Registration</h6>
                                    </div>
                                    <input type="hidden" name="owner_id" value="{{ $ownerInfo?->id ?: '' }}">
                                    <div class="form-group col-md-6">
                                        <label>Registration Number</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">IMS -</span>
                                            </div>
                                            <input type="text" name="registration_no"
                                                class="form-control form-control-sm" readonly required
                                                value="{{ $latestregNo }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Registration Date</label>
                                        <input type="date" name="registration_date" class="form-control form-control-sm"
                                            readonly value="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="col-md-12 mt-1 mb-2 py-1 bg-dark">
                                        <h6 class="font-weight-bolder text-white m-0">Boat Details</h6>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Name of Fishing Vessel <span class="text-danger">*</span></label>
                                        <input type="text" name="vessel_name"
                                            class="form-control form-control-sm @error('vessel_name') is-invalid @enderror"
                                            value="{{ old('vessel_name') }}" placeholder="Vessel Name (e.g., M.V. Gregorio)"
                                            required>
                                        @error('vessel_name')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Type of Fishing Vessel <span class="text-danger">*</span></label>
                                        <select name="vessel_type" required class="form-control form-control-sm">
                                            <option value="">--Please Select--</option>
                                            <option value="Motorized">Motorized</option>
                                            <option value="Non-Motorized">Non-Motorized</option>
                                        </select>
                                        @error('vessel_type')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Horsepower <span class="font-italic fw-normal">(required for Motorized Vessel
                                                only)</span></label>
                                        <input type="text" name="horsepower"
                                            class="form-control form-control-sm @error('horsepower') is-invalid @enderror"
                                            value="{{ old('horsepower') }}" placeholder="Horsepower (e.g., 100HP)">
                                        @error('horsepower')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 text-center fw-bold mx-0 px-0">
                                        <h5 class="mx-0 px-0">Dimension and Tonnages</h5>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Body Number <span class="text-danger">*</span></label>
                                        <input type="text" name="body_number"
                                            class="form-control form-control-sm @error('body_number') is-invalid @enderror"
                                            value="{{ old('body_number') }}" placeholder="Body number of the Vessel"
                                            required>
                                        @error('body_number')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Color <span class="text-danger">*</span></label>
                                        <input type="text" name="color"
                                            class="form-control form-control-sm @error('color') is-invalid @enderror"
                                            value="{{ old('color') }}" placeholder="Color (e.g., gray, dark-blue, yellow)"
                                            required>
                                        @error('color')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Length <span class="text-danger">*</span></label>
                                        <input type="text" name="length"
                                            class="form-control form-control-sm @error('length') is-invalid @enderror"
                                            value="{{ old('length') }}" placeholder="Length of the Vessel (in meters)"
                                            required>
                                        @error('length')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Breadth <span class="text-danger">*</span></label>
                                        <input type="text" name="breadth"
                                            class="form-control form-control-sm @error('breadth') is-invalid @enderror"
                                            value="{{ old('breadth') }}" placeholder="Breadth of the Vessel" required>
                                        @error('breadth')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Depth <span class="text-danger">*</span></label>
                                        <input type="text" name="depth"
                                            class="form-control form-control-sm @error('depth') is-invalid @enderror"
                                            value="{{ old('depth') }}" placeholder="Depth of the Vessel" required>
                                        @error('depth')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Gross Tonnage <span class="text-danger">*</span></label>
                                        <input type="text" name="gross_tonnage"
                                            class="form-control form-control-sm @error('gross_tonnage') is-invalid @enderror"
                                            value="{{ old('gross_tonnage') }}" placeholder="Gross Tonnage of the Vessel"
                                            required>
                                        @error('gross_tonnage')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Year Built <span class="text-danger">*</span></label>
                                        <input type="month" name="year_built"
                                            class="form-control form-control-sm @error('year_built') is-invalid @enderror"
                                            value="{{ old('year_built') }}"
                                            placeholder="Year Built when the vessel is built" required>
                                        @error('year_built')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Materials Used <span class="text-danger">*</span></label>
                                        <textarea type="text" name="materials_used" rows="3"
                                            class="form-control form-control-sm
                                            @error('materials_used') is-invalid @enderror"
                                            placeholder="Materials used in building the vessel" required>{{ old('materials_used') }}</textarea>
                                        @error('materials_used')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ route('reg-boat.index') }}" class="btn btn-danger col-md-2 mr-2">Cancel</a>
                                <button type="submit" class="btn btn-primary col-md-2">Submit</button>
                            </div>
                        </form>
                        {{-- <div class="overlay dark">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- 
@section('scripts')
  
@endsection --}}

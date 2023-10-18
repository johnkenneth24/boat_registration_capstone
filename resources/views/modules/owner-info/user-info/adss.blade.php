@extends('layouts.app')

@section('title', 'ADSS')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-warning mt-5">
                        <form action="{{ route('owner-info.adss-store') }}" method="post">
                            @csrf
                            <div class="card-body mt-0">
                                <div class="row border border-secondary">
                                    <div class="col-md-12 mt-0 mb-2 py-1 bg-dark">
                                        <h6 class="font-weight-bolder text-white m-0">Application for Accident and
                                            Dismemberment Security Scheme (ADS<sup>2</sup>)</h6>
                                    </div>
                                    <input type="hidden" name="owner_info_id" value="{{ $id ?? '' }}">
                                    <div class="form-group col-md-9">
                                        <label>Spouse Name</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('spouse_name') is-invalid @enderror"
                                            name="spouse_name" placeholder="Enter Spouse Name"
                                            value="{{ $adss?->spouse_name ?: old('spouse_name') }}">
                                        @error('spouse_name')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>No. of dependents <span class="text-danger">*</span></label>
                                        <input type="number" min="0" max="15"
                                            class="form-control form-control-sm text-right @error('number_dependent') is-invalid @enderror"
                                            name="number_dependent" required placeholder="0"
                                            value="{{ $adss?->number_dependent ?: old('number_dependent') }}">
                                        @error('number_dependent')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Employer Name <span class="text-danger">*</span></label>
                                        <input type="text" name="employer_name"
                                            class="form-control form-control-sm @error('employer_name') is-invalid @enderror"
                                            required value="{{ $adss?->employer_name ?: old('employer_name') }}"
                                            placeholder="Name of Employer">
                                        @error('employer_name')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Desired Coverage <span class="text-danger">*</span></label>
                                        <input type="text" name="desired_coverage"
                                            value="{{ $adss?->desired_coverage ?: old('desired_coverage') }}"
                                            class="form-control form-control-sm @error('desired_coverage') is-invalid @enderror)"
                                            required placeholder="Enter Desired Coverage">
                                        @error('desired_coverage')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Premium</label>
                                        <input type="text" name="premium"
                                            value="{{ $adss?->premium ?: old('premium') }}"
                                            class="form-control form-control-sm @error('premium') is-invalid @enderror"
                                            placeholder="Enter premium">
                                        @error('premium')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cover_from">Period of Cover From <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="cover_from"
                                            value="{{ $adss?->cover_from?->format('Y-m-d') ?: old('cover_from') }}"
                                            class="form-control-sm form-control @error('cover_from') is-invalid @enderror"
                                            min="{{ date('Y-m-d') }}" required>
                                        @error('cover_from')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Period of Cover To <span class="text-danger">*</span></label>
                                        <input type="date" name="cover_to" required
                                            value="{{ $adss?->cover_to?->format('Y-m-d') ?: old('cover_to') }}"
                                            class="form-control-sm form-control  @error('cover_to') is-invalid @enderror"
                                            min="{{ date('Y-m-d') }}">
                                        @error('cover_to')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-0 mb-2 py-1 bg-dark">
                                        <h6 class="font-weight-bolder text-white m-0">Beneficiaries</h6>
                                    </div>
                                    <div class="form-group col-md-7">
                                        <label>Primary Beneficiary <span class="text-danger">*</span></label>
                                        <input type="text" name="primary_beneficiary"
                                            class="form-control-sm form-control  @error('primary_beneficiary') is-invalid @enderror"
                                            value="{{ $adss?->primary_beneficiary ?: old('primary_beneficiary') }}"
                                            placeholder="Enter Name of Primary Beneficaiary" required>
                                        @error('primary_beneficiary')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Relationship <span class="text-danger">*</span></label>
                                        <input type="text" name="primary_relationship"
                                            class="form-control-sm form-control  @error('primary_relationship') is-invalid @enderror"
                                            value="{{ $adss?->primary_relationship ?: old('primary_relationship') }}"
                                            placeholder="Enter Relationship" required>
                                        @error('primary_relationship')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-7">
                                        <label>Secondary Beneficiary <span class="text-danger">*</span></label>
                                        <input type="text" name="secondary_beneficiary"
                                            class="form-control-sm form-control  @error('secondary_beneficiary') is-invalid @enderror"
                                            value="{{ $adss?->secondary_beneficiary ?: old('secondary_beneficiary') }}"
                                            placeholder="Enter Name of Secondary Beneficaiary" required>
                                        @error('secondary_beneficiary')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Relationship <span class="text-danger">*</span></label>
                                        <input type="text" name="secondary_relationship"
                                            class="form-control-sm form-control  @error('secondary_relationship') is-invalid @enderror"
                                            value="{{ $adss?->secondary_relationship ?: old('secondary_relationship') }}"
                                            placeholder="Enter Relationship" required>
                                        @error('secondary_relationship')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>If minor, name of trustee</label>
                                        <input type="text" name="minor_trustee"
                                            class="form-control-sm form-control  @error('minor_trustee') is-invalid @enderror"
                                            value="{{ $adss?->minor_trustee ?: old('minor_trustee') }}"
                                            placeholder="Enter Name of Trustee">
                                        @error('minor_trustee')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Are you a family member or a worker of a farmer who has an
                                            existing insurance coverage with the Philippine Crop Insurance Corporation
                                            (PCIC)? <span class="text-danger">*</span></label>
                                        <select name="pcic_coverage" id="pcic_coverage"
                                            class="form-control-sm form-control @error('pcic_coverage') is-invalid @enderror col-md-3"
                                            required>
                                            <option value="">--Please Select--</option>
                                            <option value="Yes"
                                                {{ ($adss?->pcic_coverage ?: old('pcic_coverage')) == 'Yes' ? 'selected' : '' }}>
                                                Yes</option>
                                            <option value="No"
                                                {{ ($adss?->pcic_coverage ?: old('pcic_coverage')) == 'No' ? 'selected' : '' }}>
                                                No</option>
                                        </select>
                                        @error('pcic_coverage')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4" id="pcic_name_field">
                                        <label>Name of Farmer</label>
                                        <input type="text" name="pcic_name"
                                            value="{{ $adss?->pcic_name ?: old('pcic_name') }}"
                                            class="form-control-sm form-control @error('pcic_name') is-invalid @enderror"
                                            placeholder="Enter Name of Farmer">
                                        @error('pcic_name')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4" id="pcic_relationship_field">
                                        <label>Relationship</label>
                                        <input type="text" name="pcic_relationship"
                                            class="form-control-sm form-control @error('pcic_relationship') is-invalid @enderror"
                                            value="{{ $adss?->pcic_relationship ?: old('pcic_relationship') }}"
                                            placeholder="Enter Relationship">
                                        @error('pcic_relationship')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4" id="pcic_address_field">
                                        <label>Address</label>
                                        <input type="text" name="pcic_address"
                                            class="form-control-sm form-control @error('pcic_address') is-invalid @enderror"
                                            value="{{ $adss?->pcic_address ?: old('pcic_address') }}"
                                            placeholder="Enter Address">
                                        @error('pcic_address')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ route('owner-info.index') }}" class="btn btn-danger col-md-2 mr-2">Go
                                    back</a>
                                <button type="submit" class="btn btn-primary col-md-2">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Get the select element
        const pcicCoverageSelect = document.getElementById('pcic_coverage');

        // Get the fields to hide/show
        const pcicNameField = document.getElementById('pcic_name_field');
        const pcicRelationshipField = document.getElementById('pcic_relationship_field');
        const pcicAddressField = document.getElementById('pcic_address_field');

        // Add an event listener to the select element
        pcicCoverageSelect.addEventListener('change', function() {
            // Check if the selected value is 'No'
            if (pcicCoverageSelect.value === 'No') {
                // If 'no' is selected, hide the fields
                pcicNameField.style.display = 'none';
                pcicRelationshipField.style.display = 'none';
                pcicAddressField.style.display = 'none';
            } else {
                // If a different value is selected, show the fields
                pcicNameField.style.display = 'block';
                pcicRelationshipField.style.display = 'block';
                pcicAddressField.style.display = 'block';
            }
        });

        // Trigger the change event initially to set the initial visibility
        pcicCoverageSelect.dispatchEvent(new Event('change'));
    </script>
@endsection

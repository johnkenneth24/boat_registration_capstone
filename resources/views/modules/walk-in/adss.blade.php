@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <form action="{{ route('walk-in.adssStore') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row border border-secondary">
                                    <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                        <h6 class="font-weight-bolder text-white m-0">Walk In - ADSS Application</h6>
                                    </div>
                                    <div class="row">
                                        <div class="row">
                                            <input type="hidden" name="walkin_owner_adss_id" value="{{ $owner_adss }}">
                                            <div class="form-group col-md-9">
                                                <label for="">Name of Spouse</label>
                                                <input type="text"
                                                    value="{{ $adss?->name_spouse ?: old('name_spouse') }}"
                                                    name="name_spouse" required
                                                    class="form-control-sm form-control  @error('name_spouse') is-invalid @enderror"
                                                    placeholder="Enter Name of Spouse">
                                                @error('name_spouse')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">No. of Dependent</label>
                                                <input type="number" name="number_dependent"
                                                    value="{{ $adss?->number_dependent ?: old('') }}" id=""
                                                    class="form-control-sm form-control  @error('number_dependent') is-invalid @enderror"
                                                    placeholder="0" min="0" max="10" required>
                                                @error('number_dependent')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Name of Employer</label>
                                                <input type="text" name="name_employer"
                                                    value="{{ $adss?->name_employer ?: old('') }}" required
                                                    class="form-control-sm form-control  @error('name_employer') is-invalid @enderror"
                                                    placeholder="Enter Name of Employer">
                                                @error('name_employer')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Desired Coverage</label>
                                                <input type="text" name="desired_coverage"
                                                    value="{{ $adss?->desired_coverage ?: old('') }}" required
                                                    class="form-control-sm form-control  @error('desired_coverage') is-invalid @enderror"
                                                    placeholder="Enter Desired Coverage">
                                                @error('desired_coverage')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Premium</label>
                                                <input type="text" name="premium"
                                                    value="{{ $adss?->premium ?: old('') }}" required
                                                    class="form-control-sm form-control  @error('premium') is-invalid @enderror"
                                                    placeholder="Enter premium">
                                                @error('premium')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="cover_from">Period Cover From</label>
                                                <input type="date" name="cover_from"
                                                    value="{{ $adss?->cover_from ?: old('') }}"
                                                    class="form-control-sm form-control @error('cover_from') is-invalid @enderror"
                                                    min="{{ date('Y-m-d') }}" required>

                                                @error('cover_from')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Period Cover To</label>
                                                <input type="date" name="cover_to"
                                                    value="{{ $adss?->cover_to ?: old('') }}" required
                                                    class="form-control-sm form-control  @error('cover_to') is-invalid @enderror"
                                                    min="{{ date('Y-m-d') }}">
                                                @error('cover_to')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-7">
                                                <label for="">Primary Beneficiary</label>
                                                <input type="text" name="primary_beneficiary"
                                                    value="{{ $adss?->primary_beneficiary ?: old('') }}" id=""
                                                    class="form-control-sm form-control  @error('primary_beneficiary') is-invalid @enderror"
                                                    placeholder="Enter Primary Beneficaiary">
                                                @error('primary_beneficiary')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="">Relationship</label>
                                                <input type="text" name="primary_relationship"
                                                    value="{{ $adss?->primary_relationship ?: old('') }}" id=""
                                                    class="form-control-sm form-control  @error('primary_relationship') is-invalid @enderror"
                                                    placeholder="Enter Relationship">
                                                @error('primary_relationship')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-7">
                                                <label for="">Secondary Beneficiary</label>
                                                <input type="text" name="secondary_beneficiary"
                                                    value="{{ $adss?->secondary_beneficiary ?: old('') }}" id=""
                                                    class="form-control-sm form-control  @error('secondary_beneficiary') is-invalid @enderror"
                                                    placeholder="Enter Secondary Beneficaiary">
                                                @error('secondary_beneficiary')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="">Relationship</label>
                                                <input type="text" name="secondary_relationship"
                                                    value="{{ $adss?->secondary_relationship ?: old('') }}"
                                                    id=""
                                                    class="form-control-sm form-control  @error('secondary_relationship') is-invalid @enderror"
                                                    placeholder="Enter Relationship">
                                                @error('secondary_relationship')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="">If minor, name of trustee</label>
                                                <input type="text" name="minor_trustee"
                                                    value="{{ $adss?->minor_trustee ?: old('') }}" id=""
                                                    class="form-control-sm form-control  @error('minor_trustee') is-invalid @enderror"
                                                    placeholder="Enter Name of Trustee">
                                                @error('minor_trustee')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="">Has a family member or a worker of a farmer who has
                                                    an
                                                    existing insurance coverage with the Philippine Crop Insurance
                                                    Corporation
                                                    (PCIC)?</label>
                                                <select name="pcic_coverage" id="pcic_coverage"
                                                    class="form-control-sm form-control @error('pcic_coverage') is-invalid @enderror col-md-3"
                                                    required>
                                                    <option value="">--Please Select--</option>
                                                    @foreach ($yes_no as $yesNo)
                                                        <option value="{{ $yesNo }}"
                                                            {{ ($adss?->pcic_coverage ?: old('pcic_coverage')) == $yesNo ? 'selected' : '' }}>
                                                            {{ $yesNo }}</option>
                                                    @endforeach
                                                </select>
                                                @error('pcic_coverage')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4" id="pcic_name_field">
                                                <label for="">Name of Farmer</label>
                                                <input type="text" name="pcic_name"
                                                    value="{{ $adss?->pcic_name ?: old('') }}" id=""
                                                    class="form-control-sm form-control @error('pcic_name') is-invalid @enderror"
                                                    placeholder="Enter Name of Farmer">
                                                @error('pcic_name')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4" id="pcic_relationship_field">
                                                <label for="">Relationship</label>
                                                <input type="text" name="pcic_relationship"
                                                    value="{{ $adss?->pcic_relationship ?: old('') }}" id=""
                                                    class="form-control-sm form-control @error('pcic_relationship') is-invalid @enderror"
                                                    placeholder="Enter Relationship">
                                                @error('pcic_relationship')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4" id="pcic_address_field">
                                                <label for="">Address</label>
                                                <input type="text" name="pcic_address"
                                                    value="{{ $adss?->pcic_address ?: old('') }}" id=""
                                                    class="form-control-sm form-control @error('pcic_address') is-invalid @enderror"
                                                    placeholder="Enter Address">
                                                @error('pcic_address')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ route('walk-in.livelihood', $owner_adss) }}"
                                    class="btn btn-danger col-md-2 mr-2">Go
                                    back</a>
                                <button type="submit" class="btn btn-primary col-md-2">Save</button>
                            </div>
                        </form>

                        <div class="overlay dark">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div>
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
            // Check if the selected value is 'no'
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




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
                                                <input type="text" value="{{ $adss?->name_spouse ?: old('name_spouse') }}" name="name_spouse" id="" class="form-control-sm form-control  @error('name_spouse') is-invalid @enderror" placeholder="Enter Name of Spause">
                                                @error('name_spouse')
                                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">No. of Dependent</label>
                                                <input type="number" name="number_dependent" value="{{ $adss?->number_dependent ?: old('') }}" id=""  class="form-control-sm form-control  @error('number_dependent') is-invalid @enderror" placeholder="0">
                                                @error('number_dependent')
                                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Name of Employer</label>
                                                <input type="text" name="name_employer" value="{{ $adss?->name_employer ?: old('') }}" id=""  class="form-control-sm form-control  @error('name_employer') is-invalid @enderror" placeholder="Enter Name of Employer">
                                                @error('name_employer')
                                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Desired Coverage</label>
                                                <input type="text" name="desired_coverage" value="{{ $adss?->desired_coverage ?: old('') }}" id=""  class="form-control-sm form-control  @error('desired_coverage') is-invalid @enderror" placeholder="Enter Desired Coverage">
                                                @error('desired_coverage')
                                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Premium</label>
                                                <input type="text" name="premium" value="{{ $adss?->premium ?: old('') }}" id=""  class="form-control-sm form-control  @error('premium') is-invalid @enderror" placeholder="Enter PRium">
                                                @error('premium')
                                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Period Cover From</label>
                                                <input type="date" name="cover_from" value="{{ $adss?->cover_from ?: old('') }}" id=""  class="form-control-sm form-control  @error('cover_from') is-invalid @enderror" placeholder="Enter Name of Employer">
                                                @error('cover_from')
                                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Period Cover To</label>
                                                <input type="date" name="cover_to" value="{{ $adss?->cover_to ?: old('') }}" id=""  class="form-control-sm form-control  @error('cover_to') is-invalid @enderror" placeholder="Enter Name of Employer">
                                                @error('cover_to')
                                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-7">
                                                <label for="">Primary Beneficiary</label>
                                                <input type="text" name="primary_beneficiary" value="{{ $adss?->primary_beneficiary ?: old('') }}" id=""  class="form-control-sm form-control  @error('primary_beneficiary') is-invalid @enderror" placeholder="Enter Primary Beneficaiary">
                                                @error('primary_beneficiary')
                                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="">Relationship</label>
                                                <input type="text" name="primary_relationship" value="{{ $adss?->primary_relationship ?: old('') }}" id=""  class="form-control-sm form-control  @error('primary_relationship') is-invalid @enderror" placeholder="Enter Relationship">
                                                @error('primary_relationship')
                                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-7">
                                                <label for="">Secondary Beneficiary</label>
                                                <input type="text" name="secondary_beneficiary" value="{{ $adss?->secondary_beneficiary ?: old('') }}" id=""  class="form-control-sm form-control  @error('secondary_beneficiary') is-invalid @enderror" placeholder="Enter Secondary Beneficaiary">
                                                @error('secondary_beneficiary')
                                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="">Relationship</label>
                                                <input type="text" name="secondary_relationship" value="{{ $adss?->secondary_relationship ?: old('') }}" id=""  class="form-control-sm form-control  @error('secondary_relationship') is-invalid @enderror" placeholder="Enter Relationship">
                                                @error('secondary_relationship')
                                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="">If minor, name of trustee</label>
                                                <input type="text" name="minor_trustee" value="{{ $adss?->minor_trustee ?: old('') }}" id=""  class="form-control-sm form-control  @error('minor_trustee') is-invalid @enderror" placeholder="Enter Name of Trustee">
                                                @error('minor_trustee')
                                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="">Has a family member coverage of insurance from Philippine Crop Insurance Corporation (PCIC)</label>
                                                <select name="pcic_coverage" id=""  class="form-control-sm form-control  @error('pcic_coverage') is-invalid @enderror col-md-3">
                                                    <option value="">--Please Select--</option>
                                                @foreach ($yes_no as $yesNo)
                                                    <option value="{{ $yesNo }}" {{ ($adss?->pcic_coverage ?: old('pcic_coverage')) == $yesNo ? 'selected' : '' }}>{{ $yesNo }}</option>
                                                @endforeach
                                                </select>
                                                @error('pcic_coverage')
                                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Name of Farmer</label>
                                                <input type="text" name="pcic_name" value="{{ $adss?->pcic_name ?: old('') }}" id=""  class="form-control-sm form-control  @error('pcic_name') is-invalid @enderror" placeholder="Enter Name of Farmer">
                                                @error('pcic_name')
                                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Relationship</label>
                                                <input type="text" name="pcic_relationship" value="{{ $adss?->pcic_relationship ?: old('') }}" id=""  class="form-control-sm form-control  @error('pcic_relationship') is-invalid @enderror" placeholder="Enter Relationship">
                                                @error('pcic_relationship')
                                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Address</label>
                                                <input type="text" name="pcic_address" value="{{ $adss?->pcic_address ?: old('') }}" id=""  class="form-control-sm form-control  @error('pcic_address') is-invalid @enderror" placeholder="Enter Address">
                                                @error('pcic_address')
                                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
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
        const checkboxes = document.querySelectorAll('input[name="source_of_income[]"]');
        const gearInput = document.querySelector('#gear');
        const gearDiv = document.querySelector('#gear_div');

        const cultureInput = document.querySelector('#culture');
        const cultureDiv = document.querySelector('#culture_div');

        const specifyInput = document.querySelector('#specify');
        const specifyDiv = document.querySelector('#specify_div');

        const otherCheckboxes = document.querySelectorAll('input[name="other_income_sources[]"]');
        const gearInputOs = document.querySelector('#gear_os');
        const gearInputOsDiv = document.querySelector('#gear_os_div');

        const cultureInputOs = document.querySelector('#culture_os');
        const cultureInputOsDiv = document.querySelector('#culture_os_div');

        const specifyInputOs = document.querySelector('#specify_os');
        const specifyInputOsDiv = document.querySelector('#specify_os_div');

        // check first if the checkbox is checked and gearInput is not empty, if checked and has value, then display the gearInput field
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked && gearInput.value !== '') {
                gearDiv.style.display = 'block';
            }

            if (checkbox.checked && cultureInput.value !== '') {
                cultureDiv.style.display = 'block';
            }

            if (checkbox.checked && specifyInput.value !== '') {
                specifyDiv.style.display = 'block';
            }
        });

        otherCheckboxes.forEach(function(checkbox) {
            if (checkbox.checked && gearInputOs.value !== '') {
                gearInputOsDiv.style.display = 'block';
            }

            if (checkbox.checked && cultureInputOs.value !== '') {
                cultureInputOsDiv.style.display = 'block';
            }

            if (checkbox.checked && specifyInputOs.value !== '') {
                specifyInputOsDiv.style.display = 'block';
            }
        });


        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('input', function() {
                if (this.checked) {
                    if (this.value === 'Capture Fishing') {
                        gearDiv.style.display = 'block';
                        gearInput.setAttribute('required', 'required');
                    } else if (this.value === 'Aquaculture') {
                        cultureDiv.style.display = 'block';
                        cultureInput.setAttribute('required', 'required');
                    } else if (this.value === 'Other') {
                        specifyDiv.style.display = 'block';
                        specifyInput.setAttribute('required', 'required');

                    }
                } // if unchecked remove the input
                else {
                    if (this.value === 'Capture Fishing') {
                        gearInput.removeAttribute('required');
                        gearInput.value = '';
                        gearDiv.style.display = 'none';
                    } else if (this.value === 'Aquaculture') {
                        cultureInput.removeAttribute('required');
                        cultureInput.value = '';
                        cultureDiv.style.display = 'none';
                    } else if (this.value === 'Other') {
                        specifyInput.removeAttribute('required');
                        specifyInput.value = '';
                        specifyDiv.style.display = 'none';
                    }
                }
            });
        });

        otherCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener('input', function() {
                if (this.checked) {
                    if (this.value === 'Capture Fishing') {
                        gearInputOsDiv.style.display = 'block';
                        gearInputOs.setAttribute('required', 'required');
                    } else if (this.value === 'Aquaculture') {
                        cultureInputOsDiv.style.display = 'block';
                        cultureInputOs.setAttribute('required', 'required');
                    } else if (this.value === 'Other') {
                        specifyInputOsDiv.style.display = 'block';
                        specifyInputOs.setAttribute('required', 'required');

                    }
                } // if unchecked remove the input
                else {
                    if (this.value === 'Capture Fishing') {
                        gearInputOs.removeAttribute('required');
                        gearInputOs.value = '';
                        gearInputOsDiv.style.display = 'none';
                    } else if (this.value === 'Aquaculture') {
                        cultureInputOs.removeAttribute('required');
                        cultureInputOs.value = '';
                        cultureInputOsDiv.style.display = 'none';
                    } else if (this.value === 'Other') {
                        specifyInputOs.removeAttribute('required');
                        specifyInputOs.value = '';
                        specifyInputOsDiv.style.display = 'none';
                    }
                }
            });
        });
    </script>
@endsection


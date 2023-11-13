@extends('layouts.app')

@section('title', 'Owner Information')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-warning mt-5">
                        <form action="{{ route('owner-info.store') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="card-body mt-0">
                                <div class="row border border-secondary">
                                    <div class="col-md-12 mt-0 mb-2 py-1 bg-dark">
                                        <h6 class="font-weight-bolder text-white m-0">Personal Information</h6>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label>Salutation</label>
                                        <select name="salutation" class="form-control form-control-sm" autofocus required>
                                            <option value="">----</option>
                                            @foreach ($salutations as $salutation)
                                                <option value="{{ $salutation }}"
                                                    {{ ($ownerInfo?->salutation ?: old('salutation')) == $salutation ? 'selected' : '' }}>
                                                    {{ $salutation }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Lastname <span class="text-danger">*</span></label>
                                        <input type="text" name="last_name"
                                            class="form-control form-control-sm @error('last_name') is-invalid @enderror"
                                            value="{{ $ownerInfo?->last_name ?: old('last_name') }}"
                                            placeholder="Last Name (e.g., De la Cruz)" required>
                                        @error('last_name')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Firstname <span class="text-danger">*</span></label>
                                        <input type="text" name="first_name"
                                            class="form-control form-control-sm @error('first_name') is-invalid @enderror"
                                            value="{{ $ownerInfo?->first_name ?: old('first_name') }}"
                                            placeholder="First Name (e.g., Juan)" required>
                                        @error('first_name')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Middlename </label>
                                        <input type="text" name="middle_name"
                                            class="form-control form-control-sm @error('middle_name') is-invalid @enderror"
                                            value="{{ $ownerInfo?->middle_name ?: old('middle_name') }}"
                                            placeholder="Middle Name (e.g., Dalisay)">
                                        @error('middle_name')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label>Suffix</label>
                                        <select name="suffix" class="form-control form-control-sm">
                                            <option value="">--N/A--</option>
                                            @foreach ($suffixes as $suffix)
                                                <option
                                                    value="{{ $suffix }}"{{ ($ownerInfo?->suffix ?: old('suffix')) == $suffix ? 'selected' : '' }}>
                                                    {{ $suffix }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Address <span class="text-danger">*</span> <span
                                                class="font-italic fw-normal">(St./House #, Barangay, Municipality,
                                                Province/City)</span></label>
                                        <input type="text" name="address"
                                            class="form-control form-control-sm @error('address') is-invalid @enderror"
                                            value="{{ $ownerInfo?->address ?: old('address') }}"
                                            placeholder="Enter Address (House/St. No, Brgy, Municipality, Province/City)"
                                            required>
                                        @error('address')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Resident since <span class="text-danger">*</span></label>
                                        <input type="month" name="resident_since"
                                            value="{{ $ownerInfo?->resident_since->format('Y-m') ?: old('resident_since') }}"class="form-control form-control-sm @error('resident_since') is-invalid @enderror"
                                            required>
                                        @error('resident_since')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Nationality <span class="text-danger">*</span></label>
                                        <input type="text" name="nationality"
                                            class="form-control form-control-sm @error('nationality') is-invalid @enderror"
                                            value="{{ $ownerInfo?->nationality ?: old('nationality') }}"
                                            placeholder="Enter your Nationality" required>
                                        @error('nationality')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Gender <span class="text-danger">*</span></label>
                                        <select name="gender" class="form-control form-control-sm" required>
                                            <option value="">--Select--</option>
                                            @foreach ($genders as $gender)
                                                <option value="{{ $gender }}"
                                                    {{ ($ownerInfo?->gender ?: old('gender')) == $gender ? 'selected' : '' }}>
                                                    {{ $gender }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Civil Status <span class="text-danger">*</span></label>
                                        <select name="civil_status" class="form-control form-control-sm" required>
                                            <option value="">--Select--</option>
                                            @foreach ($civil_status as $civil_status)
                                                <option value="{{ $civil_status }}"
                                                    {{ ($ownerInfo?->civil_status ?: old('civil_status')) == $civil_status ? 'selected' : '' }}>
                                                    {{ $civil_status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Contact No. <span class="text-danger">*</span></label>
                                        <input type="text" name="contact_no"
                                            class="form-control form-control-sm @error('contact_no') is-invalid @enderror"
                                            value="{{ auth()->user()->contact_no ?: old('contact_no') }}"
                                            placeholder="Enter Contact No." required pattern="[0-9]{11}"
                                            title="Please enter a 11-digit numeric contact number (09xxxxxxxxx)">
                                        @error('contact_no')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Birthdate <span class="text-danger">*</span></label>
                                        <input type="date" name="birthdate" class="form-control form-control-sm bdate"
                                            max="date('Y-m-d')" required
                                            value="{{ $ownerInfo?->birthdate->format('Y-m-d') ?: old('birthdate') }}">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label>Age <span class="text-danger">*</span></label>
                                        <input type="number" name="age" class="form-control form-control-sm age"
                                            value="{{ $ownerInfo?->age ?: old('age') }}" value="{{ old('age') }}"
                                            readonly placeholder="0">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Birthplace <span class="text-danger">*</span></label>
                                        <input type="text" name="birthplace"
                                            class="form-control form-control-sm @error('birthplace') is-invalid @enderror"
                                            value="{{ $ownerInfo?->birthplace ?: old('birthplace') }}"
                                            value="{{ old('birthplace') }}" placeholder="Enter Birthplace" required>
                                        @error('birthplace')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4" id="educ">
                                        <label>Educational Background <span class="text-danger">*</span></label>
                                        <select name="educ_background" required id="educational_background"
                                            class="form-control form-control-sm">
                                            <option value="">--Please select--</option>
                                            @foreach ($educ_bcc as $educ)
                                                <option value="{{ $educ }}"
                                                    {{ ($ownerInfo?->educ_background ?: old('educational_background')) == $educ ? 'selected' : '' }}>
                                                    {{ $educ }}</option>
                                            @endforeach
                                            <option value="Others"
                                                {{ ($ownerInfo?->educ_background ?: old('educational_background')) == 'Others' ? 'selected' : '' }}>
                                                Others (Please specify)
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4" id="otherEducationalBackground"
                                        style="display: none;">
                                        <label>Specify Other Educational Background <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="other_educational_background"
                                            value="{{ $ownerInfo?->other_educational_background ?: old('other_educational_background') }}"
                                            class="form-control form-control-sm @error('emAddress') is-invalid @enderror">
                                        @error('other_educational_background')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Number of Children</label>
                                        <input type="number" name="children_count"
                                            value="{{ $ownerInfo?->children_count ?: old('children_count') }}"class="form-control form-control-sm @error('children_count') is-invalid @enderror">
                                        @error('children_count')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 my-0">
                                        <small class="text-muted font-italic">
                                            *Please input your emergency contact information below
                                        </small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Emergency contact person <span class="text-danger">*</span></label>
                                        <input type="text" name="emContact_person"
                                            class="form-control form-control-sm @error('emContact_person') is-invalid @enderror"
                                            value="{{ $ownerInfo?->emContact_person ?: old('emContact_person') }}"
                                            placeholder="Enter Name of emergency contact">
                                        @error('emContact_person')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Relationship <span class="text-danger">*</span></label>
                                        <input type="text" name="emRelationship"
                                            class="form-control form-control-sm @error('emRelationship') is-invalid @enderror"
                                            value="{{ $ownerInfo?->emRelationship ?: old('emRelationship') }}"
                                            placeholder="Enter Relationship">
                                        @error('emRelationship')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Contact No. <span class="text-danger">*</span></label>
                                        <input type="text" name="emContact_no"
                                            class="form-control form-control-sm @error('emContact_no') is-invalid @enderror"
                                            value="{{ $ownerInfo?->emContact_no ?: old('emContact_no') }}"
                                            placeholder="Contact No. of emergency contact" pattern="[0-9]{11}"
                                            title="Please enter a 11-digit numeric contact number  (09xxxxxxxxx)">
                                        @error('emContact_no')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Address <span class="text-danger">*</span></label>
                                        <input type="text" name="emAddress"
                                            class="form-control form-control-sm @error('emAddress') is-invalid @enderror"
                                            value="{{ $ownerInfo?->emAddress ?: old('emAddress') }}"
                                            placeholder="Address of emergency contact">
                                        @error('emAddress')
                                            <div class="invalid-feedback" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ route('owner-info.index') }}" class="btn btn-danger col-md-2 mr-2">
                                    <span><i class="fa fa-arrow-left" aria-hidden="true"></i></span>
                                    Go back</a>
                                <button type="submit" class="btn btn-primary col-md-2">Next
                                    <span><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                                </button>
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
    {{-- script to show other educational background if selected educ_background is equal to Others --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const $educ_select = document.querySelector('#educational_background');
            const $other_educ = document.querySelector('#otherEducationalBackground');
            const $educ = document.querySelector('#educ');

            function toggleOtherEducationalField() {
                if ($educ_select.value === 'Others') {
                    $other_educ.style.display = 'block';
                    $other_educ.querySelector('input').setAttribute('required', true);
                } else {
                    $other_educ.style.display = 'none';
                    $other_educ.querySelector('input').removeAttribute('required');
                }
            }

            toggleOtherEducationalField(); // Initial state based on selected value

            $educ_select.addEventListener('input', toggleOtherEducationalField);
        });
    </script>

    {{-- script to calculate age inputted in the bdate input --}}
    <script>
        function calculateAge() {
            var date = document.querySelector('.bdate').value;
            var today = new Date();
            var birthDate = new Date(date);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            var d = today.getDate() - birthDate.getDate();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            document.querySelector('.age').value = age;
        }

        document.querySelector('.bdate').addEventListener('input', calculateAge);
    </script>
@endsection

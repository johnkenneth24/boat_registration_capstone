@extends('layouts.app')

@section('title', 'Owner Information')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-warning mt-5">
                        <form action="{{ route('owner-info.store') }}" method="post">
                            @csrf
                            <div class="card-body mt-0">
                                <div class="row border border-secondary">
                                    <div class="col-md-12 mt-0 mb-2 py-1 bg-dark">
                                        <h6 class="font-weight-bolder text-white m-0">Personal Information</h6>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label>Salutation</label>
                                        <select name="salutation" class="form-control form-control-sm">
                                            <option value="">----</option>
                                            @foreach ($salutations as $salutation)
                                                <option value="{{ $salutation }}"
                                                    {{ ($ownerInfo->salutation ?: old('salutation')) == $salutation ? 'selected' : '' }}>
                                                    {{ $salutation }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Lastname</label>
                                        <input type="text" name="last_name" class="form-control form-control-sm"
                                            value="{{ $ownerInfo?->last_name ?: old('last_name') }}"
                                            placeholder="Last Name (e.g., De la Cruz)" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Firstname</label>
                                        <input type="text" name="first_name" class="form-control form-control-sm"
                                            value="{{ $ownerInfo?->first_name ?: old('first_name') }}"
                                            placeholder="First Name (e.g., Juan)" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Middlename</label>
                                        <input type="text" name="middle_name" class="form-control form-control-sm"
                                            value="{{ $ownerInfo?->middle_name ?: old('middle_name') }}"
                                            placeholder="Middle Name (e.g., Dalisay)">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Suffix</label>
                                        <select name="suffix" class="form-control form-control-sm">
                                            <option value="">--Please Select--</option>
                                            @foreach ($suffixes as $suffix)
                                                <option
                                                    value="{{ $suffix }}"{{ ($ownerInfo?->suffix ?: old('suffix')) == $suffix ? 'selected' : '' }}>
                                                    {{ $suffix }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control form-control-sm"
                                            value="{{ $ownerInfo?->address ?: old('address') }}"
                                            placeholder="Enter Address (House/St. No, Brgy, Municipality, Province/City)"
                                            required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Resident since</label>
                                        <input type="month" name="resident_since"
                                            value="{{ $ownerInfo?->resident_since->format('Y-m') ?: old('resident_since') }}"class="form-control form-control-sm"
                                            required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Nationality</label>
                                        <input type="text" name="nationality" class="form-control form-control-sm"
                                            value="{{ $ownerInfo?->nationality ?: old('nationality') }}"
                                            placeholder="Enter your Nationality" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Gender</label>
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
                                        <label>Civil Status</label>
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
                                        <label>Contact No.</label>
                                        <input type="text" name="contact_no" class="form-control form-control-sm"
                                            value="{{ $ownerInfo?->contact_no ?: old('contact_no') }}"
                                            placeholder="Enter Contact No." required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Birthdate</label>
                                        <input type="date" name="birthdate" class="form-control form-control-sm bdate"
                                            value="{{ $ownerInfo?->birthdate->format('Y-m-d') ?: old('birthdate') }}"
                                            value="{{ old('birthdate') }}">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label>Age</label>
                                        <input type="number" name="age" class="form-control form-control-sm age"
                                            value="{{ $ownerInfo?->age ?: old('age') }}" value="{{ old('age') }}"
                                            readonly placeholder="0">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Birthplace</label>
                                        <input type="text" name="birthplace" class="form-control form-control-sm"
                                            value="{{ $ownerInfo?->birthplace ?: old('birthplace') }}"
                                            value="{{ old('birthplace') }}" placeholder="Enter Birthplace" required>
                                    </div>
                                    <div class="form-group col-md-4" id="educ">
                                        <label>Educational Background</label>
                                        <select name="educ_background" required id="educational_background"
                                            class="form-control form-control-sm">
                                            <option value="">--Please select--</option>
                                            @foreach ($educ_bcc as $educ)
                                                <option value="{{ $educ }}"
                                                    {{ ($ownerInfo?->educ_background ?: old('educational_background')) == $educ ? 'selected' : '' }}>
                                                    {{ $educ }}</option>
                                            @endforeach
                                            <option value="Others">Others (Please specify)
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4" id="otherEducationalBackground"
                                        style="display: none;">
                                        <label>Specify Other Educational Background</label>
                                        <input type="text" name="other_educational_background"
                                            value="{{ $ownerInfo?->other_educational_background ?: old('other_educational_background') }}"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Number of Children</label>
                                        <input type="number" name="children_count"
                                            value="{{ $ownerInfo?->children_count ?: old('children_count') }}"class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-12 my-0">
                                        <small class="text-muted font-italic">
                                            *Please input your emergency contact information below
                                        </small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Emergency contact person</label>
                                        <input type="text" name="emContact_person"
                                            class="form-control form-control-sm"
                                            value="{{ $ownerInfo?->emContact_person ?: old('emContact_person') }}"
                                            placeholder="Enter Name of emergency contact">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Relationship</label>
                                        <input type="text" name="emRelationship" class="form-control form-control-sm"
                                            value="{{ $ownerInfo?->emRelationship ?: old('emRelationship') }}"
                                            placeholder="Enter Relationship">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Contact No.</label>
                                        <input type="text" name="emContact_no" class="form-control form-control-sm"
                                            value="{{ $ownerInfo?->emContact_no ?: old('emContact_no') }}"
                                            placeholder="Contact No. of emergency contact">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Address</label>
                                        <input type="text" name="emAddress" class="form-control form-control-sm"
                                            value="{{ $ownerInfo?->emAddress ?: old('emAddress') }}"
                                            placeholder="Address of emergency contact">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ route('owner-info.index') }}" class="btn btn-danger col-md-2 mr-2">Go
                                    back</a>
                                <button type="submit" class="btn btn-primary col-md-2">Next</button>
                            </div>
                            <div class="overlay dark">
                                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
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
        const $educ_select = document.querySelector('#educational_background');
        const $other_educ = document.querySelector('#otherEducationalBackground');
        const $educ = document.querySelector('#educ');

        $educ_select.addEventListener('change', function() {
            if (this.value === 'Others') {
                $other_educ.style.display = 'block';
                $other_educ.querySelector('input').setAttribute('required', true);
            } else {
                $other_educ.style.display = 'none';
                $other_educ.querySelector('input').removeAttribute('required');
            }
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

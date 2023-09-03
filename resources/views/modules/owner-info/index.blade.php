@extends('layouts.app')

@section('title', 'Owner Information')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-warning mt-5">
                        {{-- <div class="card-header m-0 mb-0">
                            <div class="card-title">
                                <h4 class="text-uppercase">Owner Information</h4>
                            </div>
                        </div> --}}
                        <div class="card-body mt-0">
                            <div class="row border border-secondary">
                                <div class="col-md-12 mt-0 mb-2 py-1 bg-dark">
                                    <h6 class="font-weight-bolder text-white m-0">Personal Information</h6>
                                </div>
                                <div class="form-group col-md-1">
                                    <label>Salutation</label>
                                    <select name="salutation" class="form-control form-control-sm">
                                        <option value="">----</option>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Ms.">Ms.</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Lastname</label>
                                    <input type="text" name="lastname" class="form-control form-control-sm"
                                        placeholder="Last Name (e.g., De la Cruz)" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Firstname</label>
                                    <input type="text" name="firstname" class="form-control form-control-sm"
                                        placeholder="First Name (e.g., Juan)" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Middlename</label>
                                    <input type="text" name="middlename" class="form-control form-control-sm"
                                        placeholder="Middle Name (e.g., Dalisay)">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Suffix</label>
                                    <select name="suffix" class="form-control form-control-sm">
                                        <option value="">--Please Select--</option>
                                        <option value="Jr.">Jr.</option>
                                        <option value="Sr.">Sr.</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control form-control-sm"
                                        placeholder="Enter Address (House/St. No, Brgy, Municipality, Province/City)"
                                        required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Resident since</label>
                                    <input type="month" name="resident_since" class="form-control form-control-sm"
                                        required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Nationality</label>
                                    <input type="text" name="nationality" class="form-control form-control-sm"
                                        placeholder="Enter your Nationality" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control form-control-sm" required>
                                        <option value="">--Select--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Civil Status</label>
                                    <select name="civil_status" class="form-control form-control-sm" required>
                                        <option value="">--Select--</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Contact No.</label>
                                    <input type="text" name="contact_no" class="form-control form-control-sm"
                                        placeholder="Enter Contact No." required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Birthdate</label>
                                    <input type="date" name="birthdate" class="form-control form-control-sm bdate"
                                        value="{{ old('birthdate') }}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label>Age</label>
                                    <input type="number" name="age" class="form-control form-control-sm age"
                                        value="{{ old('age') }}" readonly placeholder="0">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Birthplace</label>
                                    <input type="text" name="birthplace" class="form-control form-control-sm"
                                        value="{{ old('birthplace') }}" placeholder="Enter Birthplace" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Educational Background</label>
                                    <input type="text" name="educational_background" class="form-control form-control-sm"
                                        placeholder="Enter Educational Background" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Number of Children</label>
                                    <input type="number" name="children_count" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-12 my-0">
                                    <small class="text-muted font-italic">
                                        *Please input your emergency contact information below
                                    </small>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Emergency contact person</label>
                                    <input type="text" name="emergency_contact_name"
                                        class="form-control form-control-sm"
                                        placeholder="Enter Name of emergency contact">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Relationship</label>
                                    <input type="text" name="emergency_contact_relationship"
                                        class="form-control form-control-sm" placeholder="Enter Relationship">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Contact No.</label>
                                    <input type="text" name="emergency_contact_number"
                                        class="form-control form-control-sm"
                                        placeholder="Contact No. of emergency contact">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Address</label>
                                    <input type="text" name="emergency_contact_address"
                                        class="form-control form-control-sm" placeholder="Address of emergency contact">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary col-md-3">Next</button>
                        </div>
                        <div class="overlay dark">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

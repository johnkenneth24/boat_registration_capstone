@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-warning mt-5">
                        <div class="card-header m-0 mb-0">
                            <div class="card-title">
                                <h4 class="text-uppercase">Step 1 | Application for Municipal Fisherfolk Registration</h4>
                            </div>
                            <div class="card-tools">
                                <a href="{{ route('reg-boat.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                        <form action="{{ route('form1.store') }}" method="post">
                            @csrf
                            <div class="card-body mt-0">
                                <div class="d-flex justify-content-center mb-3">
                                    <div class="progresses">
                                        <div class="steps">
                                            <span class="font-weight-bolder">1</span>
                                        </div>
                                        <span class="line inactive"></span>
                                        <div class="steps inactive">
                                            <span class="font-weight-bolder">2</span>
                                        </div>
                                        {{-- <span class="line inactive"></span>
                                        <div class="steps inactive">
                                            <span class="font-weight-bolder">3</span>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="row border border-secondary">
                                    <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                        <h6 class="font-weight-bolder text-white m-0">Registration</h6>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Registration Number</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">IMS -</span>
                                            </div>
                                            <input type="text" name="registration_no"
                                                class="form-control form-control-sm" readonly required
                                                value="{{ $latestregNo }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Registration Date</label>
                                        <input type="date" name="registration_date" class="form-control form-control-sm"
                                            readonly value="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Registration Type</label>
                                        <input type="text" name="registration_type" class="form-control form-control-sm"
                                            readonly value="New">
                                    </div>
                                    <div class="col-md-12 mt-1 mb-2 py-1 bg-dark">
                                        <h6 class="font-weight-bolder text-white m-0">Personal Information</h6>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="">Salutation</label>
                                        <select name="salutation" class="form-control form-control-sm">
                                            <option value="">----</option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Ms.">Ms.</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Lastname</label>
                                        <input type="text" name="lastname" class="form-control form-control-sm"
                                            placeholder="Last Name (e.g., De la Cruz)" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Firstname</label>
                                        <input type="text" name="firstname" class="form-control form-control-sm"
                                            placeholder="First Name (e.g., Juan)" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Middlename</label>
                                        <input type="text" name="middlename" class="form-control form-control-sm"
                                            placeholder="Middle Name (e.g., Dalisay)">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Suffix</label>
                                        <select name="suffix" class="form-control form-control-sm">
                                            <option value="">--Please Select--</option>
                                            <option value="Jr.">Jr.</option>
                                            <option value="Sr.">Sr.</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Address</label>
                                        <input type="text" name="address" class="form-control form-control-sm"
                                            placeholder="Enter Address (House/St. No, Brgy, Municipality, Province/City)"
                                            required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Resident since</label>
                                        <input type="month" name="resident_since" class="form-control form-control-sm"
                                            required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Nationality</label>
                                        <input type="text" name="nationality" class="form-control form-control-sm"
                                            placeholder="Enter your Nationality" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Gender</label>
                                        <select name="gender" class="form-control form-control-sm" required>
                                            <option value="">--Select--</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Civil Status</label>
                                        <select name="civil_status" class="form-control form-control-sm" required>
                                            <option value="">--Select--</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Separated">Separated</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Contact No.</label>
                                        <input type="text" name="contact_no" class="form-control form-control-sm"
                                            placeholder="Enter Contact No." required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Birthdate</label>
                                        <input type="date" name="birthdate" class="form-control form-control-sm bdate"
                                            value="{{ old('birthdate') }}">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="">Age</label>
                                        <input type="number" name="age" class="form-control form-control-sm age"
                                            value="{{ old('age') }}" readonly placeholder="0">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Birthplace</label>
                                        <input type="text" name="birthplace" class="form-control form-control-sm"
                                            value="{{ old('birthplace') }}" placeholder="Enter Birthplace" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Educational Background</label>
                                        <input type="text" name="educational_background"
                                            class="form-control form-control-sm"
                                            placeholder="Enter Educational Background" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Number of Children</label>
                                        <input type="number" name="children_count" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-12 my-0">
                                        <small class="text-muted font-italic">
                                            *Please input your emergency contact information below
                                        </small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Emergency contact person</label>
                                        <input type="text" name="emergency_contact_name"
                                            class="form-control form-control-sm"
                                            placeholder="Enter Name of emergency contact">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Relationship</label>
                                        <input type="text" name="emergency_contact_relationship"
                                            class="form-control form-control-sm" placeholder="Enter Relationship">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Contact No.</label>
                                        <input type="text" name="emergency_contact_number"
                                            class="form-control form-control-sm"
                                            placeholder="Contact No. of emergency contact">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Address</label>
                                        <input type="text" name="emergency_contact_address"
                                            class="form-control form-control-sm"
                                            placeholder="Address of emergency contact">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary col-md-3">Next</button>
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

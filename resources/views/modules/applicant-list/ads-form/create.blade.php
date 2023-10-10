@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>ADSS Application Form</h4>
                            </div>
                            <div class="card-tools">
                                <a href="{{ route('reg-boat.mfr-form') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-7">
                                    <label for="">Name of Applicant</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Name of Applicant">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="">IP Tribe</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter IP Tribe">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Sex</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">--Please Select--</option>
                                        <option value="">Male</option>
                                        <option value="">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Date of Birth</label>
                                    <input type="date" name="" id="" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Age</label>
                                    <input type="number" name="" id="" class="form-control" placeholder="Enter Age">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Occupation</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Occupation">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Marital Status</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">--Please Select--</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Name of Spouse</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Name of Spause">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">No. of Dependent</label>
                                    <input type="number" name="" id="" class="form-control" placeholder="0">
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="">Address</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Address">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Telephone/Contact No.</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Contact No.">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Name of Employer</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Name of Employer">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Desired Coverage</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Desired Coverage">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Premium</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter PRium">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Period Cover From</label>
                                    <input type="date" name="" id="" class="form-control" placeholder="Enter Name of Employer">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Period Cover To</label>
                                    <input type="date" name="" id="" class="form-control" placeholder="Enter Name of Employer">
                                </div>
                                <div class="form-group col-md-7">
                                    <label for="">Primary Beneficiary</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Primary Beneficaiary">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="">Relationship</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Relationship">
                                </div>
                                <div class="form-group col-md-7">
                                    <label for="">Secondary Beneficiary</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Secondary Beneficaiary">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="">Relationship</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Relationship">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">If minor, name of trustee</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Name of Trustee">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Has a family member coverage of insurance from Philippine Crop Insurance Corporation (PCIC)</label>
                                    <div>
                                        <input type="checkbox" name="" id="" class="" placeholder="Enter Name of Trustee"> Yes
                                        <input type="checkbox" name="" id="" class="" placeholder="Enter Name of Trustee"> No
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Name of Farmer</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Name of Farmer">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Relationship</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Relationship">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Address</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Address">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="" class="btn btn-danger col-md-3 mr-2">Cancel Application</a>
                            <button type="submit" class="btn btn-success col-md-3 ">Approve Application</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

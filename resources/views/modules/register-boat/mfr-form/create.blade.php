@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>MFR Application Form</h4>
                            </div>
                            <div class="card-tools">
                                <a href="{{ route('reg-boat.process') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                        <div class="card-body pb-4">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Type of Application</label>
                                    <select name="" class="form-control" id="">
                                        <option value="">--Please select--</option>
                                        <option value="">New Registration</option>
                                        <option value="">Renewal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="">Salutation</label>
                                    <select name="" class="form-control" id="">
                                        <option value="">--Please select--</option>
                                        <option value="">Mr.</option>
                                        <option value="">Ms.</option>
                                        <option value="">Mrs.</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Last Name</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Last Name ">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">First Name</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter First Name">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Middle Name</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Middle Name">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Extension</label>
                                    <select name="" class="form-control" id="">
                                        <option value="">--Please select--</option>
                                        <option value="">New Registration</option>
                                        <option value="">Renewal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="">Contact No.</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Street/Barangay</label>
                                    <input type="text" name="" id="" class="form-control" placeholder=" ">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">City/Municipality</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Province</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="">Gender</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Nationality</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Residence of Municipality Since</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Educational Background</label>
                                    <select name="" class="form-control" id="">
                                        <option value="">--Please select--</option>
                                        <option value="">Elementary</option>
                                        <option value="">High School</option>
                                        <option value="">College</option>
                                        <option value="">Post Graduate</option>
                                        <option value="">Vocational</option>
                                        <option value="">Others</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Birthdate</label>
                                    <input type="text" name="" id="" class="form-control" placeholder=" ">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Birthplace</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Civil Status</label>
                                    <select name="" class="form-control" id="">
                                        <option value="">--Please select--</option>
                                        <option value="">Single</option>
                                        <option value="">Married</option>
                                        <option value="">Legaly Separated</option>
                                        <option value="">Widow/Widower</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">No. of Children</label>
                                    <input type="number" name="" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <h5 class="">Person to Notify Incase of Emergency</h5>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="" class="text-nowrap">Person to Notify <span class="text-muted text-nowrap" style="font-size: 12px;">(First Name Last Name)</span></label>
                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Relationship</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Contact No.</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Address</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <h5 class="">Livelihood</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <h6 class="font-weight-bold">Main Source of Income</h6>
                                    </div>
                                    <div class="row ml-1">
                                        <div class="form-group form-check col-md-12 mb-0">
                                            <input type="checkbox" class="form-check-input" id="">
                                            <label class="form-check-label" for="">Capture Fishing</label>
                                            <span class="ml-1"><input type="text" style="border-width: 0px 0px 1px 0px; height: 19px;" placeholder="Please specify here"></span>
                                        </div>
                                        <div class="form-group form-check col-md-12 mb-0">
                                            <input type="checkbox" class="form-check-input" id="">
                                            <label class="form-check-label" for="">Aquaculture</label>
                                            <span class="ml-1"><input type="text" style="border-width: 0px 0px 1px 0px; height: 19px;" placeholder="Please specify here"></span>
                                        </div>
                                        <div class="form-group form-check col-md-12 mb-0">
                                            <input type="checkbox" class="form-check-input" id="">
                                            <label class="form-check-label" for="">Fish Vending</label>
                                        </div>
                                        <div class="form-group form-check col-md-12 mb-0">
                                            <input type="checkbox" class="form-check-input" id="">
                                            <label class="form-check-label" for="">Cleaning</label>
                                        </div>
                                        <div class="form-group form-check col-md-12 mb-0">
                                            <input type="checkbox" class="form-check-input" id="">
                                            <label class="form-check-label" for="">Fish Processing</label>
                                        </div>
                                        <div class="form-group form-check col-md-12 mb-0">
                                            <input type="checkbox" class="form-check-input" id="">
                                            <label class="form-check-label" for="">Others</label>
                                            <span class="ml-1"><input type="text" style="border-width: 0px 0px 1px 0px; height: 19px;" placeholder="Please specify here"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <h6 class="font-weight-bold">Others Source of Income</h6>
                                    </div>
                                    <div class="row ml-1">
                                        <div class="form-group form-check col-md-12 mb-0">
                                            <input type="checkbox" class="form-check-input" id="">
                                            <label class="form-check-label" for="">Capture Fishing</label>
                                            <span class="ml-1"><input type="text" style="border-width: 0px 0px 1px 0px; height: 19px;" placeholder="Please specify here"></span>
                                        </div>
                                        <div class="form-group form-check col-md-12 mb-0">
                                            <input type="checkbox" class="form-check-input" id="">
                                            <label class="form-check-label" for="">Aquaculture</label>
                                            <span class="ml-1"><input type="text" style="border-width: 0px 0px 1px 0px; height: 19px;" placeholder="Please specify here"></span>
                                        </div>
                                        <div class="form-group form-check col-md-12 mb-0">
                                            <input type="checkbox" class="form-check-input" id="">
                                            <label class="form-check-label" for="">Fish Vending</label>
                                        </div>
                                        <div class="form-group form-check col-md-12 mb-0">
                                            <input type="checkbox" class="form-check-input" id="">
                                            <label class="form-check-label" for="">Cleaning</label>
                                        </div>
                                        <div class="form-group form-check col-md-12 mb-0">
                                            <input type="checkbox" class="form-check-input" id="">
                                            <label class="form-check-label" for="">Fish Processing</label>
                                        </div>
                                        <div class="form-group form-check col-md-12 mb-0">
                                            <input type="checkbox" class="form-check-input" id="">
                                            <label class="form-check-label" for="">Others</label>
                                            <span class="ml-1"><input type="text" style="border-width: 0px 0px 1px 0px; height: 19px;" placeholder="Please specify here"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                            <a href="" class="btn btn-primary">Next - MFR Form</a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Organization</h4>
                            </div>
                            <div class="card-tools">
                                <button class="btn btn-primary">Add Organization</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="" class="text-nowrap">Name of Organization</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="" class="text-nowrap">Member Since</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="" class="text-nowrap">Position/Designation</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                            <a href="{{ route('reg-boat.ads-form') }}" class="btn btn-primary">Next - ADSS Form</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

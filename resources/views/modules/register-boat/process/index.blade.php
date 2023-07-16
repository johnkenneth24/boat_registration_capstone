@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Application Form</h4>
                            </div>
                            <div class="card-tools">
                                <a href="{{ route('reg-boat.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-9">
                                    <label for="">Name of Fisherfolk Association</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Name of Fisherfolk Association">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-9">
                                    <label for="">Name of Fisherfolk</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Name of Fisherfolk">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Age</label>
                                    <input type="number" name="" id="" class="form-control" placeholder="Enter Age">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Address</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Address">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Beneficiary</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Beneficiary">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Property to be Insured</label>
                                    <select name="" class="form-control" id="">
                                        <option value="">--Please select--</option>
                                        <option value="">Non-Motorizedc Banca</option>
                                        <option value="">Motorized Banca</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="">Horse Power</label><span class="text-muted text-nowrap"> (Only applicable for Motorized Banca)</span>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Horse Power">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                            <a href="" class="btn btn-primary">Next - MFR Form</a>
                        </div> --}}
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Description of Property</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="">Color</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Color">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Length</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Length">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Breadth</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Breadth">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Depth</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Depth">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Body Number</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Body Number">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Materials</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Materials">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Year Built</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Year Built">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Gross Toonage</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Gross Toonage">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Registration</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Desired Amount of Cover</label>
                                    <input type="number" name="" id="" class="form-control" placeholder="Enter">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Registration Number</label>
                                    <input type="number" name="" id="" class="form-control" placeholder="Enter Registration Number">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">OR Number</label>
                                    <input type="number" name="" id="" class="form-control" placeholder="Enter OR No.">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Date</label>
                                    <input type="date" name="" id="" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Cover Period From</label>
                                    <input type="date" name="" id="" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Cover Period To</label>
                                    <input type="date" name="" id="" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Please attached colored pictures of the property</label>
                                    <input type="file" name="" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                            <a href="{{ route('reg-boat.mfr-form') }}" class="btn btn-primary">Next - MFR Form</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

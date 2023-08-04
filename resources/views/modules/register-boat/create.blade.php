@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Create Registration</h4>
                            </div>
                            <div class="card-tools">
                                <a href="{{ route('reg-boat.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group col-md-12">
                                <label for="">Serial Number</label>
                                <input type="text" name="serial_no" class="form-control" placeholder="Enter Serial No.">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Horse Power</label>
                                <input type="text" name="horse_power" class="form-control"
                                    placeholder="Enter Horse Power">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Registered Breadth</label>
                                <input type="text" name="breadth" class="form-control"
                                    placeholder="Enter Registered Breadth">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Registered Depth</label>
                                <input type="text" name="depth" class="form-control"
                                    placeholder="Enter Register Depth">
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary col-md-3">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

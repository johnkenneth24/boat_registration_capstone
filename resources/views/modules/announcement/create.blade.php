@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Add Announcement</h4>
                            </div>
                            <div class="card-tools">
                                <a href="{{ route('announcement.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="">Subject</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Subject">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Starting Date</label>
                                    <input type="date" name="" id="" class="form-control" placeholder="Enter Subject">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Ending Date</label>
                                    <input type="date" name="" id="" class="form-control" placeholder="Enter Subject">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Annoucnement Description</label>
                                    <textarea placeholder="Type here..." class="form-control" id=""  rows="5"></textarea>
                                </div>
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

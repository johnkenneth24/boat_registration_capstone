@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('announcement.update', $announcement->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card card-outline card-warning mt-5">
                            <div class="card-header">
                                <div class="card-title">
                                    <h4>Edit Announcement</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row border border-secondary">
                                    <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                        <h6 class="font-weight-bolder text-white m-0">Announcement</h6>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control" required
                                            placeholder="Title of the announcement" value="{{ $announcement->title }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Date</label>
                                        <input type="date" name="date" required
                                            value="{{ $announcement->date->format('Y-m-d') }}" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Announcement Content</label>
                                        <textarea placeholder="Type here..." required class="form-control" name="content" rows="5">{{ $announcement->content }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ route('announcement.index') }}" class="btn btn-danger col-md-2 mr-2">Cancel</a>
                                <button type="submit" class="btn btn-primary col-md-2">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

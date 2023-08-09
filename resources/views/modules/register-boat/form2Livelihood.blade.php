@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Step 2 | Application for Municipal Fisherfolk Registration </h4>
                            </div>
                            {{-- <div class="card-tools">
                                <a href="{{ route('reg-boat.index') }}" class="btn btn-danger">Cancel</a>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <div class="row border border-secondary">
                                <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                    <h5 class="font-weight-bolder text-white m-0">Livelihood</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="">Main Source of Income</label> <br>
                                            <div class="col-md-4">
                                                @foreach ($source_of_income as $item)
                                                    <label class="my-0 py-0">
                                                        <input type="checkbox" name="income_sources[]"
                                                            value="{{ $item }}">
                                                        {{ $item }}
                                                    </label><br>
                                                @endforeach
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input type="text" name="gear_used" id="gear" style="display: none;"
                                                    class="form-control form-control-sm mb-1"
                                                    placeholder="Specify Gear Used:">
                                                <input type="text" name="culture_method" id="culture"
                                                    style="display: none;" class="form-control form-control-sm mb-1"
                                                    placeholder="Specify Culture Method Used:">
                                                <input type="text" name="specify" id="specify" style="display: none;"
                                                    class="form-control form-control-sm" placeholder="Please Specify:">
                                            </div>
                                        </div>
                                    </div>
                                <div class="form-group col-md-6">
                                    <label for="">Other source of income</label>
                                    <input type="text" name="other_income_source"
                                        class="form-control form-control-sm specify" id="specify" value="">
                                </div>
                                </div>


                                <div class="col-md-12 mt-1 mb-2 py-1 bg-dark">
                                    <h5 class="font-weight-bolder text-white m-0">Organization</h5>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Organization Name</label>
                                    <input type="text" name="org_name" class="form-control form-control-sm"
                                        placeholder="Name of Organization">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Member Since</label>
                                    <input type="date" name="member_since" class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="">Position/Official Designation</label>
                                    <input type="text" name="position" class="form-control form-control-sm"
                                        placeholder="Position or Official Designation in the Organization" required>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary col-md-3">Submit</button>
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

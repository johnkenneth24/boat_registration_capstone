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
                        <form action="{{ route('form2.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="d-flex justify-content-center mb-3">
                                    <div class="progresses">
                                        <div class="steps">
                                            <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                        </div>
                                        <span class="line"></span>
                                        <div class="steps">
                                            <span class="font-weight-bolder">2</span>
                                        </div>
                                        <span class="line inactive"></span>
                                        <div class="steps inactive">
                                            <span class="font-weight-bolder">3</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row border border-secondary">
                                    <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                        <h6 class="font-weight-bolder text-white m-0">Livelihood</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="form1_id" value="{{ $regBoat->id }}">
                                            <div class="row">
                                                <label for="">Main Source of Income <span
                                                        class="text-danger">*</span>
                                                </label> <br>
                                                <div class="col-md-4">
                                                    @foreach ($source_of_income as $item)
                                                        <label class="my-0 py-0">
                                                            <input type="checkbox" name="income_sources[]"
                                                                value="{{ $item }}"
                                                                class="@error('income_sources[]') is-invalid @enderror">
                                                            {{ $item }}
                                                        </label><br>
                                                    @endforeach
                                                    @error('income_sources[]')
                                                        <div class="invalid-feedback" style="display: inline-block !important;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <input type="text" name="gear_used" id="gear"
                                                        style="display: none;" class="form-control form-control-sm mb-1"
                                                        placeholder="Specify Gear Used (required):">
                                                    <input type="text" name="culture_method" id="culture"
                                                        style="display: none;" class="form-control form-control-sm mb-1"
                                                        placeholder="Specify Culture Method Used (required):">
                                                    <input type="text" name="specify" id="specify"
                                                        style="display: none;" class="form-control form-control-sm"
                                                        placeholder="Please Specify (required):">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="">Other Source of Income</label> <br>
                                                <div class="col-md-4">
                                                    @foreach ($source_of_income as $item)
                                                        <label class="my-0 py-0">
                                                            <input type="checkbox" name="other_income_sources[]"
                                                                value="{{ $item }}"
                                                                class="@error('other_income_sources[]') is-invalid @enderror">
                                                            {{ $item }}
                                                        </label><br>
                                                    @endforeach
                                                    @error('other_income_sources[]')
                                                        <div class="invalid-feedback" style="display: inline-block !important;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <input type="text" name="gear_used_os" id="gear_os"
                                                        style="display: none;" class="form-control form-control-sm mb-1"
                                                        placeholder="Specify Gear Used (required):">
                                                    <input type="text" name="culture_method_os" id="culture_os"
                                                        style="display: none;" class="form-control form-control-sm mb-1"
                                                        placeholder="Specify Culture Method Used (required):">
                                                    <input type="text" name="specify_os" id="specify_os"
                                                        style="display: none;" class="form-control form-control-sm"
                                                        placeholder="Please Specify (required):">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-1 mb-2 py-1 bg-dark">
                                        <h6 class="font-weight-bolder text-white m-0">Organization</h6>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Organization Name</label>
                                        <input type="text" name="org_name" class="form-control form-control-sm"
                                            placeholder="Name of Organization">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Member Since</label>
                                        <input type="date" name="member_since" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="">Position/Official Designation</label>
                                        <input type="text" name="position" class="form-control form-control-sm"
                                            placeholder="Position or Official Designation in the Organization">
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary col-md-3">Submit</button>
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

@extends('layouts.app')

@section('styles')
    <style>
        .col-md-12.text-center h5::before,
        .col-md-12.text-center h5::after {
            content: "";
            display: inline-block;
            border-top: 1px solid #646464;
            margin: 0 5px;
            vertical-align: middle;
        }

        /* Media query for small screens */
        @media (max-width: 767px) {

            .col-md-12.text-center h5::before,
            .col-md-12.text-center h5::after {
                width: 20%;
            }
        }

        /* Media query for larger screens */
        @media (min-width: 768px) {

            .col-md-12.text-center h5::before,
            .col-md-12.text-center h5::after {
                width: 30%;
            }
        }
    </style>
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-warning mt-5">
                        <div class="card-header m-0 mb-0">
                            <div class="card-title">
                                <h4 class="text-uppercase">Boat Registration</h4>
                            </div>
                        </div>
                        <form action="{{ route('reg-boat.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body mt-0">
                                <div class="row border border-secondary">
                                    <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                        <h6 class="font-weight-bolder text-white m-0">Registration</h6>
                                    </div>
                                    <input type="hidden" name="owner_id" value="{{ $ownerInfo?->id ?: '' }}">
                                    <div class="form-group col-md-6">
                                        <label>Registration Number</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">IMS -</span>
                                            </div>
                                            <input type="text" name="registration_no"
                                                class="form-control form-control-sm" readonly required
                                                value="{{ $latestregNo }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Registration Date</label>
                                        <input type="hidden" name="registration_date" readonly value="{{ date('Y-m-d') }}">
                                        <input type="text" readonly class="form-control form-control-sm"
                                            value="{{ date('F d, Y') }}">
                                    </div>
                                    <div class="col-md-12 mt-1 mb-2 py-1 bg-dark">
                                        <h6 class="font-weight-bolder text-white m-0">Boat Details</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>Name of Fishing Vessel <span class="text-danger">*</span></label>
                                                    <input type="text" name="vessel_name"
                                                        class="form-control form-control-sm @error('vessel_name') is-invalid @enderror"
                                                        value="{{ old('vessel_name') }}"
                                                        placeholder="Vessel Name (e.g., M.V. Gregorio)" required>
                                                    @error('vessel_name')
                                                        <div class="invalid-feedback" style="display: inline-block !important;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Home Port <span class="text-danger">*</span></label>
                                                    <input type="text" name="home_port" required
                                                        class="form-control form-control-sm @error('home_port') is-invalid @enderror"
                                                        value="{{ old('home_port') }}"
                                                        placeholder="e.g., Zone 6, Bulan, Sorsogon">
                                                    @error('home_port')
                                                        <div class="invalid-feedback" style="display: inline-block !important;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Place Built <span class="text-danger">*</span></label>
                                                    <input type="text" name="place_built" required
                                                        class="form-control form-control-sm @error('place_built') is-invalid @enderror"
                                                        value="{{ old('place_built') }}"
                                                        placeholder="e.g., Zone 6, Bulan, Sorsogon">
                                                    @error('place_built')
                                                        <div class="invalid-feedback" style="display: inline-block !important;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Year Built <span class="text-danger">*</span></label>
                                                    <input type="month" name="year_built" required
                                                        max="{{ date('Y-m') }}"
                                                        class="form-control form-control-sm @error('year_built') is-invalid @enderror"
                                                        value="{{ old('year_built') }}">
                                                    @error('year_built')
                                                        <div class="invalid-feedback" style="display: inline-block !important;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>Type of Fishing Vessel <span class="text-danger">*</span></label>
                                                    <select name="vessel_type" class="form-control form-control-sm" required
                                                        id="vessel_type">
                                                        <option value="">--Please Select--</option>
                                                        <option value="Motorized">Motorized</option>
                                                        <option value="Non-Motorized">Non-Motorized</option>
                                                    </select>
                                                    @error('vessel_type')
                                                        <div class="invalid-feedback" style="display: inline-block !important;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12" id="motorized-group" style="display: none;">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Engine Make <span class="text-danger">*</span></label>
                                                            <input type="text" name="engine_make" id="engine-make"
                                                                class="form-control form-control-sm @error('engine_make') is-invalid @enderror"
                                                                value="{{ old('engine_make') }}"
                                                                placeholder="e.g., Fuso, Yamaha">
                                                            @error('engine_make')
                                                                <div class="invalid-feedback"
                                                                    style="display: inline-block !important;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Horsepower <span class="text-danger">*</span></label>
                                                            <div class="input-group input-group-sm">
                                                                <input type="number" min="1" step="0.01"
                                                                    name="horsepower" id="horsepower"
                                                                    class="form-control form-control-sm text-right @error('horsepower') is-invalid @enderror"
                                                                    value="{{ old('horsepower') }}" placeholder="0">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">HP (Horsepower)</span>
                                                                </div>
                                                            </div>
                                                            @error('horsepower')
                                                                <div class="invalid-feedback"
                                                                    style="display: inline-block !important;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Engine Serial Number <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="serial_number" id="serial_number"
                                                                class="form-control form-control-sm @error('serial_number') is-invalid @enderror"
                                                                value="{{ old('serial_number') }}"
                                                                placeholder="e.g., 123-45678-ABC">
                                                            @error('serial_number')
                                                                <div class="invalid-feedback"
                                                                    style="display: inline-block !important;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-12 mt-1 mb-2 py-1 bg-dark">
                                        <h6 class="font-weight-bolder text-center text-uppercase text-white m-0">Dimension
                                            and Tonnages</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Body Number <span class="text-danger">*</span></label>
                                                <input type="number" min="1" name="body_number"
                                                    class="form-control form-control-sm @error('body_number') is-invalid @enderror"
                                                    value="{{ old('body_number') }}"
                                                    placeholder="Body number of the Vessel" required>
                                                @error('body_number')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Color <span class="text-danger">*</span></label>
                                                <input type="text" name="color"
                                                    class="form-control form-control-sm @error('color') is-invalid @enderror"
                                                    value="{{ old('color') }}"
                                                    placeholder="Color (e.g., gray, dark-blue, yellow)" required>
                                                @error('color')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Materials Used <span class="text-danger">*</span></label>
                                                <input type="text" name="materials_used"
                                                    class="form-control form-control-sm
                                            @error('materials_used') is-invalid @enderror"
                                                    placeholder="Materials used in building the vessel" required
                                                    value="{{ old('materials_used') }}">
                                                @error('materials_used')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <hr class="dark horizontal">
                                            <div class="form-group col-md-4">
                                                <label>Registered Length <span class="text-danger">*</span></label>
                                                <input type="number" min="0" step="0.01" name="length"
                                                    class="form-control form-control-sm @error('length') is-invalid @enderror"
                                                    value="{{ old('length') }}" placeholder="(in meters)" required>
                                                @error('length')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Registered Breadth <span class="text-danger">*</span></label>
                                                <input type="number" min="0" step="0.01" name="breadth"
                                                    class="form-control form-control-sm @error('breadth') is-invalid @enderror"
                                                    value="{{ old('breadth') }}" placeholder="(in meters)" required>
                                                @error('breadth')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Registered Depth <span class="text-danger">*</span></label>
                                                <input type="number" min="0" step="0.01" name="depth"
                                                    class="form-control form-control-sm @error('depth') is-invalid @enderror"
                                                    value="{{ old('depth') }}" placeholder="(in meters)" required>
                                                @error('depth')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Tonnage Length <span class="text-danger">*</span></label>
                                                <input type="number" min="0" step="0.01"
                                                    name="tonnage_length"
                                                    class="form-control form-control-sm @error('tonnage_length') is-invalid @enderror"
                                                    value="{{ old('tonnage_length') }}" placeholder="(in meters)"
                                                    required>
                                                @error('tonnage_length')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Tonnage Breadth <span class="text-danger">*</span></label>
                                                <input type="number" min="0" step="0.01"
                                                    name="tonnage_breadth"
                                                    class="form-control form-control-sm @error('tonnage_breadth') is-invalid @enderror"
                                                    value="{{ old('tonnage_breadth') }}" placeholder="(in meters)"
                                                    required>
                                                @error('tonnage_breadth')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Tonnage Depth <span class="text-danger">*</span></label>
                                                <input type="number" min="0" step="0.01" name="tonnage_depth"
                                                    class="form-control form-control-sm @error('tonnage_depth') is-invalid @enderror"
                                                    value="{{ old('tonnage_depth') }}" placeholder="(in meters)"
                                                    required>
                                                @error('tonnage_depth')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Gross Tonnage</label>
                                                <input type="number" min="0" step="0.01" name="gross_tonnage"
                                                    required value="{{ old('gross_tonnage') }}" required
                                                    class="form-control form-control-sm @error('gross_tonnage') is-invalid @enderror">
                                                @error('gross_tonnage')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Net Tonnage</label>
                                                <input type="number" min="0" step="0.01" name="net_tonnage"
                                                     required value="{{ old('net_tonnage') }}" required
                                                    class="form-control form-control-sm @error('net_tonnage') is-invalid @enderror">
                                                @error('net_tonnage')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group">
                                                <label>Upload Colored Image of the Boat</label>
                                                <input type="file" name="image"
                                                    class="form-control form-control-sm  @error('image') is-invalid @enderror"
                                                    value="{{ old('image') }}" id="image" required>
                                                @error('image')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <img src="/images/upload.gif" alt="" id="preview"
                                                    class="img-fluid img-thumbnail mb-2">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ route('reg-boat.index') }}" class="btn btn-danger col-md-2 mr-2">Cancel</a>
                                <button type="submit" class="btn btn-primary col-md-2">Submit</button>
                            </div>
                        </form>
                        {{-- <div class="overlay dark">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const vessel_type = document.querySelector('#vessel_type');
        const motorized_group = document.querySelector('#motorized-group');
        const engine_make = document.querySelector('#engine-make');
        const horsepower = document.querySelector('#horsepower');
        const serial_number = document.querySelector('#serial_number');

        vessel_type.addEventListener('change', function() {
            if (this.value === 'Motorized') {
                motorized_group.style.display = 'block';
                engine_make.setAttribute('required', true);
                horsepower.setAttribute('required', true);
                serial_number.setAttribute('required', true);
            } else {
                motorized_group.style.display = 'none';
                engine_make.removeAttribute('required');
                horsepower.removeAttribute('required');
                serial_number.removeAttribute('required');
            }
        });
    </script>

    <script>
        function previewImage() {
            var preview = document.querySelector('#preview');
            var file = document.querySelector('#image').files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                preview.src = reader.result;
            }
            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
        var imageInput = document.querySelector('#image');
        imageInput.addEventListener('change', previewImage);
    </script>
@endsection

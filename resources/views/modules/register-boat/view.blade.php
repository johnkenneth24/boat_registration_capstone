@extends('layouts.app')

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
                        <form method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body mt-0">

                                <div class="row border border-secondary">
                                    <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                        <h6 class="font-weight-bolder text-white m-0">Registration</h6>
                                    </div>
                                    {{-- <input type="hidden" name="owner_id" value="{{ $boatReg?->owner_id }}"> --}}
                                    <div class="form-group col-md-6">
                                        <label>Registration Number</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">IMS -</span>
                                            </div>
                                            <input type="text" name="registration_no"
                                                class="form-control form-control-sm" readonly
                                                value="{{ $boatReg->registration_no }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Registration Date</label>
                                        <input type="date" name="registration_date" class="form-control form-control-sm"
                                            readonly value="{{ $boatReg->registration_date }}">
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
                                                        class="form-control form-control-sm"
                                                        value="{{ $boatReg->boat->vessel_name }}"
                                                        placeholder="Vessel Name (e.g., M.V. Gregorio)" readonly>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Home Port <span class="text-danger">*</span></label>
                                                    <input type="text" name="home_port" readonly
                                                        class="form-control form-control-sm"
                                                        value="{{ $boatReg->boat->home_port }}"
                                                        placeholder="e.g., Zone 6, Bulan, Sorsogon">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Place Built <span class="text-danger">*</span></label>
                                                    <input type="text" name="place_built" readonly
                                                        class="form-control form-control-sm"
                                                        value="{{ $boatReg->boat->place_built }}"
                                                        placeholder="e.g., Zone 6, Bulan, Sorsogon">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Year Built <span class="text-danger">*</span></label>
                                                    <input type="month" name="year_built" readonly
                                                        max="{{ date('Y-m') }}" class="form-control form-control-sm"
                                                        value="{{ $boatReg->boat->year_built }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>Type of Fishing Vessel <span class="text-danger">*</span></label>
                                                    <select name="vessel_type" disabled class="form-control form-control-sm"
                                                        id="vessel_type">
                                                        <option value="">--Please Select--</option>
                                                        <option value="Motorized" @selected($boatReg->boat->boat_type == 'Motorized')>Motorized
                                                        </option>
                                                        <option value="Non-Motorized" @selected($boatReg->boat->boat_type == 'Non-Motorized')>
                                                            Non-Motorized</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12" id="motorized-group">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Engine Make <span class="text-danger">*</span></label>
                                                            <input type="text" name="engine_make" id="engine-make"
                                                                class="form-control form-control-sm" readonly
                                                                value="{{ $boatReg->boat->engine_make }}"
                                                                placeholder="e.g., Fuso, Yamaha">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Horsepower <span class="text-danger">*</span></label>
                                                            <div class="input-group input-group-sm">
                                                                <input type="number" min="1" step="0.01"
                                                                    name="horsepower" id="horsepower" readonly
                                                                    class="form-control form-control-sm text-right"
                                                                    value="{{ $boatReg->boat->horsepower }}"
                                                                    placeholder="0">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">HP (Horsepower)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Engine Serial Number <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="serial_number" id="serial_number"
                                                                class="form-control form-control-sm" readonly
                                                                value="{{ $boatReg->boat->serial_number }}"
                                                                placeholder="e.g., 123-45678-ABC">
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
                                                    class="form-control form-control-sm"
                                                    value="{{ $boatReg->boat->body_number }}"
                                                    placeholder="Body number of the Vessel" readonly>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Color <span class="text-danger">*</span></label>
                                                <input type="text" name="color" class="form-control form-control-sm"
                                                    value="{{ $boatReg->boat->color }}"
                                                    placeholder="Color (e.g., gray, dark-blue, yellow)" readonly>

                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Materials Used <span class="text-danger">*</span></label>
                                                <input type="text" name="materials_used"
                                                    class="form-control form-control-sm
                                                "
                                                    placeholder="Materials used in building the vessel" readonly
                                                    value="{{ $boatReg->boat->materials }}">
                                            </div>
                                            <hr class="dark horizontal">
                                            <div class="form-group col-md-4">
                                                <label>Registered Length <span class="text-danger">*</span></label>
                                                <input type="number" min="0" step="0.01" name="length"
                                                    class="form-control form-control-sm"
                                                    value="{{ $boatReg->boat->length }}"
                                                    placeholder="Registered Length of the Vessel (in meters)" readonly>

                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Registered Breadth <span class="text-danger">*</span></label>
                                                <input type="number" min="0" step="0.01" name="breadth"
                                                    class="form-control form-control-sm"
                                                    value="{{ $boatReg->boat->breadth }}"
                                                    placeholder="Registered Breadth of the Vessel  (in meters)" readonly>

                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Registered Depth <span class="text-danger">*</span></label>
                                                <input type="number" min="0" step="0.01" name="depth"
                                                    class="form-control form-control-sm"
                                                    value="{{ $boatReg->boat->depth }}"
                                                    placeholder="Registered Depth of the Vessel  (in meters)" readonly>

                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Tonnage Length <span class="text-danger">*</span></label>
                                                <input type="number" min="0" step="0.01"
                                                    name="tonnage_length" class="form-control form-control-sm"
                                                    value="{{ $boatReg->boat->tonnage_length }}"
                                                    placeholder="Tonnage Length of the Vessel (in meters)" readonly>
                                                @error('tonnage_length')
                                                    <div class="invalid-feedback" style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Tonnage Breadth <span class="text-danger">*</span></label>
                                                <input type="number" min="0" step="0.01"
                                                    name="tonnage_breadth" class="form-control form-control-sm"
                                                    value="{{ $boatReg->boat->tonnage_breadth }}"
                                                    placeholder="Tonnage Breadth of the Vessel  (in meters)" readonly>

                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Tonnage Depth <span class="text-danger">*</span></label>
                                                <input type="number" min="0" step="0.01" name="tonnage_depth"
                                                    class="form-control form-control-sm"
                                                    value="{{ $boatReg->boat->tonnage_depth }}"
                                                    placeholder="Tonnage Depth of the Vessel  (in meters)" readonly>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Gross Tonnage</label>
                                                <input type="number" min="0" step="0.01" name="gross_tonnage"
                                                    readonly value="{{ $boatReg->boat->gross_tonnage }}"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Net Tonnage</label>
                                                <input type="number" min="0" step="0.01" name="net_tonnage"
                                                    readonly value="{{ $boatReg->boat->net_tonnage }}"
                                                    class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group">
                                                <label>Image of the Boat</label>
                                                <img src="/images/user-upload/{{ $boatReg->boat->image }}"
                                                    alt="image-preview" id="preview" class="img-fluid img-thumbnail"
                                                    data-image="{{ $boatReg->boat->image }}">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ route('reg-boat.index') }}" class="btn btn-primary col-md-2 mr-2">
                                    <span><i class="fa fa-arrow-left" aria-hidden="true"></i></span>
                                    Go Back</a>
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

@section('scripts')
    <script>
        const vessel_type = document.querySelector('#vessel_type');
        const motorized_group = document.querySelector('#motorized-group');
        const engine_make = document.querySelector('#engine-make');
        const horsepower = document.querySelector('#horsepower');
        const serial_number = document.querySelector('#serial_number');
        // check first if the vessel type has value of motorized
        if (vessel_type.value === 'Motorized') {
            motorized_group.style.display = 'block';
            engine_make.setAttribute('readonly', true);
            horsepower.setAttribute('readonly', true);
            serial_number.setAttribute('readonly', true);
        } else {
            motorized_group.style.display = 'none';
            engine_make.removeAttribute('readonly');
            horsepower.removeAttribute('readonly');
            serial_number.removeAttribute('readonly');
        }
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

    <script>
        // Get the image element
        const image = document.getElementById('preview');
        // Get the data-image attribute value (the image filename)
        const imageName = image.getAttribute('data-image');
        // Check if the image exists
        const imageExists = new Image();
        imageExists.onload = function() {
            // Image exists, set the src attribute to the original path
            image.src = `/images/user-upload/${imageName}`;
        };
        imageExists.onerror = function() {
            // Image doesn't exist, set the src attribute to the default image path
            image.src = '/images/imgnotfound.png';
        };
        // Set the source of the imageExists to trigger the load or error event
        imageExists.src = `/images/user-upload/${imageName}`;
    </script>
@endsection

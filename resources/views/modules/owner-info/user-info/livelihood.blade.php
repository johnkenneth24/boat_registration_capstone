@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <form action="{{ route('owner-info.livelihoodStore') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row border border-secondary">
                                    <div class="col-md-12 mt-0 mb-2  pt-0 pb-1 bg-dark">
                                        <h6 class="font-weight-bolder text-white m-0">Livelihood</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="ownerinfoId" value="{{ $form1_id }}">
                                            <div class="row">
                                                <label for="">Main Source of Income <span
                                                        class="text-danger">*</span>
                                                </label> <br>
                                                <div class="col-md-4">
                                                    @php
                                                        if ($livelihood !== null) {
                                                            $savedSourceOfIncome = unserialize($livelihood->source_of_income);
                                                        } else {
                                                            $savedSourceOfIncome = [];
                                                        }
                                                    @endphp

                                                    @foreach ($source_of_income as $item)
                                                        <label class="my-0 py-1">
                                                            <input type="checkbox" name="source_of_income[]"
                                                                value="{{ $item }}"
                                                                class="@error('source_of_income[]') is-invalid @enderror"
                                                                {{ in_array($item, $savedSourceOfIncome) ? 'checked' : '' }}>
                                                            {{ $item }}
                                                        </label><br>
                                                    @endforeach

                                                    @error('source_of_income[]')
                                                        <div class="invalid-feedback" style="display: inline-block !important;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <div id="gear_div" style="display: none;">
                                                        <label for="gear" class="mb-0 pb-0">Specify Gear Used:</label>
                                                        <input type="text" name="gear_used" id="gear"
                                                            value="{{ $livelihood?->gear_used ?: old('gear_used') }}"
                                                            class="form-control form-control-sm mb-1"
                                                            placeholder="Specify Gear Used (required):">
                                                    </div>
                                                    <div id="culture_div" style="display:none;">
                                                        <label for="culture" class="mb-0 pb-0">Specify Culture
                                                            method:</label>
                                                        <input type="text" name="culture_method" id="culture"
                                                            value="{{ $livelihood?->culture_method ?: old('culture_method') }}"
                                                            class="form-control form-control-sm mb-1"
                                                            placeholder="Specify Culture Method Used (required):">
                                                    </div>
                                                    <div id="specify_div" style="display:none;">
                                                        <label for="specify" class="mb-0 pb-0">Please Specify:</label>
                                                        <input type="text" name="specify" id="specify"
                                                            value="{{ $livelihood?->specify ?: old('specify') }}"
                                                            class="form-control form-control-sm"
                                                            placeholder="Please Specify (required):">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="">Other Source of Income</label> <br>
                                                <div class="col-md-4">
                                                    @php
                                                        if ($livelihood !== null) {
                                                            $otherSourceOfIncome = unserialize($livelihood->other_income_sources);
                                                        } else {
                                                            $otherSourceOfIncome = [];
                                                        }
                                                    @endphp

                                                    @foreach ($source_of_income as $oSi)
                                                        <label class="my-0 py-1">
                                                            <input type="checkbox" name="other_income_sources[]"
                                                                value="{{ $oSi }}"
                                                                class="@error('other_income_sources[]') is-invalid @enderror"
                                                                {{ in_array($oSi, $otherSourceOfIncome) ? 'checked' : '' }}>
                                                            {{ $oSi }}
                                                        </label><br>
                                                    @endforeach
                                                    @error('other_income_sources[]')
                                                        <div class="invalid-feedback" style="display: inline-block !important;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <div id="gear_os_div" style="display:none;">
                                                        <label for="gear_os" class="mb-0 pb-0">Specify Gear Used:</label>
                                                        <input type="text" name="gear_used_os" id="gear_os"
                                                            value="{{ $livelihood?->gear_used_os ?: old('gear_used_os') }}"
                                                            class="form-control form-control-sm mb-1"
                                                            placeholder="Specify Gear Used (required):">
                                                    </div>
                                                    <div id="culture_os_div" style="display:none;">
                                                        <label for="culture_os" class="mb-0 pb-0">Specify Culture
                                                            method:</label>
                                                        <input type="text" name="culture_method_os" id="culture_os"
                                                            value="{{ $livelihood?->culture_method_os ?: old('culture_method_os') }}"
                                                            class="form-control form-control-sm mb-1"
                                                            placeholder="Specify Culture Method Used (required):">
                                                    </div>
                                                    <div id="specify_os_div" style="display:none;">
                                                        <label for="specify_os" class="mb-0 pb-0">Please Specify:</label>
                                                        <input type="text" name="specify_os" id="specify_os"
                                                            value="{{ $livelihood?->specify_os ?: old('specify_os') }}"
                                                            class="form-control form-control-sm"
                                                            placeholder="Please Specify (required):">
                                                    </div>
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
                                            value="{{ $livelihood?->org_name ?: old('org_name') }}"
                                            placeholder="Name of Organization">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Member Since</label>
                                        <input type="date" name="member_since" class="form-control form-control-sm"
                                            value="{{ $livelihood?->member_since ?: old('member_since') }}">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="">Position/Official Designation</label>
                                        <input type="text" name="position" class="form-control form-control-sm"
                                            value="{{ $livelihood?->position ?: old('position') }}"
                                            placeholder="Position or Official Designation in the Organization">
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ route('owner-info.edit', $form1_id ?? auth()->user()->id) }}"
                                    class="btn btn-danger col-md-2 mr-2">Go
                                    back</a>
                                <button type="submit" class="btn btn-primary col-md-2">Submit</button>
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
        const checkboxes = document.querySelectorAll('input[name="source_of_income[]"]');
        const gearInput = document.querySelector('#gear');
        const gearDiv = document.querySelector('#gear_div');

        const cultureInput = document.querySelector('#culture');
        const cultureDiv = document.querySelector('#culture_div');

        const specifyInput = document.querySelector('#specify');
        const specifyDiv = document.querySelector('#specify_div');

        const otherCheckboxes = document.querySelectorAll('input[name="other_income_sources[]"]');
        const gearInputOs = document.querySelector('#gear_os');
        const gearInputOsDiv = document.querySelector('#gear_os_div');

        const cultureInputOs = document.querySelector('#culture_os');
        const cultureInputOsDiv = document.querySelector('#culture_os_div');

        const specifyInputOs = document.querySelector('#specify_os');
        const specifyInputOsDiv = document.querySelector('#specify_os_div');

        // check first if the checkbox is checked and gearInput is not empty, if checked and has value, then display the gearInput field
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked && gearInput.value !== '') {
                gearDiv.style.display = 'block';
            }

            if (checkbox.checked && cultureInput.value !== '') {
                cultureDiv.style.display = 'block';
            }

            if (checkbox.checked && specifyInput.value !== '') {
                specifyDiv.style.display = 'block';
            }
        });

        otherCheckboxes.forEach(function(checkbox) {
            if (checkbox.checked && gearInputOs.value !== '') {
                gearInputOsDiv.style.display = 'block';
            }

            if (checkbox.checked && cultureInputOs.value !== '') {
                cultureInputOsDiv.style.display = 'block';
            }

            if (checkbox.checked && specifyInputOs.value !== '') {
                specifyInputOsDiv.style.display = 'block';
            }
        });


        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('input', function() {
                if (this.checked) {
                    if (this.value === 'Capture Fishing') {
                        gearDiv.style.display = 'block';
                        gearInput.setAttribute('required', 'required');
                    } else if (this.value === 'Aquaculture') {
                        cultureDiv.style.display = 'block';
                        cultureInput.setAttribute('required', 'required');
                    } else if (this.value === 'Other') {
                        specifyDiv.style.display = 'block';
                        specifyInput.setAttribute('required', 'required');

                    }
                } // if unchecked remove the input
                else {
                    if (this.value === 'Capture Fishing') {
                        gearInput.removeAttribute('required');
                        gearInput.value = '';
                        gearDiv.style.display = 'none';
                    } else if (this.value === 'Aquaculture') {
                        cultureInput.removeAttribute('required');
                        cultureInput.value = '';
                        cultureDiv.style.display = 'none';
                    } else if (this.value === 'Other') {
                        specifyInput.removeAttribute('required');
                        specifyInput.value = '';
                        specifyDiv.style.display = 'none';
                    }
                }
            });
        });

        otherCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener('input', function() {
                if (this.checked) {
                    if (this.value === 'Capture Fishing') {
                        gearInputOsDiv.style.display = 'block';
                        gearInputOs.setAttribute('required', 'required');
                    } else if (this.value === 'Aquaculture') {
                        cultureInputOsDiv.style.display = 'block';
                        cultureInputOs.setAttribute('required', 'required');
                    } else if (this.value === 'Other') {
                        specifyInputOsDiv.style.display = 'block';
                        specifyInputOs.setAttribute('required', 'required');

                    }
                } // if unchecked remove the input
                else {
                    if (this.value === 'Capture Fishing') {
                        gearInputOs.removeAttribute('required');
                        gearInputOs.value = '';
                        gearInputOsDiv.style.display = 'none';
                    } else if (this.value === 'Aquaculture') {
                        cultureInputOs.removeAttribute('required');
                        cultureInputOs.value = '';
                        cultureInputOsDiv.style.display = 'none';
                    } else if (this.value === 'Other') {
                        specifyInputOs.removeAttribute('required');
                        specifyInputOs.value = '';
                        specifyInputOsDiv.style.display = 'none';
                    }
                }
            });
        });
    </script>
@endsection

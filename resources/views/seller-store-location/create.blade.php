@extends('layouts.master')
@section('title')
    Add Seller Store
@endsection
@section('css')
    <!-- extra css -->
@endsection
@section('content')
    <x-breadcrumb title="Add Seller Store" pagetitle="Seller Store" />
    <form method="POST" action="{{ !empty($sellerStore) ? route('sellerStore.update') : route('sellerStore.save') }}"
        class="needs-validation">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ isset($sellerStore->id) ? $sellerStore->id : '' }}" />
        <div class="card-header mt-3">
            <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                    <div class="avatar-sm">
                        <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                            <i class="bi bi-box-seam"></i>
                        </div>
                    </div>
                </div>
                <div class="flex-grow-1">
                    <h1 class="card-title mb-1">Seller Store/Shope Information</h1>
                    <p class="text-muted mb-0">Fill all information below.</p>
                </div>
            </div>
        </div>
        <div class="col-xl-0 col-lg-12 mt-3">
            <div class="row">
                <div class="col-xl-6 col-lg-6   ">
                    <label class="form-label" for="Seller">Seller</label>
                    <select class="form-select" id="seller_id" type="text" name="seller_id"
                        class="form-control select2 form-control mb-3 custom-select">
                        <option value="">Please Select Seller</option>
                        @foreach ($dropDownData['sellers'] as $key => $value)
                            <option value="{{ $key }}"
                                {{ (old('seller_id') == $key ? 'selected' : '') || (!empty($seller->seller_id) ? collect($seller->seller_id)->contains($key) : '') ? 'selected' : '' }}>
                                {{ $value }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
        </div>
        <div class="col-xl-0 col-lg-12 mt-3">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <label class="form-label" for="product-title-input">Seller Store/Shope Name</label>
                    <input type="text" class="form-control"
                        value="{{ old('store_name', !empty($seller->store_name) ? $seller->store_name : '') }}"
                        id="store_name" name="store_name[]" placeholder="Enter the Shope Name">
                </div>
                <div class="col-xl-6 col-lg-6">
                    <label class="form-label" for="product-title-input">Shope Contact#</label>
                    <input type="text" class="form-control"
                        value="{{ old('shope_contact_no', !empty($seller->shope_contact_no) ? $seller->shope_contact_no : '') }}"
                        id="shope_contact_no" name="shope_contact_no[]" placeholder="Contact Number">
                </div>
            </div>
        </div>
        <div class="col-xl-0 col-lg-12">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <label class="form-label" for="product-title-input">Country</label>
                    <select id="country-dropdown" class="form-control" name="country_id[]">
                        <option value="">-- Select Country --</option>
                        @foreach ($countries as $data)
                            <option value="{{ $data->id }}">
                                {{ $data->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-xl-6 col-lg-6">
                    <label class="form-label" for="product-title-input">Province</label>
                    <select id="province-dropdown" name="province_id[]" class="form-control">
                        <option value="">-- Select Province --</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xl-0 col-lg-12">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <label class="form-label" for="product-title-input">City</label>
                    <select id="city-dropdown" name="city_id[]" class="form-control">
                        <option value="">-- Select City --</option>
                    </select>
                </div>

                <div class="col-xl-6 col-lg-6">
                    <label class="form-label" for="product-title-input">Area</label>
                    <select id="area-dropdown" name="area_id[]" class="form-control">
                        <option value="">-- Select Area --</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xl-0 col-lg-12">

            <label class="form-label" for="product-title-input">Address</label>
            <textarea type="textarea" id="address" name="address[]" placeholder="Additional Address..." class="form-control"
                required>{{ @$seller->address }}</textarea>
        </div>

        <div class="col-xl-0 col-lg-12">
            <label class="form-label" for="product-title-input">Description</label>
            <textarea type="textarea" id="description" name="description[]" placeholder="Seller Store Description..."
                class="form-control" required>{{ @$seller->description }}</textarea>
        </div>

        <div class="modal-footer mt-4">
            <div class="hstack gap-2 justify-content-end">
                <button type="submit" style="float: right;" class="btn btn-success w-sm">Save</button>
                <a href="{{ route('sellerStore.list') }}" style="float: right;"
                    class="btn btn-dark rounded bs-popover ml-0 mt-0  mb-0">Cancel</a>
            </div>
        </div>
        <!-- end card -->
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#country-dropdown').on('change', function() {
                var idCountry = this.value;
                $("#province-dropdown").html('');
                $.ajax({
                    url: "{{ url('api/fetch-provinces') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#province-dropdown').html(
                            '<option value="">-- Select province --</option>');
                        $.each(result.provinces, function(key, value) {
                            $("#province-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $('#area-dropdown').html('<option value="">-- Select Area --</option>');

                    }
                });
            });

            /*------------------------------------------
            --------------------------------------------
            Province Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#province-dropdown').on('change', function() {
                var idProvince = this.value;
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{ url('api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        province_id: idProvince,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function(key, value) {
                            $("#city-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#area-dropdown').html('<option value="">-- Select Area --</option>');
                    }
                });
            });

            $('#city-dropdown').on('change', function() {
                var cityId = this.value;
                $("#area-dropdown").html('');
                $.ajax({
                    url: "{{ url('api/fetch-areas') }}",
                    type: "POST",
                    data: {
                        city_id: cityId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(resul) {
                        $('#area-dropdown').html('<option value="">-- Select Area --</option>');
                        $.each(resul.areas, function(key, value) {
                            $("#area-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

        });
    </script>
@endsection
@section('scripts')
    <!-- ckeditor -->
    <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/ckeditor.js') }}"></script>

    <!-- dropzone js -->
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <!-- create-product -->
    <script src="{{ URL::asset('build/js/backend/create-product.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

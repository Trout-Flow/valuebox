@extends('layouts.master')
@section('title')
    Add Seller
@endsection
@section('css')
    <!-- extra css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/classic.min.css') }}" /> <!-- 'classic' theme -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/monolith.min.css') }}" /> <!-- 'monolith' theme -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/nano.min.css') }}" /> <!-- 'nano' theme -->
    <!-- Sweet Alert css-->
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <x-breadcrumb title="Add Seller" pagetitle="Seller" />
    <form method="post" action="{{ !empty($seller) ? route('seller.update') : route('seller.save') }}"
        class="needs-validation" id="seller" name="seller" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ isset($seller->id) ? $seller->id : '' }}" />
        <div class="form-group">
            <div class="card-header">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar-sm">
                            <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                                <i class="bi bi-box-seam"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-1">Seller Information</h5>
                        <p class="text-muted mb-0">Fill all information below.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-0 col-lg-12 mt-3">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <label class="form-label" for="product-title-input">Seller Name</label>
                        <input type="text" class="form-control"
                            value="{{ old('name', !empty($seller->name) ? $seller->name : '') }}" id="name"
                            name="name" placeholder="Enter the Seller Name">
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <label class="form-label" for="product-title-input">Email</label>
                        <input type="email" class="form-control"
                            value="{{ old('email', !empty($seller->email) ? $seller->email : '') }}" id="email"
                            name="email" placeholder="Enter the Email">
                    </div>
                </div>
            </div>
            <div class="col-xl-0 col-lg-12">
                <div class="row">

                    <div class="col-xl-6 col-lg-6">
                        <label class="form-label" for="product-title-input">Password</label>
                        <input type="text" class="form-control" id="password" name="password"
                            placeholder="Enter the Password">
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <label class="form-label" for="product-title-input">Confirm Password</label>
                        <input type="text" class="form-control" id="confirm_password" name="confirm_password"
                            placeholder="Please enter your password again">
                    </div>
                </div>
            </div>
            <div class="col-xl-0 col-lg-12">
                <div class="row">

                    <div class="col-xl-6 col-lg-6">
                        <label class="form-label" for="product-title-input">CNIC No</label>
                        <input type="text" class="form-control"
                            value="{{ old('cnic_no', !empty($seller->cnic_no) ? $seller->cnic_no : '') }}" id="cnic_no"
                            name="cnic_no" placeholder="Enter the CNIC No">
                    </div>
                </div>
            </div>
            <div class="col-xl-0 col-lg-12 mt-3">
                <div class="row">
                    <div class="col-xl-0 col-lg-6">
                        <div class="card-body">
                            <div class="dropzone my-dropzone">
                                <div class="dz-message">
                                    <label class="form-label" for="product-title-input">CNIC Front</label>
                                    <div class="mb-3 ">
                                        <i id="cnic_front" name="cnic_front " class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                    </div>

                                    <h5>Drop files here or click to upload.</h5>
                                </div>
                            </div>
                            <div class="error-msg mt-1">Please add a CNIC Front images.</div>
                        </div>
                    </div>
                    <div class="col-xl-0 col-lg-6">
                        <div class="card-body">
                            <div class="dropzone my-dropzone">
                                <div class="dz-message">
                                    <label class="form-label" for="product-title-input">CNIC Back</label>
                                    <div class="mb-3">
                                        <i id="cnic_back" name="cnic_back" class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                    </div>

                                    <h5>Drop files here or click to upload.</h5>
                                </div>
                            </div>
                            <div class="error-msg mt-1">Please add a CNIC Back images.</div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-0 col-12 form-group mb-4">
                <label>
                    Upload Product Image </label>

                <div style='height: 0px;width: 0px; overflow:;'>
                    <input id="image" name="cnic" type="file" value="Upload" onchange="sub(this)" />
                </div>
                @if (@$seller)
                    <div class="col-lg-0 col-12 form-group mb-4">
                        <div class="media">
                            <div class="avatar me-2">

                                <img alt="avatar"
                                    @if ($seller->image == null || !file_exists(base_path('resources/images/sellers/') . $detailAccount->image)) src="{{ URL::asset('resources/images/no-attachments.png') }}"

                         @else
                        src="{{ URL::asset('resources/images/sellers/') . $seller->image }}" @endif
                                    class="rounded-circle" />
                            </div>
                        </div>
                    </div>
                @endif
            </div> --}}
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
                        <h5 class="card-title mb-1">Seller Bank Information</h5>
                        <p class="text-muted mb-0">Fill all information below.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-0 col-lg-12 mt-3">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <label class="form-label" for="product-title-input">Bank Name</label>
                        <input type="text" class="form-control"
                            value="{{ old('bank_name', !empty($seller->bank_name) ? $seller->bank_name : '') }}"
                            id="bank_name" name="bank_name" placeholder="Enter the Bank Name">
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <label class="form-label" for="product-title-input">Account Title</label>
                        <input type="text" class="form-control"
                            value="{{ old('account_title', !empty($seller->account_title) ? $seller->account_title : '') }}"
                            id="account_title" name="account_title" placeholder="Enter the Account Title">
                    </div>
                </div>
            </div>
            <div class="col-xl-0 col-lg-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <label class="form-label" for="product-title-input">Bank Account No</label>
                        <input type="text" class="form-control"
                            value="{{ old('account_no', !empty($seller->account_no) ? $seller->account_no : '') }}"
                            id="account_no" name="account_no" placeholder="Enter the Bank Account">
                    </div>
                    {{-- <div class="col-xl-6 col-lg-6">
                        <label class="form-label" for="product-title-input">Delivery Type</label>
                        <select class="form-select" id="delivery_type" type="text"
                            value="{{ old('delivery_type', !empty($seller->delivery_type) ? $seller->delivery_type : '') }}"
                            name="delivery_type" class="form-control select2 form-control mb-3 custom-select">
                            <option value="Express Delivery">Express Delivery</option>
                            <option value="Standard Delivery">Standard Delivery</option>
                            <option value="both">Both</option>
                        </select>
                    </div> --}}
                    <div class="col-xl-0 col-lg-12 mt-3">
                        <div class="card-body">
                            <div class="dropzone my-dropzone">
                                <div class="dz-message">
                                    <label class="form-label" for="product-title-input">Bank Check Image</label>
                                    <div class="mb-3">
                                        <i name="cnic" class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                    </div>

                                    <h5>Drop files here or click to upload.</h5>
                                </div>
                            </div>
                            <div class="error-msg mt-1">Please add a Bank Check images.</div>
                        </div>
                    </div>
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
                            <div class="col-xl-6 col-lg-6">
                                <label class="form-label" for="product-title-input">Shope Name</label>
                                <input type="text" class="form-control"
                                    value="{{ old('shope_name', !empty($seller->shope_name) ? $seller->shope_name : '') }}"
                                    id="shope_name" name="shope_name" placeholder="Enter the Shope Name">
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <label class="form-label" for="product-title-input">Vacation Mode</label>
                                <input type="text" class="form-control"
                                    value="{{ old('vacation_mode', !empty($seller->vacation_mode) ? $seller->vacation_mode : '') }}"
                                    id="vacation_mode" name="vacation_mode" placeholder="Enter the vacation_mode">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-0 col-lg-12">
                        {{-- <div class="col-lg-6">
                            <div>
                                <label class="form-label mb-0">Basic</label>
                                <p class="text-muted">Set <code></code> attribute.</p>
                                <input type="text" class="form-control" data-provider="flatpickr"
                                    data-date-format="d M, Y">
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div>
                                    <label for="date-field" class="form-label">Start Date</label>
                                    <input type="date" data-provider="flatpickr" data-date-format="d M, Y"
                                        class="form-control" name="start_date" id="date-field" data-provider="flatpickr"
                                        data-time="true" placeholder="Select Date-time">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div>
                                    <label for="date-field" class="form-label">End Date</label>
                                    <input type="date" data-provider="flatpickr" data-date-format="d M, Y"
                                        class="form-control" name="end_date" id="date-field" data-provider="flatpickr"
                                        data-time="true" placeholder="Select Date-time">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6   ">
                                <label class="form-label" for="country_id">Country</label>
                                <select id="country-dropdown" class="form-control">
                                    <option value="">-- Select Country --</option>
                                    @foreach ($countries as $data)
                                        <option value="{{ $data->id }}">
                                            {{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6   ">
                                <label class="form-label" for="province_id">Province </label>
                                <select id="province-dropdown" name="province_id" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6   ">
                                <label class="form-label" for="city_id">City</label>
                                <select id="city-dropdown" name="city_id" class="form-control">
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6   ">
                                <label class="form-label" for="area_id">Area </label>
                                <select id="area-dropdown" name="area_id" class="form-control">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer mt-4">
                <div class="hstack gap-2 justify-content-end">
                    <button type="submit" style="float: right;" class="btn btn-success w-sm">Save</button>
                    <a href="{{ route('seller.list') }}" style="float: right;"
                        class="btn btn-dark rounded bs-popover ml-0 mt-0  mb-0">Cancel</a>
                </div>
            </div>
        </div>
        <!-- end card -->
        </div>

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
            State Dropdown Change Event
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
                var idArea = this.value;
                $("#area-dropdown").html('');
                $.ajax({
                    url: "{{ url('api/fetch-areas') }}",
                    type: "POST",
                    data: {
                        area_id: idArea,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#area-dropdown').html('<option value="">-- Select Area --</option>');
                        $.each(res.areas, function(key, value) {
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

    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/@simonwep/pickr.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ URL::asset('build/js/pages/form-pickers.init.js') }}"></script>
    <!-- cleave.js -->
    <script src="{{ URL::asset('build/libs/cleave.js/cleave.min.js') }}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!--Invoice create init js-->
    <script src="{{ URL::asset('build/js/backend/invoicecreate.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

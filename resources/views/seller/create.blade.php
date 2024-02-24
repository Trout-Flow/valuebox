@extends('layouts.master')
@section('title')
    Add Seller
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/classic.min.css') }}" /> <!-- 'classic' theme -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/monolith.min.css') }}" /> <!-- 'monolith' theme -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/nano.min.css') }}" /> <!-- 'nano' theme -->
    <!-- Sweet Alert css-->
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <x-breadcrumb title="Add Seller" pagetitle="Seller" />
    <form method="POST"
        action="{{ !empty($seller) ? route('seller.update') : route('seller.save') }}   "class="needs-validation"
        enctype="multipart/form-data" novalidate>
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
                        <label class="form-label" for="product-title-input">Seller Store/Shope Name</label>
                        <input type="text" class="form-control"
                            value="{{ old('store_name', !empty($seller->store_name) ? $seller->store_name : '') }}"
                            id="store_name" name="store_name" placeholder="Enter the Shope Name">
                    </div>

                </div>
            </div>
            <div class="col-xl-0 col-lg-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <label class="form-label" for="product-title-input">Email</label>
                        <input type="email" class="form-control"
                            value="{{ old('email', !empty($seller->email) ? $seller->email : '') }}" id="email"
                            name="email" placeholder="Enter the Email">
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <label class="form-label" for="product-title-input">Password</label>
                        <input type="text" class="form-control" id="password" name="password"
                            placeholder="Enter the Password">
                    </div>
                </div>
            </div>
            <div class="col-xl-0 col-lg-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <label class="form-label" for="product-title-input">Confirm Password</label>
                        <input type="text" class="form-control" id="confirm_password" name="confirm_password"
                            placeholder="Please enter your password again">
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <label class="form-label" for="product-title-input">CNIC No</label>
                        <input type="text" class="form-control"
                            value="{{ old('cnic_no', !empty($seller->cnic_no) ? $seller->cnic_no : '') }}" id="cnic_no"
                            name="cnic_no" placeholder="Enter the CNIC No">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <label class="form-label" for="product-title-input">Delivery Type</label>
                <select class="form-select" id="delivery_type" type="text"
                    value="{{ old('delivery_type', !empty($seller->delivery_type) ? $seller->delivery_type : '') }}"
                    name="delivery_type" class="form-control select2 form-control mb-3 custom-select">
                    <option value="Express Delivery">Express Delivery</option>
                    <option value="Standard Delivery">Standard Delivery</option>
                    <option value="both">Both</option>
                </select>
            </div>
            {{-- <div class="col-xl-0 col-lg-12 mt-3">
                <div class="row">
                    <div class="col-xl-0 col-lg-6">
                        <div class="card-body">
                            <div class="dropzone my-dropzone" id="cnic_front">
                                <div class="dz-message">
                                    <label class="form-label" for="product-title-input">CNIC Front</label>
                                    <div class="mb-3 ">
                                        <i type="file" id="cnic_front" name="cnic_front "
                                            class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                        <input type="file" name="cnic_front" class="form_control" />
                                    </div>

                                    <h5>Drop files here or click to upload.</h5>
                                </div>
                            </div>
                            <div class="error-msg mt-1">Please add a CNIC Front images.</div>
                        </div>
                    </div>
                    <div class="col-xl-0 col-lg-6">
                        <div class="card-body">
                            <div class="dropzone my-dropzoneback">
                                <div class="dz-message">
                                    <label class="form-label" for="product-title-input">CNIC Back</label>
                                    <div class="mb-3">
                                        <i id="cnic_back" name="cnic_back"
                                            class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                        {{-- <input type="file" name="cnic_back" class="form_control" />
                                    </div>

                                    <h5>Drop files here or click to upload.</h5>
                                </div>
                            </div>
                            <div class="error-msg mt-1">Please add a CNIC Back images.</div>
                        </div>
                    </div>
                </div>
            </div> --}}
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
            <div class="col-xl-0 col-lg-12 mt-3">
                <div class="row">

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
                        <h5 class="card-title mb-1">Seller Bank Information</h5>
                        <p class="text-muted mb-0">Fill all information below.</p>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="invoice-detail-items mt-0">

                    <div class="table-responsive">
                        <table class="table item-table">
                            <thead>
                                <tr>
                                    <th class="" hidden>
                                    </th>
                                    <th></th>
                                    <th class="">Bank Name
                                    </th>
                                    <th class="">Account Title</th>
                                    <th class="">IBAN Number
                                    </th>
                                    <th class="">Bank Check Image
                                    </th>


                                </tr>
                                <tr aria-hidden="true" class="mt-3 d-block table-row-hidden">
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr_clone validator_0">
                                    <td class="delete-item-row">
                                        <ul class="table-controls">
                                            <li>
                                                <a href="javascript:void(0);" class="delete-item" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-x-circle">
                                                        <circle cx="12" cy="12" r="10">
                                                        </circle>
                                                        <line x1="15" y1="9" x2="9"
                                                            y2="15">
                                                        </line>
                                                        <line x1="9" y1="9" x2="15"
                                                            y2="15">
                                                        </line>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td hidden>
                                        <input type="text" name="row_id[]" class="row_id" value="0" hidden>
                                    </td>

                                    <td class="title">
                                        <select class="form-select" id="bank_id" type="text" name="bank_id[]"
                                            class="form-control select2 form-control mb-3 custom-select">
                                            <option value="">Select Bank</option>
                                            @foreach ($dropDownData['banks'] as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ (old('bank_id') == $key ? 'selected' : '') || (!empty($seller->bank_id) ? collect($seller->bank_id)->contains($key) : '') ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <br>
                                    <td class="rate">
                                        <input type="text" class="form-control"
                                            value="{{ old('account_title', !empty($seller->account_title) ? $seller->account_title : '') }}"
                                            id="account_title" name="account_title[]"
                                            placeholder="Enter the Account Title">
                                    </td>

                                    <td class="title">
                                        <input type="text" class="form-control"
                                            value="{{ old('iban_number', !empty($seller->iban_number) ? $seller->iban_number : '') }}"
                                            id="iban_number" name="iban_number[]" placeholder="Enter the Bank Account">
                                    </td>

                                    <td class="title">
                                        <input type="file" name="bank_check[]" class="form_control" />

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <a href="javascript:void(0);" class="btn btn-dark additem mt-3" id="add-item">Add
                        Item</a>

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

    <script>
        document.getElementsByClassName('additem')[0].addEventListener('click', function() {

            let getTableElement = document.querySelector('.item-table');
            let currentIndex = getTableElement.rows.length;
            
            let $html = '<tr>' +
                '<td class="delete-item-row">' +
                '<ul class="table-controls">' +
                '<li><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>' +
                '</ul>' +
                '</td>' +
                '<td hidden><input type="text" name="row_id[]" class="row_id" value="' + currentIndex +
                '" hidden></td>' +
                '<td class="title"><select class="form-select" id="bank_id" type="text" name ="bank_id[]" class = "form-control select2 form-control mb-3 custom-select" ><option value = "" > Select Bank </option> @foreach ($dropDownData['banks'] as $key => $value)<option value = "{{ $key }}"{{ (old('bank_id') == $key ? 'selected' : '') || (!empty($seller->bank_id) ? collect($seller->bank_id)->contains($key) : '') ? 'selected' : '' }}> {{ $value }} </option>@endforeach</select></td > ' +
                '<td class="rate"><input type="text" class="form-control" value="{{ old('account_title', !empty($seller->account_title) ? $seller->account_title : '') }}" id="account_title" name="account_title" placeholder="Enter the Account Title"></td> ' +
                '<td class="title"><input type="text" class="form-control" value="{{ old('iban_number', !empty($seller->iban_number) ? $seller->iban_number : '') }}" id="iban_number" name="iban_number" placeholder="Enter the Bank Account"></td>' +
                '<td class="dropzone my-dropzonecheck"> <input type="file" name="bank_check[]" class="form_control" /></td>' +
                '<div class="form-check form-check-primary form-check-inline me-0 mb-0">' +
                '</div>' +
                '</div>' +
                '</td>' +
                '</tr>';

            $(".item-table tbody").append($html);
            deleteItemRow();

        })

        deleteItemRow();
        selectableDropdown(document.querySelectorAll('.invoice-select .dropdown-item'));
        selectableDropdown(document.querySelectorAll('.invoice-tax-select .dropdown-item'), getTaxValue);
        selectableDropdown(document.querySelectorAll('.invoice-discount-select .dropdown-item'), getDiscountValue);

        var f2 = flatpickr(document.getElementById('due'), {
            defaultDate: currentDate.setDate(currentDate.getDate() + 5),
        });

        function deleteItemRow() {
            let deleteItem = document.querySelectorAll('.delete-item');
            for (var i = 0; i < deleteItem.length; i++) {
                deleteItem[i].addEventListener('click', function() {
                    this.parentElement.parentNode.parentNode.parentNode.remove();
                })
            }
        }
    </script>
@endsection
@section('scripts')
    <!-- ckeditor -->
    <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/ckeditor.js') }}"></script>

    <!-- dropzone js -->
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <!-- create-product -->
    <script src="{{ URL::asset('build/js/backend/create-seller.init.js') }}"></script>

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

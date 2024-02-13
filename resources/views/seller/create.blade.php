@extends('layouts.master')
@section('title')
    Add Seller
@endsection
@section('css')
    <!-- extra css -->
@endsection
@section('content')
    <x-breadcrumb title="Add Seller" pagetitle="Seller" />
    <form method="post" action="{{ !empty($seller) ? route('seller.update') : route('seller.save') }}"
        class="needs-validation" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ isset($seller->id) ? $seller->id : '' }}" />
        <div class="form-group">
            <div class="col-xl-0 col-lg-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <label class="form-label" for="product-title-input">Seller Name</label>
                        <input type="text" class="form-control"
                            value="{{ old('name', !empty($seller->name) ? $seller->name : '') }}" id="name"
                            name="name" placeholder="Enter the Seller Name">
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <label class="form-label" for="product-title-input">Seller Shope Name</label>
                        <input type="text" class="form-control"
                            value="{{ old('shop_name', !empty($seller->shop_name) ? $seller->shop_name : '') }}"
                            id="shop_name" name="shop_name" placeholder="Enter the Shop Name">
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
            {{-- <div class="card-body">
                <div class="dropzone my-dropzone">
                    <div class="dz-message">
                        <label class="form-label" for="product-title-input">CNIC Images</label>
                        <div class="mb-3">
                            <i name="cnic" class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                        </div>

                        <h5>Drop files here or click to upload.</h5>
                    </div>
                </div>
                <div class="error-msg mt-1">Please add a CNIC images.</div>
            </div> --}}
            {{-- <div class="card-body">
                <div class="dropzone my-dropzone">
                    <div class="dz-message">
                        <label class="form-label" for="product-title-input">Bank Check  </label>
                        <div class="mb-3">
                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                        </div>

                        <h5>Drop files here or click to upload.</h5>
                    </div>
                </div>
                <div class="error-msg mt-1">Please add a CNIC images.</div>
            </div> --}}
            {{-- <div class="col-lg-0 col-12 form-group mb-4">
                <label for="name" class="form-label">
                    Upload Product Image </label>

                <div style='height: 0px;width: 0px; overflow:;'>
                    <input id="image" name="cnic" type="file" value="Upload" onchange="sub(this)" />
                </div>
                {{-- @if (@$seller)
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
            <div class="col-xl-0 col-lg-12 mt-5">
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
                    <div class="col-xl-6 col-lg-6">
                        <label class="form-label" for="product-title-input">Delivery Type</label>
                        <select class="form-select" id="delivery_type" type="text"
                            value="{{ old('delivery_type', !empty($seller->delivery_type) ? $seller->delivery_type : '') }}"
                            name="delivery_type" class="form-control select2 form-control mb-3 custom-select">
                            <option value="Express Delivery">Express Delivery</option>
                            <option value="Standard Delivery">Standard Delivery</option>
                            <option value="both">Both</option>
                        </select>
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

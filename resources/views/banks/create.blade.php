@extends('layouts.master')
@section('title')
    Add Bank
@endsection
@section('css')
    <!-- extra css -->
@endsection
@section('content')
    <x-breadcrumb title="Add Bank" pagetitle="Bank" />
    <form method="POST" action="{{ !empty($bank) ? route('bank.update') : route('bank.save') }}" class="needs-validation">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ isset($bank->id) ? $bank->id : '' }}" />
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Bank Name</label>
                            <input type="text" class="form-control"
                                value="{{ old('name', !empty($bank->name) ? $bank->name : '') }}" name="name"
                                id="name" placeholder="Enter Bank Name" required>
                            <div class="invalid-feedback">Please enter a Bank Name.</div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
                <div class="text-end mb-3">
                    <a href="{{ route('bank.list') }}" style="float: right;"
                        class="btn btn-dark rounded bs-popover ml-2 mt-5  mb-4">Cancel</a>
                    <button type="submit" style="float: right" class="btn btn-success  rounded bs-popover me-1 mt-5 mb-4 "
                        data-bs-container="body" data-bs-placement="right" data-bs-content="Tooltip on right">
                        @if (!isset($bank))
                            Save
                        @else
                            Update
                        @endif
                    </button>
                </div>
            </div>
        </div>
        <!-- end row -->
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

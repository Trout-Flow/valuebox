@extends('layouts.master')
@section('title')
    Add Country
@endsection
@section('css')
    <!-- extra css -->
@endsection
@section('content')
    <x-breadcrumb title="Add Country" pagetitle="Country" />
    <form method="POST" action="{{ !empty($country) ? route('country.update') : route('country.save') }}"
        class="needs-validation">
        @csrf
        <input type="hidden" name="id" id="id"
         value="{{ isset($country->id) ? $country->id : '' }}" />
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Country Name</label>
                            <input type="text" class="form-control" value="{{ old('name', !empty($country->name) ? $country->name : '') }}"
                                name="name" id="name" placeholder="Enter Country Name" required>
                            <div class="invalid-feedback">Please enter a Country Name.</div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
                <div class="text-end mb-3">
                    <button type="submit" class="btn btn-success w-sm">Submit</button>
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

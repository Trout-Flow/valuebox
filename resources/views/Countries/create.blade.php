@extends('layouts.master')
@section('title')
    Add Country
@endsection
@section('css')
    <!-- extra css -->
@endsection
@section('content')
    <x-breadcrumb title="Add Country" pagetitle="Country" />
    <form autocomplete="off" method="POST" action="{{!empty($country) ? route('country.update'): route('country.save')}}" class="needs-validation" >
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Country Name</label>
                            <input type="hidden" class="form-control" id="formAction" name="formAction" value="add">
                            {{-- <input type="text" class="form-control d-none" id="name"> --}}
                            <input type="text" class="form-control" value="{{old('name', @$country->name)}}" id="country-name-input"
                                placeholder="Enter Country Name" required>
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

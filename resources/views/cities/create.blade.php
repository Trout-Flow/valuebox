@extends('layouts.master')
@section('title')
    Add City
@endsection
@section('css')
    <!-- extra css -->
@endsection
@section('content')
    <x-breadcrumb title="Add City" pagetitle="City" />
    <form method="POST" action="{{ !empty($city) ? route('city.update') : route('city.save') }}"
        class="needs-validation">
        @csrf
        <input type="hidden" name="id" id="id"
         value="{{ isset($city->id) ? $city->id : '' }}" />
        <div class="col-xl-0 col-lg-12">
            <div class="row">
                <div class="col-xl-6 col-lg-6   ">
                    <label class="form-label" for="province_id">Province </label>
                    {{-- <input type="hidden" class="form-control" id="formAction" name="formAction" value="add"> --}}
                    <select class="form-select" id="province_id" type="text" name="province_id"
                        placeholder="Please Select Province " class="form-control select2 form-control mb-3 custom-select"
                        >
                        <option value="">Select</option>
                        @foreach ($dropDownData['province'] as $key => $value)
                            <option value="{{ $key }}"
                                {{ (old('province_id') == $key ? 'selected' : '') || (!empty($city->province_id) ? collect($city->province_id)->contains($key) : '') ? 'selected' : '' }}>
                                {{ $value }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col-xl-6 col-lg-6">
                    <label class="form-label" for="product-title-input">City Name</label>
                    <input type="text" class="form-control" value="{{ old('name', @$city->name) }}" id="name"
                        name="name" placeholder="Enter the City Name" >
                </div>
            </div>
        </div>

        <div class="modal-footer mt-4">
            <div class="hstack gap-2 justify-content-end">
                <button type="submit" style="float: right;" class="btn btn-success w-sm">Save</button>
                <a href="{{ route('city.list') }}" style="float: right;"
                    class="btn btn-dark rounded bs-popover ml-0 mt-0  mb-0">Cancel</a>
            </div>
        </div>
        <!-- end card -->
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

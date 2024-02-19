@extends('layouts.master')
@section('title')
    Add Area
@endsection
@section('css')
    <!-- extra css -->
@endsection
@section('content')
    <x-breadcrumb title="Add Area" pagetitle="Area" />
    <form method="POST" action="{{ !empty($area) ? route('area.update') : route('area.save') }}"
        class="needs-validation">
        @csrf
        <input type="hidden" name="id" id="id"
         value="{{ isset($area->id) ? $area->id : '' }}" />
        <div class="col-xl-0 col-lg-12">
            <div class="row">
                <div class="col-xl-6 col-lg-6   ">
                    <label class="form-label" for="city_id">City </label>
                    <select class="form-select" id="city_id" type="text" name="city_id"
                        placeholder="Please Select city " class="form-control select2 form-control mb-3 custom-select"
                        >
                        <option value="">Select</option>
                        @foreach ($dropDownData['city'] as $key => $value)
                            <option value="{{ $key }}"
                                {{ (old('city_id') == $key ? 'selected' : '') || (!empty($area->city_id) ? collect($area->city_id)->contains($key) : '') ? 'selected' : '' }}>
                                {{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <label class="form-label" for="product-title-input">Area Name</label>
                    <input type="text" class="form-control" value="{{ old('name', @$area->name) }}" id="name"
                        name="name" placeholder="Enter the Area Name" >
                </div>
            </div>
        </div>

        <div class="modal-footer mt-4">
            <div class="hstack gap-2 justify-content-end">
                <button type="submit" style="float: right;" class="btn btn-success w-sm">Save</button>
                <a href="{{ route('area.list') }}" style="float: right;"
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

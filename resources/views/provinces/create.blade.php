@extends('layouts.master')
@section('title')
    Add Province
@endsection
@section('css')
    <!-- extra css -->
@endsection
@section('content')
    <x-breadcrumb title="Add Province" pagetitle="Province" />
    <form method="POST" action="{{ !empty($province) ? route('province.update') : route('province.save') }}"
        class="needs-validation">
        @csrf
        <input type="hidden" name="id" id="id"
         value="{{ isset($province->id) ? $province->id : '' }}" />
        <div class="col-xl-0 col-lg-12">
            <div class="row">
                <div class="col-xl-6 col-lg-6   ">
                    <label class="form-label" for="Country">Country</label>
                    {{-- <input type="hidden" class="form-control" id="formAction" name="formAction" value="add"> --}}
                    <select class="form-select" id="country_id" type="text" name="country_id"
                        value="{{ old('country_id', !empty($province->country_id) ? $province->country_id : '') }}"
                        placeholder="Please Select Country " class="form-control select2 form-control mb-3 custom-select"
                        >
                        <option value="">Select</option>
                        @foreach ($dropDownData['country'] as $key => $value)
                            <option value="{{ $key }}"
                                {{ (old('country_id') == $key ? 'selected' : '') || (!empty($province->country_id) ? collect($province->country_id)->contains($key) : '') ? 'selected' : '' }}>
                                {{ $value }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col-xl-6 col-lg-6">
                    {{-- <div class="mb-3"> --}}
                    <label class="form-label" for="product-title-input">Province Name</label>
                    {{--  <input type="hidden" class="form-control" id="formAction" name="formAction" value="add"> --}}
                    <input type="text" class="form-control" value="{{ old('name', @$province->name) }}" id="name"
                        name="name" placeholder="Enter Province Name" >
                    {{-- <div class="invalid-feedback">Please enter a Province Name.</div> --}}
                </div>
            </div>
        </div>

        <div class="modal-footer mt-4">
            <div class="hstack gap-2 justify-content-end">
                <button type="submit" style="float: right;" class="btn btn-success w-sm">Save</button>
                <a href="{{ route('province.list') }}" style="float: right;"
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

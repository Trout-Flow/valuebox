@extends('layouts.master')

@section('title')
    Add Collection
@endsection
@section('content')
    <x-breadcrumb title="Add Collection" pagetitle="Collections" />
    <div class="content-page">
        <div class="content">
            @if(session()->has('message'))
            <div class="alert" style="background-color: #a9e8a8">
                {{ session('message') }}
            </div>
        @endif
        </div>
        <div class="content-wrapper">
            @section('content')
            <div class="content">
                <div class="row">
                    <div class="card card-success col-11">
                        <div class="card-header">
                                <h3 class="card-title">Add Collection</h3>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
            <div class="card-body">
                <form name="add-collection_form" id="data-form" method="POST" action="{{!empty($collection) ? route('collection.update'): route('collection.save')}}">
                    <input type="hidden" name="id" id="id" value="{{@$collection->id}}">
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="varchar" class="form-control" name="title" id="title" value="{{old('title', @$collection->title)}}" placeholder="Enter the Title" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <input type="text" class="form-control" name="description" id="description" value="{{old('description', @$collection->description)}}" placeholder="Enter the Description" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="seo_title">Title</label>
                                                <input type="varchar" class="form-control" name="seo_title" id="seo_title" value="{{old('seo_title', @$collection->seo_title)}}" placeholder="Enter the SEO Title" >
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <input type="text" class="form-control" name="description" id="description" value="{{old('description', @$collection->description)}}" placeholder="Enter the SEO Description" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="commision">Commision</label>
                                                <input type="int" class="form-control" name="commision" id="commision" value="{{old('commision', @$collection->commision)}}" placeholder="Enter the commision" >
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <input type="int" class="form-control" name="status" id="description" value="{{old('status', @$collection->status)}}" placeholder="Select The Status" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="product_id">Product</label>
                                                <input type="int" class="form-control" name="product_id" id="product_id" value="{{old('product_id', @$collection->product_id)}}" placeholder="Select The Product" >
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>

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

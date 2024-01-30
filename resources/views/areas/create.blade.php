@extends('layouts.master')

@section('title')
    Add Area
@endsection
@section('content')
    <x-breadcrumb title="Add Area" pagetitle="Countries" />
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
                                <h3 class="card-title">Add Area</h3>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
            <div class="card-body">
                <form name="add-area_form" id="data-form" method="POST" action="{{!empty($area) ? route('area.update'): route('area.save')}}">
                    <input type="hidden" name="id" id="id" value="{{@$area->id}}">
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" id="name" value="{{old('name', @$area->name)}}" placeholder="Enter the area Name" autofocus>
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


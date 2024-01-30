@extends('layouts.master')

@section('title')
    Add Country
@endsection
@section('content')
    <x-breadcrumb title="Add Country" pagetitle="Countries" />
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
                                <h3 class="card-title">Add Country</h3>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
            <div class="card-body">
                <form name="add-country_form" id="data-form" method="POST" action="{{!empty($country) ? route('country.update'): route('country.save')}}">
                    <input type="hidden" name="id" id="id" value="{{@$country->id}}">
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" id="name" value="{{old('name', @$country->name)}}" placeholder="Enter the Country Name" autofocus>
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


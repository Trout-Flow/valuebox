@extends('layouts.master')

@section('title')
    Add City
@endsection
@section('content')
    <x-breadcrumb title="Add City" pagetitle="Countries" />
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
                                <h3 class="card-title">Add City</h3>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
            <div class="card-body">
                <form name="add-city_form" id="data-form" method="POST" action="{{!empty($city) ? route('city.update'): route('city.save')}}">
                    <input type="hidden" name="id" id="id" value="{{@$city->id}}">
                    <section class="content">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <h6 class="light-dark w-100">Province:</h6>

                                <select name="province_id" id="province_id" class="form-control" value="{{request()->select('province_id')}}" placeholder="Select province">
                                    <option value="">Select</option>
                                    @foreach($provinces as $key=>$value)
                                    <option value="{{ $key }}" {{!empty($city) && ($city->province_id === $key) ? "selected" : ''}} {{($key == old('province_id')) ? 'selected' : ''}}>{{ $value }}</option>
                                @endforeach
                                </select>
                                @error('province_id')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" id="name" value="{{old('name', @$city->name)}}" placeholder="Enter the city Name" autofocus>
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


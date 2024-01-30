@extends('layouts.master')

@section('title')
    Add Province
@endsection
@section('content')
    <x-breadcrumb title="Add Province" pagetitle="Provinces" />
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
                                <h3 class="card-title">Add Province</h3>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
            <div class="card-body">
                <form name="add-Province_form" id="data-form" method="POST" action="{{!empty($province) ? route('province.update'): route('province.save')}}">
                    <input type="hidden" name="id" id="id" value="{{@$province->id}}">
                    <section class="content">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <h6 class="light-dark w-100">Country:</h6>

                                <select name="country_id" id="country_id" class="form-control" value="{{request()->select('country_id')}}" placeholder="Select Country">
                                    <option value="">Select</option>
                                    @foreach($countries as $key=>$value)
                                    <option value="{{ $key }}" {{!empty($province) && ($province->country_id === $key) ? "selected" : ''}} {{($key == old('country_id')) ? 'selected' : ''}}>{{ $value }}</option>
                                @endforeach
                                </select>
                                @error('country_id')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group col-sm-6">
                                <label for="name">Province Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{old('name', @$province->name)}}" placeholder="Enter the Province Name" >
                            </div>
                        </div>
                        <div class="form-group button-items mb-0 text-right">
                            <div class="col-12" style="text-align: right;">
                                <input type="submit" value="{{ !empty($province) ? 'Update' : 'Save' }}" class="btn btn-success"
                                       style="background-color: #3c8dbc">
                                <a href="{{ route('province.list') }}" class="btn btn-secondary ">Cancel</a>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>

@endsection


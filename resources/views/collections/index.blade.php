@extends('layouts.master')
@section('title')
    List of Countries
@endsection
{{-- @section('css')
    <!-- extra css -->
    <!-- Sweet Alert css-->
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection --}}
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
            <div class="form-group button-items mb-0 text-right">
                <a href="{{ route('country.create') }}" class="btn btn-primary waves-effect waves-light">Add Country</a>
            </div>
        </div>
        @endsection
        <div class="card-body">
            <form  id="data-form" method="GET" action="{{route('country.list')}}">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <h6 class="light-dark w-100">Country Name</h6>
                                            <input type="text" class="form-control" name="name" id="name" value="{{request()->input('name')}}" placeholder="Enter the Country Name" autofocus>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <span class="input-group-prepend" style="margin-top: 20px;">
                                    <button type="submit" class="btn btn-primary" value="Search" name="search-button"><i
                                         class="fa fa-search"></i>&nbsp; Search</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <table class="table table-hower subject-table">
                        <thead>
                            <tr>
                                <th>Name<th>
                                <th colspan= "2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($countries as $country )
                                <a href="{{route('country.edit', ['id'=>$country->id])}}">
                                    <tr id="country_{{$country->id}}">
                                        <td title="{{ $country->name }}">{{ $country->name }}</td>
                                        <td class="project-actions float-right">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('country.edit', $country->id) }}"
                                                data-id="{{ $country->id }}" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-primary btn-sm deletecountry"
                                                href="{{ route('country.delete', $country->id) }}"
                                                data-id="{{ $country->id }}" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>

                                </a>

                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>



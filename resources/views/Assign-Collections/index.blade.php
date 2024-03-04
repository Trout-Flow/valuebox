@extends('layouts.master')
@section('title')
    List View -  Assign Collection to Sellers
@endsection
@section('css')
    <!-- extra css -->
@endsection
@section('content')
    <x-breadcrumb title="List Of  Assign Collection to Sellers" pagetitle=" Assign Collection to Sellers" />
    <div class="row">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                    </svg></button> --}}
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
    <div class="row" id="sellersList">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-lg-3">
                            <div class="search-box">
                                <input type="text" class="form-control search" placeholder="Search...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>

                        <div class="col-lg-auto ms-auto">
                            <div class="hstack gap-2">
                                <a href="{{ route('assignCollection.create') }}" class="btn btn-primary mt-2 mb-2 me-8"
                                    style="float : right; " style="">Assign Collection to Sellers
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive table-card mb-1">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th class="sort" data-sort="id">ID</th>
                                    <th class="sort" data-sort="seller" style="width: 40%">Seller</th>
                                    <th class="sort" data-sort="assignCollection_name" style="width: 40%">Collection Name</th>
                                    <th class="sort" data-sort="actions"></th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach ($assignCollections as $assignCollection)
                                    <tr id="assignCollection{{ $assignCollection->id }}">
                                        <td>
                                            <div class="media">
                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">{{ $assignCollection->id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                    <?php //if(isset($assignCollection->cities->name)) { ?>
                                            <div class="media">
                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">{{ $assignCollection->sellers->name }}</h6>
                                                </div>
                                            </div>
                                    <?php //} ?>
                                        </td>
                                        <td>
                                            <div class="media">
                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">{{ $assignCollection->name }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('assignCollection.edit', ['id' => $assignCollection->id]) }}"
                                                    class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                                    data-placement="top" title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                @if ((!empty($permission->edit_access) && $permission->edit_access == 1) || Auth::user()->is_admin == 1)
                                                @endif

                                                @if ((!empty($permission->delete_access) && $permission->delete_access == 1) || Auth::user()->is_admin == 1)
                                                @endif

                                                <div class="remove ">
                                                    <a class="bi bi-trash "
                                                        style="font-size: 1.3rem; color: rgb(255, 58, 68);"
                                                        data-bs-toggle="modal" data-id="{{ $assignCollection->id }}"
                                                        data-bs-target="#deleteRecordModal"></a>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                    <!-- deleteRecordModal -->
                                    <div id="deleteRecordModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-md-5">
                                                    <div class="text-center">
                                                        <div class="text-danger">
                                                            <i class="bi bi-trash display-4"></i>
                                                        </div>
                                                        <div class="mt-4">
                                                            <h4 class="mb-2">Are you sure ?</h4>
                                                            <p class="text-muted fs-17 mx-4 mb-0">Are you sure you want to
                                                                remove this record ?</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                        <button type="button" class="btn w-sm btn-light btn-hover"
                                                            id="deleteRecord-close" data-bs-dismiss="modal">Close</button>
                                                        <a href="{{ route('assignCollection.delete', ['id' => @$assignCollection->id]) }}"
                                                            type="button" class="btn w-sm btn-danger btn-hover"
                                                            id="delete-record">Yes, Delete
                                                            It!</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-end">
                            {!! $assignCollections->appends(request()->query())->links() !!}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- list.js min js -->
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Sellers list js -->
    <script src="{{ URL::asset('build/js/backend/sellers-list.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
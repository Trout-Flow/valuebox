@extends('layouts.master')
@section('title')
    List View - Provinces
@endsection
@section('css')
    <!-- extra css -->
@endsection
@section('content')
    <x-breadcrumb title="List Of Provinces" pagetitle="Provinces" />
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
                                    <a href="{{ route('province.create') }}" class="btn btn-primary mt-2 mb-2 me-8"
                                    style="float : right; " style="">Add Province
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
                                    <th class="sort" data-sort="country_name" style="width: 40%">Country</th>
                                    <th class="sort" data-sort="country_name" style="width: 40%">Province Name</th>
                                    <th class="sort" data-sort="actions"></th>
                                </tr>
                            </thead>
                            <tbody  class="list form-check-all">
                                @foreach ($provinces as $province)
                                    <tr id="province{{ $province->id }}">
                                        <td>
                                            <div class="media">
                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">{{ $province->country_id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media">
                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">{{ $province->name }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <div class="action-btns">
                                                @if ((!empty($permission->edit_access) && $permission->edit_access == 1) || Auth::user()->is_admin == 1)
                                                    <a href="{{ route('province.edit', ['id' => $province->id]) }}"
                                                        class="action-btn btn-edit bs-tooltip me-2"
                                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-edit-2">
                                                            <path
                                                                d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                @endif

                                                @if ((!empty($permission->delete_access) && $permission->delete_access == 1) || Auth::user()->is_admin == 1)
                                                    <a href="javascript:void(0)"
                                                        class="action-btn btn-delete bs-tooltip delete"
                                                        data-id="{{ $province->id }}" data-toggle="tooltip"
                                                        data-placement="top" title="Delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-trash-2">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10"
                                                                y2="17">
                                                            </line>
                                                            <line x1="14" y1="11" x2="14"
                                                                y2="17">
                                                            </line>
                                                        </svg>
                                                    </a>
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{-- <tbody class="list form-check-all">
                                {{-- <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chk_child"
                                                value="option1">
                                        </div>
                                    </th>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#TB01</a></td>
                                    <td class="sellerName">Alfred Hurst</td>
                                    <td class="itemStock">245</td>
                                    <td class="balance">$748.32k</td>
                                    <td class="email">alfredH@toner.com</td>
                                    <td class="phone">415-778-3654</td>
                                    <td class="createDate">18 Dec, 2018</td>
                                    <td class="accountStatus"><span
                                            class="badge bg-danger-subtle text-danger text-uppercase">INACTIVE</span></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div>
                                                <a href="seller-overview" class="btn btn-sm btn-soft-secondary">View</a>
                                            </div>
                                            <div class="edit">
                                                <a class="btn btn-sm btn-soft-info edit-item-btn" href="#showModal"
                                                    data-bs-toggle="modal">Edit</a>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-soft-danger remove-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteRecordModal">Remove</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody> --}}
                        </table>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <!-- deleteRecordModal -->
    <div id="deleteRecordModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-md-5">
                    <div class="text-center">
                        <div class="text-danger">
                            <i class="bi bi-trash display-4"></i>
                        </div>
                        <div class="mt-4">
                            <h4 class="mb-2">Are you sure ?</h4>
                            <p class="text-muted fs-17 mx-4 mb-0">Are you sure you want to remove this record ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light btn-hover" id="deleteRecord-close"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger btn-hover" id="delete-record">Yes, Delete
                            It!</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header px-4 pt-4">
                    <h5 class="modal-title" id="exampleModalLabel">Add Seller</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form class="tablelist-form" novalidate autocomplete="off">
                    <div class="modal-body p-4">
                        <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                        <input type="hidden" id="id-field">

                        <div class="mb-3">
                            <label for="seller-name-field" class="form-label">Seller Name</label>
                            <input type="text" id="seller-name-field" class="form-control"
                                placeholder="Enter Seller Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="item-stock-field" class="form-label">Item Stock</label>
                            <input type="text" id="item-stock-field" class="form-control"
                                placeholder="Enter Item Stock" required>
                        </div>
                        <div class="mb-3">
                            <label for="balance-field" class="form-label">Balance</label>
                            <input type="text" id="balance-field" class="form-control" placeholder="Enter Balance"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="email-field" class="form-label">Seller Email</label>
                            <input type="email" id="email-field" class="form-control" placeholder="Enter Email"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="phone-field" class="form-label">Phone</label>
                            <input type="text" id="phone-field" class="form-control" placeholder="Enter Phone"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="date-field" class="form-label">Create Date</label>
                            <input type="text" id="date-field" class="form-control" data-provider="flatpickr"
                                data-date-format="d M, Y" required placeholder="Select date">
                        </div>

                        <div>
                            <label for="account-status-field" class="form-label">Account Status</label>
                            <select class="form-control" required id="account-status-field">
                                <option value="">Select account Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add Seller</button>
                        </div>
                    </div>
                </form>
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

@extends('layouts.master')
@section('title')
    List View - Seller Transaction History
@endsection
@section('css')
    <!-- extra css -->
@endsection
@section('content')
    <x-breadcrumb title="List Of Seller Transaction Histories" pagetitle="Seller Transaction Histories" />
    <div class="row">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                    </svg></button> --}}
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
    <div class="row" id="transactionHistoryList">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <form class="col-lg-10" method="get" action="{{ route('transaction.list') }}">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="search-box">
                                        <input type="text" value="{{ @$request['param'] }}" name="param" id="param"
                                            class="form-control search" id="input-search" placeholder="Search Transaction History...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>

                                </div>
                                <div class="col-md-5" role="group">
                                    <button class="btn btn-primary _effect--ripple waves-effect waves-light" id="clear-filter" type="submit">
                                        <svg fill="#FFFFFF" width="35" height="24" viewBox="0 0 24 24" id="icon" xmlns="http://www.w3.org/2000/svg">
                                            <defs>
                                              <style>
                                                .cls-1 {
                                                  fill: none;
                                                }
                                              </style>
                                            </defs>
                                            <path d="M22.5,9A7.4522,7.4522,0,0,0,16,12.792V8H14v8h8V14H17.6167A5.4941,5.4941,0,1,1,22.5,22H22v2h.5a7.5,7.5,0,0,0,0-15Z"/>
                                            <path d="M26,6H4V9.171l7.4142,7.4143L12,17.171V26h4V24h2v2a2,2,0,0,1-2,2H12a2,2,0,0,1-2-2V18L2.5858,10.5853A2,2,0,0,1,2,9.171V6A2,2,0,0,1,4,4H26Z"/>
                                            <rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32"/>
                                          </svg>
                                    </button>
                                </div>

                            </div>

                        </form>

                        {{-- <div class="col-lg-auto ms-auto">
                            <div class="hstack gap-2">
                                <a href="{{ route('seller.create') }}" class="btn btn-primary mt-2 mb-2 me-8"
                                    style="float : right; " style="">Add Seller
                                </a>
                            </div>
                        </div> --}}
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
                                    <th class="sort" data-sort="date" style="width: 10%">Date</th>
                                    <th class="sort" data-sort="seller_id" style="width: 20%">Seller</th>
                                    <th class="sort" data-sort="payment_detail_id" style="width: 20%">IBAN Number</th>
                                    <th class="sort" data-sort="transaction_no" style="width: 20%">Transaction Number</th>
                                    <th class="sort" data-sort="status">Status</th>
                                    <th class="sort" data-sort="debit">Debit</th>
                                    <th class="sort" data-sort="credit">Credit</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach ($transactionHistories as $transactionHistory)
                                    <tr id="row_{{ $transactionHistory->id }}">
                                        <td>
                                            <div class="media">
                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">{{ $transactionHistory->id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media">
                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">{{ $transactionHistory->date }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media">
                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">{{ $transactionHistory->seller_id }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="media">
                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">{{ $transactionHistory->payment_detail_id }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="media">
                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">{{ $transactionHistory->transaction_no }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="media">
                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">{{ $transactionHistory->status }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media">
                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">{{ $transactionHistory->debit }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media">
                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">{{ $transactionHistory->credit }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{-- <div class="d-flex gap-2">
                                                <a href="{{ route('seller.edit', ['id' => $seller->id]) }}"
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
                                                        data-bs-toggle="modal" data-id="{{ $seller->id }}"
                                                        data-bs-target="#deleteRecordModal"></a>
                                                </div>

                                            </div> --}}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-end">
                            {!! $transactionHistories->appends(request()->query())->links() !!}
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

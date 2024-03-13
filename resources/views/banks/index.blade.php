@extends('layouts.master')
@section('title')
    List of Banks
@endsection
@section('css')
    <!-- extra css -->
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <x-breadcrumb title="List Of Banks" pagetitle="Banks" />
    <div class="row">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                    </svg></button> --}}
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
    <div class="row" id="bankList">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <form class="col-lg-10" method="get" action="{{ route('bank.list') }}">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="search-box">
                                        <input type="text" value="{{ @$request['param'] }}" name="param" id="param"
                                            class="form-control search" id="input-search" placeholder="Search Banks...">
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

                        <div class="col-lg-auto ms-auto">
                            <div class="hstack gap-2">
                                {{-- <a class="btn btn-primary add-btn" href="{{ route('bank.create') }}"
                                    data-bs-toggle="modal">Add
                                    bank</a> --}}
                                <a href="{{ route('bank.create') }}" class="btn btn-primary mt-2 mb-2 me-8"
                                    style="float : right; " style="">Add Bank
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
                                    <th class="sort" data-sort="bank_name" style="width: 70%">Bank Name</th>
                                    <th class="sort" data-sort="actions">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach ($banks as $bank)
                                    <tr id="row_{{ $bank->id }}">
                                        <td>
                                            <div class="media">
                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">{{ $bank->id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media">
                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">{{ $bank->name }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('bank.edit', ['id' => $bank->id]) }}"
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
                                                {{-- @if ((!empty($permission->edit_access) && $permission->edit_access == 1) || Auth::user()->is_admin == 1)
                                                @endif

                                                @if ((!empty($permission->delete_access) && $permission->delete_access == 1) || Auth::user()->is_admin == 1)
                                                @endif --}}

                                                <div class="remove ">
                                                    <a href="javascript:void(0);"
                                                        class="bi bi-trash "
                                                        style="font-size: 1.3rem; color: rgb(255, 58, 68);"
                                                        data-bs-toggle="modal" id="{{ $bank->id }}"
                                                        data-bs-target="#deleteRecordModal"></a>
                                                </div>
                                                {{-- <div class="remove">
                                                    <a onclick="return " href=""></a>
                                                    <button class="btn btn-sm btn-ghost-danger btn-icon remove-item-btn"
                                                        data-bs-toggle="modal" data-bs-target="#deleteRecordModal"><i
                                                            style="font-size: 1.3rem; color: rgb(255, 58, 68);"
                                                            id="{{ $bank->id }}" class="bi bi-trash"></i></button>
                                                </div>--}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
                                        <button type="button" class="btn w-sm btn-light btn-hover" id="deleteRecord-close"
                                            data-bs-dismiss="modal">Close</button>
                                       <a href="#" type="button"
                                            class="btn w-sm btn-danger btn-hover" id="delete-record">Yes, Delete
                                            It!</a>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-end">
                            {!! $banks->appends(request()->query())->links() !!}
                        </ul>
                    </nav>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('scripts')
    <!-- list.js min js -->
    <!-- list.js min js -->
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/bank-list.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script>
        var perPage = 10;
        var editlist = false;

        var options = {
            valueNames: [
                "id",
                "user_name",
                "email_id",
                "date",
                "status",
            ],
            page: perPage,
            pagination: true,
            plugins: [
                ListPagination({
                    left: 2,
                    right: 2,
                }),
            ],
        };


        var usersList = new List("usersList", options).on("updated", function(list) {
            list.matchingItems.length == 0 ?
                (document.getElementsByClassName("noresult")[0].style.display = "block") :
                (document.getElementsByClassName("noresult")[0].style.display = "none");
            var isFirst = list.i == 1;
            var isLast = list.i > list.matchingItems.length - list.page;
            // make the Prev and Nex buttons disabled on first and last pages accordingly
            document.querySelector(".pagination-prev.disabled") ?
                document.querySelector(".pagination-prev.disabled").classList.remove("disabled") : "";
            document.querySelector(".pagination-next.disabled") ?
                document.querySelector(".pagination-next.disabled").classList.remove("disabled") : "";
            if (isFirst) {
                document.querySelector(".pagination-prev").classList.add("disabled");
            }
            if (isLast) {
                document.querySelector(".pagination-next").classList.add("disabled");
            }
            if (list.matchingItems.length <= perPage) {
                document.querySelector(".pagination-wrap").style.display = "none";
            } else {
                document.querySelector(".pagination-wrap").style.display = "flex";
            }

            if (list.matchingItems.length == perPage) {
                document.querySelector(".pagination.listjs-pagination").firstElementChild.children[0].click()
            }

            if (list.matchingItems.length > 0) {
                document.getElementsByClassName("noresult")[0].style.display = "none";
            } else {
                document.getElementsByClassName("noresult")[0].style.display = "block";
            }
        });

        var idField = document.getElementById("id-field"),
            usersImg = document.getElementById("users-img-field"),
            userNameField = document.getElementById("user-name-field"),
            emailField = document.getElementById("email-field"),
            dateField = document.getElementById("date-field"),
            accountStatusField = document.getElementById("account-status-field"),
            addBtn = document.getElementById("add-btn")
        editBtn = document.getElementById("edit-btn")
        editBtns = document.getElementsByClassName("edit-item-btn");
        removeBtns = document.getElementsByClassName("remove-item-btn")

        refreshCallbacks();

        var accountStatusVal = new Choices(accountStatusField, {
            searchEnabled: false
        });
        document.getElementById("showModal").addEventListener("show.bs.modal", function(e) {
            if (e.relatedTarget.classList.contains("edit-item-btn")) {
                document.getElementById("exampleModalLabel").innerHTML = "Edit User";
                document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
                document.getElementById("add-btn").innerHTML = "Update";
            } else if (e.relatedTarget.classList.contains("add-btn")) {
                document.getElementById("exampleModalLabel").innerHTML = "Add User";
                document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
                document.getElementById("add-btn").innerHTML = "Add User";
            } else {
                document.getElementById("exampleModalLabel").innerHTML = "List User";
                document.getElementById("showModal").querySelector(".modal-footer").style.display = "none";
            }
        });

        function refreshCallbacks() {
            // removeBtns
            if (removeBtns) {
                Array.from(removeBtns).forEach(function(btn) {
                    btn.addEventListener("click", function(e) {
                        e.target.closest("tr").children[1].innerText;
                        itemId = e.target.closest("tr").children[1].innerText;
                        var itemValues = usersList.get({
                            id: itemId,
                        });

                        Array.from(itemValues).forEach(function(x) {
                            deleteid = new DOMParser().parseFromString(x._values.id, "text/html");

                            var isElem = deleteid.body.firstElementChild;
                            var isdeleteid = deleteid.body.firstElementChild.innerHTML;

                            if (isdeleteid == itemId) {
                                document.getElementById("delete-record").addEventListener("click",
                                    function() {
                                        usersList.remove("id", isElem.outerHTML);
                                        document.getElementById("deleteRecord-close").click();
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            title: 'User Deleted successfully!',
                                            showConfirmButton: false,
                                            timer: 2000,
                                            showCloseButton: true
                                        });
                                    });
                            }
                        });
                    });
                });
            }

            // editBtns
            if (editBtns) {
                Array.from(editBtns).forEach(function(btn) {
                    btn.addEventListener("click", function(e) {
                        e.target.closest("tr").children[1].innerText;
                        itemId = e.target.closest("tr").children[1].innerText;
                        var itemValues = usersList.get({
                            id: itemId,
                        });

                        Array.from(itemValues).forEach(function(x) {
                            isid = new DOMParser().parseFromString(x._values.id, "text/html");
                            var selectedid = isid.body.firstElementChild.innerHTML;
                            if (selectedid == itemId) {
                                editlist = true;
                                idField.value = selectedid;

                                var userName = new DOMParser().parseFromString(x._values.user_name,
                                    "text/html");

                                var userImgVal = userName.body.querySelector(".user-profile-img")
                                    .src;
                                usersImg.src = userImgVal;

                                var userNameVal = userName.body.querySelector(".user_name")
                                    .innerHTML;
                                userNameField.value = userNameVal;

                                emailField.value = x._values.email_id;
                                dateField.value = x._values.date;


                                // statusVal
                                if (accountStatusVal) accountStatusVal.destroy();
                                accountStatusVal = new Choices(accountStatusField, {
                                    searchEnabled: false
                                });
                                val = new DOMParser().parseFromString(x._values.status,
                                    "text/html");
                                var statusSelec = val.body.firstElementChild.innerHTML;
                                accountStatusVal.setChoiceByValue(statusSelec);

                                flatpickr("#date-field", {
                                    dateFormat: "d M, Y",
                                    defaultDate: x._values.date,
                                });

                            }
                        });
                    });
                });
            };
        };


        //Add User

        var count = 11;
        var forms = document.querySelectorAll('.tablelist-form')
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {

                event.preventDefault();

                var errorMsg = document.getElementById("alert-error-msg");
                errorMsg.classList.remove("d-none");

                setTimeout(() => errorMsg.classList.add("d-none"), 2000);

                var text;

                if (userNameField.value == "") {
                    text = "Please enter User name";
                    errorMsg.innerHTML = text;
                    return false;
                } else if (emailField.value == "") {
                    text = "Please enter User email";
                    errorMsg.innerHTML = text;
                    return false;
                } else if (dateField.value == "") {
                    text = "Please select a date";
                    errorMsg.innerHTML = text;
                    return false;
                } else if (accountStatusField.value == "") {
                    text = "Please select a account status";
                    errorMsg.innerHTML = text;
                    return false;
                }


                if (
                    userNameField.value !== "" &&
                    emailField.value !== "" &&
                    dateField.value !== "" &&
                    accountStatusField.value !== "" && !editlist
                ) {
                    usersList.add({
                        id: `<a href="javascript:void(0);" class="fw-medium link-primary">${count}</a>`,
                        user_name: '<div class="d-flex align-items-center gap-2">\
                                <div class="flex-shrink-0"><img src="' + usersImg.src + '" alt="" class="avatar-xs rounded-circle user-profile-img"></div>\
                                <div class="flex-grow-1 ms-2 user_name">' + userNameField.value + '</div>\
                                </div>',
                        email_id: emailField.value,
                        date: dateField.value,
                        status: isStatus(accountStatusField.value)
                    });
                    usersList.sort('id', {
                        order: "desc"
                    });
                    document.getElementById("alert-error-msg").classList.add("d-none");
                    document.getElementById("close-modal").click();
                    clearFields();
                    refreshCallbacks();
                    count++;
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'User added successfully!',
                        showConfirmButton: false,
                        timer: 2000,
                        showCloseButton: true
                    });
                } else if (
                    userNameField.value !== "" &&
                    emailField.value !== "" &&
                    dateField.value !== "" &&
                    accountStatusField.value !== "" && editlist
                ) {
                    var editValues = usersList.get({
                        id: idField.value,
                    });

                    Array.from(editValues).forEach(function(x) {
                        isid = new DOMParser().parseFromString(x._values.id, "text/html");
                        var selectedid = isid.body.firstElementChild.innerHTML;
                        if (selectedid == itemId) {
                            x.values({
                                id: '<a href="javascript:void(0);" class="fw-medium link-primary">' +
                                    idField.value + "</a>",
                                user_name: '<div class="d-flex align-items-center gap-2">\
                                        <div class="flex-shrink-0"><img src="' + usersImg.src + '" alt="" class="avatar-xs rounded-circle user-profile-img"></div>\
                                        <div class="flex-grow-1 ms-2 user_name">' + userNameField.value + '</div>\
                                        </div>',
                                email_id: emailField.value,
                                date: dateField.value,
                                status: isStatus(accountStatusField.value),
                            });
                        }
                    });
                    document.getElementById("alert-error-msg").classList.add("d-none");
                    document.getElementById("close-modal").click();
                    clearFields();
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'User updated Successfully!',
                        showConfirmButton: false,
                        timer: 2000,
                        showCloseButton: true
                    });
                }
                return true;
            })
        });


        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            var json_records = JSON.parse(this.responseText);

            Array.from(json_records).forEach(function(element) {

                usersList.add({
                    id: `<a href="javascript:void(0);" class="fw-medium link-primary">#VZ${element.id}</a>`,
                    user_name: '<div class="d-flex align-items-center gap-2">\
                            <div class="flex-shrink-0"><img src="' + element.user_name[0] + '" alt="" class="avatar-xs rounded-circle user-profile-img"></div>\
                            <div class="flex-grow-1 ms-2 user_name">' + element.user_name[1] + '</div>\
                            </div>',
                    // user_name: element.user_name,
                    email_id: element.email_id,
                    date: element.date,
                    status: isStatus(element.status)
                });
                usersList.sort('id', {
                    order: "desc"
                });
                refreshCallbacks();
            });

            usersList.remove("id", `<a href="javascript:void(0);" class="fw-medium link-primary">#VZ001</a>`);
        }
        xhttp.open("GET", "build/json/users-list.json");
        xhttp.send();

        isCount = new DOMParser().parseFromString(
            usersList.items.slice(-1)[0]._values.id,
            "text/html"
        );

        var isValue = isCount.body.firstElementChild.innerHTML;

        function isStatus(val) {
            switch (val) {
                case "Active":
                    return (
                        '<span class="badge bg-success-subtle text-success ">' +
                        val +
                        "</span>"
                    );
                case "Inactive":
                    return (
                        '<span class="badge bg-danger-subtle text-danger ">' +
                        val +
                        "</span>"
                    );
            }
        }

        function clearFields() {
            userNameField.value = "";
            emailField.value = "";
            dateField.value = "";
            accountStatusField.value = "";

            if (accountStatusVal) accountStatusVal.destroy();
            accountStatusVal = new Choices(accountStatusField);

            document.getElementById("users-img-field").src = "build/images/users/user-dummy-img.jpg";

            document.getElementById("users-image-input").value = "";
        }

        document.getElementById("showModal").addEventListener("hidden.bs.modal", function() {
            clearFields();
        });

        document.querySelector(".pagination-next").addEventListener("click", function() {
            document.querySelector(".pagination.listjs-pagination") ?
                document.querySelector(".pagination.listjs-pagination").querySelector(".active") ?
                document.querySelector(".pagination.listjs-pagination").querySelector(".active").nextElementSibling
                .children[0].click() : "" : "";
        });

        document.querySelector(".pagination-prev").addEventListener("click", function() {
            document.querySelector(".pagination.listjs-pagination") ?
                document.querySelector(".pagination.listjs-pagination").querySelector(".active") ?
                document.querySelector(".pagination.listjs-pagination").querySelector(".active").previousSibling
                .children[0].click() : "" : "";
        });
    </script>
@endsection

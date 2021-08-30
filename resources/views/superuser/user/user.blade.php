@extends('superuser.base')

@section('moreCss')
    {{-- <link rel="stylesheet" href="{{ asset('css/tab.css') }}" type="text/css"> --}}
@endsection


@section('content')

    <section class="" style="margin-top: 100px">
        <div role="tablist">
            <div class="items-tab" id="menu-tab">
                <a class="card-tab active d-block c-text card-user" id="usuperuser" data-roles="superuser" data-text-roles="Superuser">
                    <div class="d-flex justify-content-between">
                        <i class='bx bx-user-circle icon-size-lg '></i>
                        <p class="number-card">0</p>
                    </div>
                    <div class="mt-2">
                        Super User
                    </div>
                </a>

                <a class="card-tab d-block c-text card-user" id="uadmin" data-roles="admin" data-text-roles="Admin">
                    <div class="d-flex justify-content-between">
                        <i class='bx bx-user-voice'></i>
                        <p class="number-card">0</p>
                    </div>
                    <div class="mt-2">
                        Admin Balai
                    </div>
                </a>

                <a class="card-tab d-block c-text card-user" id="uaccessor" data-roles="accessor" data-text-roles="Asesor Balai">
                    <div class="d-flex justify-content-between">
                        <i class='bx bx-user'></i>
                        <p class="number-card">0</p>
                    </div>
                    <div class="mt-2">
                        Asesor Balai
                    </div>
                </a>

                <a class="card-tab d-block c-text card-user" id="uaccessorppk" data-roles="accessorppk" data-text-roles="Asesor PPK">
                    <div class="d-flex justify-content-between">
                        <i class='bx bx-user'></i>
                        <p class="number-card">0</p>
                    </div>
                    <div class="mt-2">
                        Asesor PPK
                    </div>
                </a>

                <a class="card-tab d-block c-text card-user" id="uvendor" data-roles="vendor" data-text-roles="Penyedia Jasa">
                    <div class="d-flex justify-content-between">
                        <i class='bx bx-user'></i>
                        <p class="number-card">0</p>
                    </div>
                    <div class="mt-2">
                        Penyedia Jasa
                    </div>
                </a>
            </div>


            <!-- Modal Tambah-->
            <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="title"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form" onsubmit="return Save()">
                                @csrf
                                <input id="id" name="id" hidden>
                                <input name="roles" id="roles" hidden>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">PPK</label>
                                    <select class="select2 me-2 w-100" aria-label="Default select example" id="selectPPK" name="selectPPK" required>
                                        <option>asdadas</option>
                                        <option>asdadas</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                           name="password_confirmation">
                                </div>
                                <div class="mb-4"></div>
                                <button type="submit" class="bt-primary">Simpan</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- Tab panes -->
        <div class="mt-4" style="min-height: 23vh">
            <!-- Tab panes -->
            {{-- @yield('contentUser') --}}

            <div class="header-table">
                <p class="title-table">Data Super User</p>
                <a class="bt-primary-sm" id="addData" data-type="Tambah"><i class='bx bx-plus'></i> Tambah Data</a>
            </div>


            <div class="table-container">
                <table id="table" class="table table-striped" style="width:100%">
                </table>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        var roles, textRoles;
        var table;
        $(document).ready(function () {
            $("#user").addClass("active");
            roles = 'superuser';
            textRoles = 'Superuser'
            getCountUser()
            // $('#selectPPK').select2();
            // getSelect('selectPPK','/ppk/get-all','name')
            datatable(roles);
        });

        function Save() {
            saveData('Tambah Data ' + textRoles, 'form', null, afterSave)
            return false;
        }

        function afterSave() {
            $('#tambahdata').modal('hide');
            table.ajax.reload();
            getCountUser()
        }

        $(document).on('click', '#addData, #editData', function () {
            $('#tambahdata #id').val($(this).data('id'));
            $('#tambahdata #roles').val(roles);
            $('#tambahdata #title').html($(this).data('type') + ' Data ' + textRoles);
            $('#tambahdata #email').val($(this).data('email'));
            $('#tambahdata #name').val($(this).data('name'));
            $('#tambahdata #username').val($(this).data('username'));
            $('#tambahdata #password_confirmation').val('');
            $('#tambahdata #password').val('');
            if ($(this).data('id')) {
                $('#tambahdata #password_confirmation').val('********');
                $('#tambahdata #password').val('********');
            }

            $('#tambahdata').modal('show');
        })

        //GANTI MENU
        var header = document.getElementById("menu-tab");
        var btns = header.getElementsByClassName("card-tab");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function () {

                var current = $('.card-tab.active')
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active ";

            });
        }

        function getCountUser() {
            $.get(window.location.pathname + '/count', function (data) {
                $.each(data, function (key, val) {
                    console.log(val['roles']['0'])
                    $('#u' + val['roles']['0'] + ' p').html(val['count'])
                })
            })
        }

        function datatable(role) {

            var url = window.location.pathname + '/datatable/' + role;
            table = $('#table').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                ajax: url,
                "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    // debugger;
                    var numStart = this.fnPagingInfo().iStart;
                    var index = numStart + iDisplayIndexFull + 1;
                    // var index = iDisplayIndexFull + 1;
                    $("td:first", nRow).html(index);
                    return nRow;
                },
                columnDefs: [
                    {"title": "#", "searchable": false, "orderable": false, "targets": 0, "className": "text-center"},
                    {"title": "Nama", 'targets': 1, 'searchable': true, 'orderable': true, "className": "text-center"},
                    {"title": "Username", 'targets': 2, 'searchable': true, 'orderable': true, "className": "text-center"},
                    {"title": "Email", 'targets': 3, 'searchable': true, 'orderable': true, "className": "text-center"},
                    {"title": "Action", 'targets': 4, 'searchable': false, 'orderable': false, "className": "text-center"},
                ],

                columns: [
                    {
                        "className": '',
                        "orderable": false,
                        "data": null,
                        "defaultContent": ''
                    },
                    {data: role + '.name', name: role + '.name'},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {
                        "target": 2,
                        "data": 'id',
                        "width": '100',
                        "render": function (data, type, row, meta) {
                            return '<a href="#!" class="btn btn-sm btn-danger btn-sm me-2" style="border-radius: 50px" data-position="" data-name="" data-id="' + data + '" id="deleteData"><i class="bx bx-trash-alt"></i></a>' +
                                '<a href="#!" class="btn btn-sm btn-success btn-sm" style="border-radius: 50px" data-username="' + row.username + '" data-type="Edit" data-email="' + row.email + '" data-name="' + row[role].name + '" data-id="' + data + '" id="editData"><i class="bx bx-edit"></i></a>'
                        }
                    },
                ]
            })
        }

        $(document).on('click', '.card-user', function () {
            roles = $(this).data('roles');
            textRoles = $(this).data('text-roles')
            datatable(roles);

            $('.title-table').text('Data ' + textRoles);
        })

    </script>
@endsection

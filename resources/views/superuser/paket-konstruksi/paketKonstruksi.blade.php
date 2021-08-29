@extends('superuser.base')

@section('moreCss')
    {{-- <link rel="stylesheet" href="{{ asset('css/tab.css') }}" type="text/css"> --}}
@endsection

@section('title')
    Dashboard
@endsection

@section('content')

    <section class="" style="margin-top: 100px">

        <!-- Tab panes -->
        <div class="mt-4" style="min-height: 23vh">
            <!-- Tab panes -->
            {{-- @yield('contentUser') --}}

            <div class="header-table">
                <p class="title-table">Data Paket Konstruksi</p>
                <a class="bt-primary-sm" id="addData"><i class='bx bx-plus'></i> Tambah Data</a>
            </div>
            <div class="table-container">
                <table id="table" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Konstruksi</th>
                            <th>Nama PPK</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Gedung ABC</td>
                            <td>Anto</td>
                            <td>12 Agustus 2021</td>
                            <td>31 Agustus 2021</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>

        <!-- Modal Tambah-->
        <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Konstruksi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form" onsubmit="return Save()">
                            @csrf
                            <input id="id" name="id" hidden>
                            <input name="roles" value="admin" hidden>


                            <div class="mb-3">
                                <label for="namaKonstruksi" class="form-label">Nama Konstruksi</label>
                                <input type="text" class="form-control" id="namaKonstruksi" name="namaKonstruksi">
                            </div>

                            <div class="mb-3">
                                <label for="namaPPK" class="form-label">Nama PPK</label>
                                <select class=" me-2 w-100 form-control"   aria-label="select" id="namaPPK" name="namaPPK"
                                    required>

                                </select>
                            </div>

                            <div class="input-group input-daterange">
                                <div class="me-2">
                                    <label for="start" class="form-label">Tanggal Mulai</label>
                                    <input type="text" class="form-control " name="start" required>
                                </div>


                                <div class="ms-2">
                                    <label for="end" class="form-label">Tanggal Berakhir</label>
                                    <input type="text" class="form-control " name="end" required>
                                </div>

                            </div>

                            <button type="submit" class="bt-primary mt-3">Simpan</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $("#paketKonstruksi").addClass("active");
            // $("#uSuperUser").addClass("active");
            $('#tambahdata').modal({
                backdrop: 'static',
                keyboard: false
            })
            $('#table').DataTable();

            var select = $('#kota');
            select.select2();
        });

        $('.input-daterange input').each(function() {
            $(this).datepicker({
                format: "dd-mm-yyyy"
            });
        });

        $(document).on('click', '#addData, #editData', function() {
            // $('#tambahdata #id').val($(this).data('id'));
            // $('#tambahdata #nama').val($(this).data('nama'));
            // $('#tambahdata #alamat').val($(this).data('alamat'));
            // $('#tambahdata #no_hp').val($(this).data('hp'));
            // $('#tambahdata #username').val($(this).data('username'));
            // $('#tambahdata #password_confirmation').val('');
            // $('#tambahdata #password').val('');
            // if($(this).data('id')){
            //     $('#tambahdata #password_confirmation').val('******');
            //     $('#tambahdata #password').val('******');
            // }
            $('#tambahdata').modal('show');
        })
    </script>
@endsection

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
                        <th>Nama Paket</th>
                        <th>PPK</th>
                        <th>Penyedia Jasa</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>

                    </tr>
                    </thead>
                    <tbody>
                    {{--                        <tr>--}}
                    {{--                            <td>1</td>--}}
                    {{--                            <td>Gedung ABC</td>--}}
                    {{--                            <td>Anto</td>--}}
                    {{--                            <td>12 Agustus 2021</td>--}}
                    {{--                            <td>31 Agustus 2021</td>--}}
                    {{--                        </tr>--}}
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
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Paket</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="mb-3">
                                <label for="ppk" class="form-label">Nama PPK</label>
                                <select class=" me-2 w-100 form-control" aria-label="select" id="ppk" name="ppk">
                                    @foreach($ppk as $v)
                                        <option value="{{$v->id}}">{{$v->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="vendor" class="form-label">Penyedia Jasa</label>
                                <select class=" me-2 w-100 form-control" aria-label="select" id="vendor" name="vendor">
                                    @foreach($vendor as $v)
                                        <option value="{{$v->user->id}}">{{$v->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group input-daterange">
                                <div class="me-2">
                                    <label for="start" class="form-label">Tanggal Mulai</label>
                                    <input type="text" class="form-control " name="start" required>
                                </div>


                                <div class="ms-2">
                                    <label for="finish" class="form-label">Tanggal Berakhir</label>
                                    <input type="text" class="form-control " name="finish" required>
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
        $(document).ready(function () {

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

        $('.input-daterange input').each(function () {
            $(this).datepicker({
                format: "dd-mm-yyyy"
            });
        });

        $(document).on('click', '#addData, #editData', function () {
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

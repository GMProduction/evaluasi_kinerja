@extends('superuser.base')

@section('moreCss')
    {{-- <link rel="stylesheet" href="{{ asset('css/tab.css') }}" type="text/css"> --}}
@endsection



@section('content')

    <section class="" style="margin-top: 100px">

        <div class="mt-4" style="min-height: 23vh">
            <div class="header-table table-container">
                <p class="title-table">Data Indikator</p>
                <a class="bt-primary-sm" id="addData"><i class='bx bx-plus'></i> Tambah Data</a>
            </div>

            <form class="row g-3">
                <div class="col">
                    <input class="form-control" type="text" name="cari" value="{{request('cari')}}" placeholder="Cari master indikator">
                </div>
                <div class="col-auto">
                    <button class="btn btn-success" type="submit"><i class='bx bx-search-alt-2'></i></button>
                </div>
                <div class="col-auto">
                    <a class="btn btn-primary" href="/indikator"><i class='bx bx-reset'></i></a>
                </div>
            </form>
            <div class="">
                <div class="row" id="rowIndikator">
                </div>
            </div>
        </div>

        <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><span id="title"></span> Data Indikator</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form" onsubmit="return Save()">
                            @csrf
                            <input id="id" name="id" hidden>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Indikator</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="weight" class="form-label">Bobot</label>
                                <input type="text" class="form-control" id="weight" name="weight" required value="0">
                            </div>
                            <button type="submit" class="bt-primary">Simpan</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        var title, idSubIndikator, idIndikator;
        $(document).ready(function () {

            $("#indikator").addClass("active");
            getMainIndicator()
            currency('weight')
        });

        $(document).on('click', '#addSubIndikaor', function () {
            $('.trInput').remove();
            var id = $(this).data('id');
            $('#table' + id + ' tr:last').after('<tr id="trInput" class="trInput">' +
                '                                   <td><input type="text" class="form-control" name="name" value="" required></td>' +
                '                                   <td class="text-center"><a class="btn btn-sm btn-success me-2"  style="border-radius: 50px; width: 50px" data-id-indikator="' + id + '" id="saveSubIndicator"><i class=\'bx bxs-save\'></i></a>' +
                '                                   <a class="btn btn-sm btn-danger"  style="border-radius: 50px; width: 50px" data-id-indikator="' + id + '" id="clearInputSubIndikator"><i class=\'bx bx-window-close\'></i></a></td>' +
                '                                </tr>');
        })

        $(document).on('click', '#clearInputSubIndikator', function () {
            $('.trInput').remove();
        })

        $(document).on('click', '#editSubIndikator', function () {
            var $item = $(this).closest("tr")
            idSubIndikator = $(this).data('id');
            idIndikator = $(this).data('id-indikator')
            $item.html('' +
                '                                   <td><input type="text" class="form-control" name="name" value="' + $(this).data('name') + '" required></td>' +
                '                                   <td class="text-center"><a class="btn btn-sm btn-success me-2"  style="border-radius: 50px; width: 50px" data-id="' + idSubIndikator + '" data-id-indikator="' + idIndikator + '" id="saveSubIndicator"><i class=\'bx bxs-save\'></i></a>' +
                '                                   <a class="btn btn-sm btn-danger"  style="border-radius: 50px; width: 50px" data-id-indikator="' + idIndikator + '" id="clearEditInputSubIndikator"><i class=\'bx bx-window-close\'></i></a></td>' +
                '                                ');
            console.log($item);
            console.log($item[0].children);
            console.log($item[0].cells[0]);
        })

        $(document).on('click', '#clearEditInputSubIndikator', function () {

            getSubIndikator($(this).data('id-indikator'))
        })

        $(document).on('click', '#saveSubIndicator', function () {
            var title = 'Tambah';
            if ($(this).data('id')) {
                title = 'Edit'
            }
            if ($('#trInput [name="name"]').val() === '') {
                swal("Nama sub indikator harus disisi", {
                    icon: "warning",
                    buttons: false,
                    timer: 2000
                })
                return false
            }

            var idIndikator = $(this).data('id-indikator');
            var data = {
                '_token': '{{csrf_token()}}',
                'id': $(this).data('id'),
                'name': $('[name="name"]').val(),
            }
            console.log(data)
            saveDataObject(title + ' Data Sub Indikator', data, window.location.pathname + '/' + idIndikator, afterSaveSub)
            return false;
        })

        function afterSaveSub(data) {
            console.log(data)
            $('.trInput').remove();

            getSubIndikator(data['data'])
        }

        function getMainIndicator() {
            var filter = {
                'cari': '{{request('cari')}}'
            }

            $.get('/indikator/get-all', filter, function (data) {
                $('#rowIndikator').empty();
                $.each(data, function (key, value) {
                    var name = value['name'];

                    $('#rowIndikator').append('<div class="col-sm-12  ">\n' +
                        '                        <div class="card-indikator table-container">\n' +
                        '                            <div class="header-indikator">\n' +
                        '                                <div class="row"><p class="mb-0 fw-bold">' + name + ' <span class="badge bg-primary">Bobot : '+value['weight']+'</span> <span><a class="btn btn-sm" title="Edit Master Indikator" data-weight="'+value['weight']+'" data-name="' + name + '"  data-id="' + value['id'] + '" id="editData"><i class=\'bx bx-edit-alt\'></i></a></span></p>\n' +
                        '                                      ' +
                        '                                 </div>' +
                        '                                <a class="bt-success-sm" data-id="' + value['id'] + '"  id="addSubIndikaor">Tambah Sub</a>\n' +
                        '                            </div>\n' +
                        '                            <div class="body-indikator">\n' +
                        '                                <table class="table" id="table' + value['id'] + '">\n' +
                        '                                    <thead>\n' +
                        '                                    <tr>\n' +
                        '                                        <th style="width: 85%">Sub Indikator</th>\n' +
                        '                                        <th class="text-center"  colspan="2">Aksi</th>\n' +
                        '                                    </tr>\n' +
                        '                                    </thead>\n' +
                        '                                    <tbody id="tbody' + value['id'] + '">\n' +
                        '                                    </tbody>\n' +
                        '                                </table>\n' +
                        '                            </div>\n' +
                        '                        </div>\n' +
                        '                    </div>');
                    $.each(value['sub_indicator'], function (k, v) {
                        $('#tbody' + value['id']).append(' <tr>\n' +
                            '                                        <td>' + v['name'] + '</td>\n' +
                            '                                        <td class="text-center" style="width: 150px;"><a href="#!" class="btn btn-sm btn-danger btn-sm me-2" style="border-radius: 50px; width: 50px" data-indikator="' + value['id'] + '" data-id="' + v['id'] + '" id="deleteSubIndikator"><i class="bx bx-trash-alt"></i></a>' +
                            '                                             <a href="#!" class="btn btn-sm btn-success btn-sm" style="border-radius: 50px; width: 50px" data-name="' + v['name'] + '"  data-id-indikator="' + value['id'] + '"  data-id="' + v['id'] + '" id="editSubIndikator"><i class="bx bx-edit"></i></a></td>\n' +
                            '                                    </tr>')
                    })

                })
            })
        }

        function getSubIndikator(id) {
            $.get('/indikator/' + id + '/sub', function (data) {
                $('#tbody' + id).empty();
                $.each(data, function (k, v) {
                    $('#tbody' + v['indicator_id']).append(' <tr>\n' +
                        '                                        <td>' + v['name'] + '</td>\n' +
                        '                                        <td><a href="#!" class="btn btn-sm btn-danger btn-sm me-2" style="border-radius: 50px; width: 50px"  data-id="' + v['id'] + '" id="deleteSubIndikator"><i class="bx bx-trash-alt"></i></a>' +
                        '                                             <a href="#!" class="btn btn-sm btn-success btn-sm" style="border-radius: 50px; width: 50px"  data-id="' + v['id'] + '" data-name="' + v['name'] + '"  data-id-indikator="' + v['indicator_id'] + '" id="editSubIndikator"><i class="bx bx-edit"></i></a></td>\n' +
                        '                                    </tr>')
                })
            })
        }

        $(document).on('click', '#deleteSubIndikator', function () {

        })

        $(document).on('click', '#addData, #editData', function () {
            console.log('asd')
            $('#tambahdata #id').val($(this).data('id'));
            $('#tambahdata #name').val($(this).data('name'));
            $('#tambahdata #weight').val($(this).data('weight'));
            title = 'Tambah';
            if ($(this).data('id')) {
                title = 'Edit'
            }
            $('#tambahdata #title').html(title);
            $('#tambahdata').modal('show');
        });

        function Save() {
            saveData(title + ' Data Main Indikator', 'form')
            return false;
        }

        function afterSave() {

        }
    </script>
@endsection

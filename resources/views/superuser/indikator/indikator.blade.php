@extends('superuser.base')

@section('moreCss')
    {{-- <link rel="stylesheet" href="{{ asset('css/tab.css') }}" type="text/css"> --}}
@endsection



@section('content')

    <section class="" style="margin-top: 100px">

        <!-- Tab panes -->
        <div class="mt-4" style="min-height: 23vh">
            <!-- Tab panes -->
            {{-- @yield('contentUser') --}}

            <div class="header-table">
                <p class="title-table">Data Indikator</p>
                <a class="bt-primary-sm" id="addData"><i class='bx bx-plus'></i> Tambah Data</a>
            </div>


            <div class="">
                <div class="row" id="rowIndikator">
                    {{--                    <div class="col-sm-12 col-md-6 ">--}}
                    {{--                        <div class="card-indikator table-container">--}}
                    {{--                            <div class="header-indikator">--}}
                    {{--                                <p class="mb-0 fw-bold">Main Indikator</p>--}}
                    {{--                                <a class="bt-success-sm" data-id="main" id="addSubIndikaor">tambah Sub</a>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="body-indikator">--}}
                    {{--                                <table class="table" id="tablemain">--}}
                    {{--                                    <thead>--}}
                    {{--                                    <tr>--}}
                    {{--                                        <th>Sub Indikator</th>--}}
                    {{--                                        <th>Bad</th>--}}
                    {{--                                        <th>Medium</th>--}}
                    {{--                                        <th>Good</th>--}}
                    {{--                                    </tr>--}}
                    {{--                                    </thead>--}}
                    {{--                                    <tbody>--}}
                    {{--                                    <tr>--}}
                    {{--                                        <td>Nama Sub Indikator</td>--}}
                    {{--                                        <td>50</td>--}}
                    {{--                                        <td>50</td>--}}
                    {{--                                        <td>50</td>--}}
                    {{--                                    </tr>--}}
                    {{--                                    </tbody>--}}
                    {{--                                </table>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

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
        var title;
        $(document).ready(function () {

            $(document).on('click', '#addSubIndikaor', function () {
                $('.trInput').remove();
                var id = $(this).data('id');
                $('#table' + id + ' tr:last').after('<tr id="trInput" class="trInput">' +
                    '                                   <td><input type="text" class="form-control" name="name" value=""></td>' +
                    '                                   <td><input type="number" class="form-control" name="bad" value=""></td>' +
                    '                                   <td><input type="number" class="form-control"  name="medium" value=""></td>' +
                    '                                   <td><input type="number" class="form-control" name="good" value=""></td>' +
                    '                                   <td class="text-center"><a class="btn btn-sm btn-success me-2"  style="border-radius: 50px; width: 50px" data-id-indikator="' + id + '" id="saveSubIndicator"><i class=\'bx bxs-save\'></i></a>' +
                    '                                   <a class="btn btn-sm btn-danger"  style="border-radius: 50px; width: 50px" data-id-indikator="' + id + '" id="clearInputSubIndikator"><i class=\'bx bx-window-close\'></i></a></td>' +
                    '                                </tr>');
            })

            $(document).on('click', '#clearInputSubIndikator', function () {
                $('.trInput').remove();
            })

            $(document).on('click', '#saveSubIndicator', function () {
                var title = 'Tambah';
                if ($(this).data('id')) {
                    title = 'Edit'
                }
                var idIndikator = $(this).data('id-indikator');
                var data = {
                    '_token': '{{csrf_token()}}',
                    'id': $(this).data('id'),
                    'bad': $('#trInput [name="bad"]').val(),
                    'name': $('#trInput [name="name"]').val(),
                    'medium': $('#trInput [name="medium"]').val(),
                    'good': $('#trInput [name="good"]').val(),
                }
                saveDataObject(title + ' Data Sub Indikator', data, window.location.pathname + '/' + idIndikator, afterSaveSub)
                return false;
            })

            function afterSaveSub(data) {
                console.log(data)
                $('.trInput').remove();

                getSubIndikator(data['data'])
            }

            $("#indikator").addClass("active");
            getMainIndicator()


        });

        //     // Add event listener for opening and closing details
        //     $('#table tbody').on('click', 'td.details-control', function() {
        //         var tr = $(this).closest('tr');
        //         var row = table.row(tr);

        //         if (row.child.isShown()) {
        //             // This row is already open - close it
        //             row.child.hide();
        //             tr.removeClass('shown');
        //         } else {
        //             // Open this row
        //             row.child(format(row.data())).show();
        //             tr.addClass('shown');
        //         }
        //     });
        // });

        // function format(d) {
        //     // `d` is the original data object for the row
        //     return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" class="table table-striped">' +
        //         '<th> Sub Indikator' +
        //         '</th>' +
        //         '<th> Kurang' +
        //         '</th>' +
        //         '<th> Cukup' +
        //         '</th>' +
        //         '<th> Kurang' +
        //         '</th>' +
        //         '<th> Action' +
        //         '</th>' +
        //         '<tr>' +
        //         '<td>Produktivitas</td>' +
        //         '<td>30</td>' +
        //         '<td>60</td>' +
        //         '<td>100</td>' +
        //         '<td><a class="bt-primary">edit</a></td>' +
        //         '<td></td>' +
        //         '</tr>' +
        //         '</table>';
        // }

        function getMainIndicator() {
            $.get('/indikator/get-all', function (data) {
                $('#rowIndikator').empty();
                $.each(data, function (key, value) {
                    var name = value['name'];

                    $('#rowIndikator').append('<div class="col-sm-12  ">\n' +
                        '                        <div class="card-indikator table-container">\n' +
                        '                            <div class="header-indikator">\n' +
                        '                                <div class="row"><p class="mb-0 fw-bold">' + name + ' <span><a class="btn btn-sm" title="Edit Master Indikator" data-name="'+name+'"  data-id="' + value['id'] + '" id="editData"><i class=\'bx bx-edit-alt\'></i></a></span></p>\n' +
                        '                                      ' +
                        '                                 </div>' +
                        '                                <a class="bt-success-sm" data-id="' + value['id'] + '"  id="addSubIndikaor">Tambah Sub</a>\n' +
                        '                            </div>\n' +
                        '                            <div class="body-indikator">\n' +
                        '                                <table class="table" id="table' + value['id'] + '">\n' +
                        '                                    <thead>\n' +
                        '                                    <tr>\n' +
                        '                                        <th style="width: 60%">Sub Indikator</th>\n' +
                        '                                        <th class="text-center" style="width: 100px">Bad</th>\n' +
                        '                                        <th class="text-center"  style="width: 100px">Medium</th>\n' +
                        '                                        <th class="text-center"  style="width: 100px">Good</th>\n' +
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
                            '                                        <td class="text-center" >' + v['bad'] + '</td>\n' +
                            '                                        <td class="text-center" >' + v['medium'] + '</td>\n' +
                            '                                        <td class="text-center" >' + v['good'] + '</td>\n' +
                            '                                        <td class="text-center" style="width: 150px;"><a href="#!" class="btn btn-sm btn-danger btn-sm me-2" style="border-radius: 50px; width: 50px"  data-id="' + v['id'] + '" id="deleteSubIndikator"><i class="bx bx-trash-alt"></i></a>' +
                            '                                             <a href="#!" class="btn btn-sm btn-success btn-sm" style="border-radius: 50px; width: 50px"  data-id="' + v['id'] + '" id="editSubIndikator"><i class="bx bx-edit"></i></a></td>\n' +
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
                        '                                        <td>' + v['bad'] + '</td>\n' +
                        '                                        <td>' + v['medium'] + '</td>\n' +
                        '                                        <td>' + v['good'] + '</td>\n' +
                        '                                        <td><a href="#!" class="btn btn-sm btn-danger btn-sm me-2" style="border-radius: 50px; width: 50px"  data-id="' + v['id'] + '" id="deleteSubIndikator"><i class="bx bx-trash-alt"></i></a>' +
                        '                                             <a href="#!" class="btn btn-sm btn-success btn-sm" style="border-radius: 50px; width: 50px"  data-id="' + v['id'] + '" id="editSubIndikator"><i class="bx bx-edit"></i></a></td>\n' +
                        '                                    </tr>')
                })
            })
        }

        $(document).on('click','#editSubIndikator', function () {
            var $item = $(this).closest("tr")
            console.log($item);
            console.log($item[0].children);
            console.log($item[0].cells[0]);
        })

        $(document).on('click', '#addData, #editData', function () {
            $('#tambahdata #id').val($(this).data('id'));
            $('#tambahdata #name').val($(this).data('name'));
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

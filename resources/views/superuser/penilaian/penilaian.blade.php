@extends('superuser.base')

@section('moreCss')
    {{-- <link rel="stylesheet" href="{{ asset('css/tab.css') }}" type="text/css"> --}}
@endsection

@section('title')
    Penilaian
@endsection

@section('content')
    <section class="" style="margin-top: 100px">
        <div class="mt-4" style="min-height: 23vh">
            <!-- Tab panes -->
            {{-- @yield('contentUser') --}}

            <div class="header-table">
                <p class="title-table">Data Hasil Evaluasi Paket</p>
            </div>
            <div class="table-container">
                <table id="table" class="table table-striped" style="width:100%">
{{--                    <tr>--}}
{{--                        <th>#</th>--}}
{{--                        <th>Nama Paket Konstruksi</th>--}}
{{--                        <th>Action</th>--}}
{{--                    </tr>--}}

{{--                    <tr>--}}
{{--                        <td>1</td>--}}
{{--                        <td>Paket 1</td>--}}
{{--                        <td><a class="bt-primary-xsm" href="/penilaian/detail/">Detail</a></td>--}}
{{--                    </tr>--}}
                </table>
            </div>
        </div>
    </section>
@endsection

@section('script')

    <script>
        var table;


        function datatable() {

            var url = 'penilaian/datatable';
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
                    {"title": "Paket", 'targets': 1, 'searchable': true, 'orderable': true, "className": "text-center"},
                    {
                        "title": "No. Kontrak",
                        'targets': 2,
                        'searchable': true,
                        'orderable': true,
                        "className": "text-center"
                    },
                    {
                        "title": "Penyedia Jasa",
                        'targets': 3,
                        'searchable': true,
                        'orderable': true,
                        "className": "text-center"
                    },
                    {"title": "PPK", 'targets': 4, 'searchable': true, 'orderable': true, "className": "text-center"},
                    {
                        "title": "Action",
                        'targets': 5,
                        'searchable': false,
                        'orderable': false,
                        "className": "text-center"
                    },
                ],

                columns: [{
                    "className": '',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                    {data: 'name', name: 'name'},
                    {data: 'no_reference', name: 'no_reference'},
                    {data: 'vendor.vendor.name', name: 'vendor.vendor.name'},
                    {data: 'ppk.name', name: 'ppk.name'},
                    {
                        "data": 'id',
                        "width": '100',
                        "render": function (data, type, row, meta) {
                            return '<a href="/penilaian/detail/' + data + '" class="bt-primary-xsm" data-id="' + data + '" id="editData">Detail</a>'
                        }
                    },
                ]
            })
        }
        $(document).ready(function () {
            datatable()
        });
    </script>
@endsection

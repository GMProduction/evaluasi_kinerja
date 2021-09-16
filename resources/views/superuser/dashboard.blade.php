@extends('superuser.base')

@section('moreCss')
    {{-- <link rel="stylesheet" href="{{ asset('css/tab.css') }}" type="text/css"> --}}
@endsection


@section('content')

    <section class="" style="margin-top: 100px">
    @if(auth()->user()->roles[0] == 'superuser' || auth()->user()->roles[0] == 'admin')
        @include('superuser.dashboard.superuser', ['data' => 'content'])
    @endif

        <div class="mt-4" style="min-height: 23vh">
            <div class="table-container">
                <p class="fw-bold t-primary">Data Konstruksi Yang Masih Berlangsung</p>
                <table id="table" class="table table-striped" style="width:100%">
                </table>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @if(auth()->user()->roles[0] == 'superuser' || auth()->user()->roles[0] == 'admin')
        @include('superuser.dashboard.superuser', ['data' => 'script'])
    @endif

    <script>
        var roles, textRoles;
        var table;
        $(document).ready(function () {
            // chart()
            // cahar11()
            roles = 'superuser';
            textRoles = 'Superuser'
            datatable()
        });

        function datatable() {

            var url = '/datatable-package-ongoing';
            var table = $('#table').DataTable({
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
                    {"title": "#", "searchable": false, "orderable": false, "targets": 0, "className": "text-center", "width": "100"},
                    {"title": "Paket", 'targets': 1, 'searchable': true, 'orderable': true, "className": "text-center"},
                    {"title": "No. Kontrak", 'targets': 2, 'searchable': true, 'orderable': true, "className": "text-center"},
                    {"title": "Tanggal Kontrak", 'targets': 3, 'searchable': true, 'orderable': true, "className": "text-center"},
                    {"title": "PPK", 'targets': 4, 'searchable': true, 'orderable': true, "className": "text-center"},
                    {"title": "Penyedia Jasa", 'targets': 5, 'searchable': true, 'orderable': true, "className": "text-center"},
                    {"title": "Mulai", 'targets': 6, 'searchable': true, 'orderable': true, "className": "text-center"},
                    {"title": "Selesai", 'targets': 7, 'searchable': true, 'orderable': true, "className": "text-center"},
                ],

                columns: [
                    {
                        "className": '',
                        "orderable": false,
                        "data": null,
                        "defaultContent": ''
                    },
                    {data: 'name', name: 'name'},
                    {data: 'no_reference', name: 'no_reference'},
                    {
                        data: 'date', name: 'date', render: function (data) {
                            return moment(data).format('DD MMMM YYYY')
                        }
                    },
                    {data: 'ppk.name', name: 'ppk.name'},
                    {data: 'vendor.vendor.name', name: 'vendor.vendor.name'},
                    {
                        data: 'start_at', name: 'start_at', render: function (data) {
                            return moment(data).format('DD MMMM YYYY')
                        }
                    },
                    {
                        data: 'finish_at', name: 'finish_at', render: function (data) {
                            return moment(data).format('DD MMMM YYYY')
                        }
                    },
                ]
            })
        }


    </script>
@endsection

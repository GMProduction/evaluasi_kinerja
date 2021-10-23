@if($data == 'content')

    <div class="mt-4" style="min-height: 23vh">
        <div class="table-container">
            <p class="fw-bold t-blackk">Data Konstruksi Yang Masih Berlangsung</p>
            <table id="table" class="table table-striped display responsive wrap" style="width:100%">
            </table>
        </div>
    </div>

@elseif($data == 'script')
    <script>
        $(document).ready(function () {
            datatable()

        })

        function datatable() {

            var url = '/datatable-package-ongoing';
            var table = $('#table').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                scrollX: true,
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
                    {"title": "#", "searchable": false, "orderable": false, "targets": 0, "className": "left-in-small", "width": "30"},
                    {"title": "Paket", 'targets': 1, 'searchable': true, 'orderable': true, "className": "left-in-small"},
                    {"title": "No. Kontrak", 'targets': 2, 'searchable': true, 'orderable': true, "className": "left-in-small"},
                    {"title": "Tanggal Kontrak", 'targets': 3, 'searchable': true, 'orderable': true, "className": "left-in-small"},
                    {"title": "PPK", 'targets': 4, 'searchable': true, 'orderable': true, "className": "left-in-small"},
                    {"title": "Penyedia Jasa", 'targets': 5, 'searchable': true, 'orderable': true, "className": "left-in-small"},
                    {"title": "Mulai", 'targets': 6, 'searchable': true, 'orderable': true, "className": "left-in-small"},
                    {"title": "Selesai", 'targets': 7, 'searchable': true, 'orderable': true, "className": "left-in-small"},
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
@endif

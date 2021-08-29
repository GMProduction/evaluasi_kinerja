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


            <div class="table-container">
                {{-- <table id="table" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    

                </table> --}}


                <div class="card-indikator">
                    <div class="header-indikator">
                        <p class="mb-0 fw-bold">Main Indikator</p>
                        <a class="bt-success-sm">tambah Sub</a>
                    </div>
                    <div class="body-indikator">
                        <p>Nama Sub Indicator</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $("#indikator").addClass("active");
            // $("#uSuperUser").addClass("active");

            // var table = $('#table').DataTable({
            //     "ajax": "/data/object.txt",
            //     "columns": [{
            //             "className": 'details-control',
            //             "orderable": false,
            //             "data": null,
            //             "defaultContent": ''
            //         },
            //         {
            //             "data": "name"
            //         },
            //         {
            //             "data": "position"
            //         },
            //         {
            //             "data": "office"
            //         },
            //         {
            //             "data": "salary"
            //         }
            //     ],
            //     "order": [
            //         [1, 'asc']
            //     ]
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
        });
    </script>
@endsection

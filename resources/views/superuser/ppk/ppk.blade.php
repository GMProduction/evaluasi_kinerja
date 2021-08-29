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
                <p class="title-table">Data PPK</p>
                <a class="bt-primary-sm" id="addData"><i class='bx bx-plus'></i> Tambah Data</a>
            </div>
            <div class="table-container">
                <table id="table" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                  
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Anto</td>
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data PPK</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form" onsubmit="return Save()">
                            @csrf
                            <input id="id" name="id" hidden>
                            <input name="roles" value="admin" hidden>
                          

                            <div class="mb-3">
                                <label for="namappk" class="form-label">Nama PPK</label>
                                <input type="text" class="form-control" id="namappk" name="namappk">
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
        $(document).ready(function() {

            $("#ppk").addClass("active");
            // $("#uSuperUser").addClass("active");

            $('#table').DataTable();
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

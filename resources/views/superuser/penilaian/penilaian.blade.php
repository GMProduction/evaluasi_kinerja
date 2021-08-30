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
                    <tr>
                        <th>#</th>
                        <th>Nama Paket Konstruksi</th>
                        <th>Action</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Paket 1</td>
                        <td><a class="bt-primary-xsm" href="/detail-penilaian">Detail</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
@endsection

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
{{--                <a class="bt-primary-sm" id="addData"><i class='bx bx-plus'></i> Tambah Data</a>--}}
            </div>
            <div class="table-container">
                <table id="table" class="table table-striped" style="width:100%">
                </table>
            </div>
        </div>
    </section>
@endsection

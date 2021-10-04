<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evaluasi Kinerja | {{ auth()->user()->roles[0] }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Creative Tim">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bona+Nova:ital,wght@0,400;0,700;1,400&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('css/shimer.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('css/boxicon.min.css') }}" type="text/css"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
          rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

    <script src="{{ asset('js/swal.js') }}"></script>
    <style>
        .banner-information {
            height: 160px;
            width: 100%;
            background-color: #1F9CAC;
        }

        .banner-information .banner-image {
            border-radius: 50%;
            margin-right: 30px;
        }

        .banner-information .banner-name {
            font-size: 30px;
            color: white;
            margin-bottom: 0px;
        }

        .banner-information .banner-qualified {
            font-size: 20px;
            color: white;
            margin-top: 0;
        }

        .banner-information .active-package-panel {
            width: 120px;
            height: 60px;
            background-color: #F7C232;
            border-radius: 10px;
            padding: 5px 5px;
            margin-bottom: 20px;
        }

        .package-choice {
            padding: 10px 20px;
        }

    </style>
</head>

<body>
{{-- <div class="banner-information d-flex align-items-center p-5"> --}}
{{-- <div class="flex-grow-1 d-flex"> --}}
{{-- <img src="{{ $vendor->image }}" height="100" width="100" class="banner-image mr-5"/> --}}
{{-- <div> --}}
{{-- <p class="banner-name">{{ $vendor->vendor->name }}</p> --}}
{{-- <p class="banner-qualified">{{ $vendor->vendor->kualifikasi }}</p> --}}
{{-- </div> --}}

{{-- </div> --}}
{{-- <div class="text-center"> --}}
{{-- <div class="active-package-panel" data-bs-toggle="dropdown" id="dropdownMenuClickableInside" --}}
{{-- data-bs-auto-close="outside" aria-expanded="false"> --}}
{{-- <p class="text-center" style="font-size: 16px; font-weight: bold; color: #1D3752; margin-bottom: 0">Paket --}}
{{-- Aktif</p> --}}
{{-- <p class="text-center" --}}
{{-- style="font-size: 16px; font-weight: bold; color: #1D3752; margin-bottom: 0">{{ count($data) }}</p> --}}
{{-- </div> --}}
{{-- <div class="dropdown-menu package-choice" aria-labelledby="dropdownMenuClickableInside"> --}}
{{-- <p class="text-center">Paket Aktif Tersedia</p> --}}
{{-- <div id=""> --}}
{{-- @foreach ($data as $v) --}}
{{-- <a href="#">{{ $v->name }}</a> --}}
{{-- @endforeach --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- <div class="content" style="height: 80vh"> --}}
{{-- <div class="row"> --}}
{{-- <div class="col-xl-3"> --}}
{{-- <div class="p-2" style="background-color: #1D3752; height: 80vh"> --}}
{{-- <p class="text-white">Alamat : </p> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- <div class="col-xl-9"></div> --}}
{{-- </div> --}}
{{-- </div> --}}
<style>
    body {
        background-color: #778797;
        font-family: "Segoe UI", sans-serif;
    }

    .card-panel {
        background-color: #1D3752;
        border-radius: 10px;
        box-shadow: 0 8px 60px -10px rgba(13, 28, 39, 0.6);
        padding: 30px 40px;
    }

    .table-container {
        margin-bottom: 20px
    }

    .header-profile {
        background-color: #1D3752;
        border-radius: 10px;
        box-shadow: 0 8px 60px -10px rgba(13, 28, 39, 0.6);
        padding: 30px 40px;
    }

    .secondary-color-text {
        color: #008B93;
    }

    .secondary-light-text {
        color: #a5afba;
    }

    .primary-light-text {
        color: #e8ebee;
    }

    .color-accent {
        background-color: #DFA01E;
    }

    .header-profile-right {
        border-left: 1px solid #7c7c7c;
    }

    .header-image {
        border-radius: 50%;
        margin-right: 30px;
        /*border: 4px solid #FFC43A;*/
    }

    .header-name {
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 0;
    }

    .header-qualified {
        font-size: 20px;
    }

    .header-info {
        display: flex;
        align-items: start;

    }

</style>
<section class="container-fluid p-lg-3 p-xl-3">
    <div class=" row">
        <div class="col-xl-12 ">
            <div class="header-profile mb-5">
                <div class=" row">
                    <div class="col-xl-9 col-lg-9 d-flex">
                        <img src="{{ $vendor->image }}" height="150" width="150" class="header-image mr-5"/>
                        <div class="d-flex flex-column">
                            <div class="flex-grow-1">
                                <p class="header-name secondary-color-text">{{ $vendor->vendor->name }}</p>
                                <p class="header-qualified secondary-light-text">
                                    {{ $vendor->vendor->kualifikasi }}</p>
                            </div>
                            <div>
                                <select class="color-accent" id="package-list">
                                    <option value="">--Pilih Paket--</option>
                                    @foreach ($data as $v)
                                        <option value="{{ $v->id }}">{{ $v->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 header-profile-right">
                        <div class="d-flex align-items-start">
                            <i class="bx bx-home secondary-light-text"
                               style="margin-right: 5px; margin-top: 5px"></i>
                            <span class="secondary-light-text">{{ $vendor->vendor->address }}</span>
                        </div>
                        <div class="d-flex align-items-start">
                            <i class="bx bxs-phone secondary-light-text"
                               style="margin-right: 5px; margin-top: 5px"></i>
                            <p class="secondary-light-text">{{ $vendor->vendor->phone }}</p>
                        </div>
                        <div class="d-flex align-items-start">
                            <i class="bx bx-user-pin secondary-light-text"
                               style="margin-right: 5px; margin-top: 5px"></i>
                            <p class="secondary-light-text">{{ $vendor->vendor->npwp }}</p>
                        </div>
                        <div class="d-flex align-items-start">
                            <i class="bx bx-receipt secondary-light-text"
                               style="margin-right: 5px; margin-top: 5px"></i>
                            <p class="secondary-light-text">{{ $vendor->vendor->iujk }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-3 affix">
            <div class="card-panel">
                <span class="secondary-color-text" style="font-weight: bold">Data Paket Konstruksi</span>
                <hr class="primary-light-text">
                <div class="mb-3">
                    <label for="paketkonstruksi" class="form-label secondary-light-text">Paket Konstruksi</label>
                    <input type="text" class="form-control" value="" readonly id="paketkonstruksi">
                </div>
                <div class="mb-3">
                    <label for="nomorkontrak" class="form-label secondary-light-text">Nomor Kontrak</label>
                    <input type="text" class="form-control" value="" readonly id="nomorkontrak">
                </div>
                <div class="mb-3">
                    <label for="penggunajasa" class="form-label secondary-light-text">Pengguna Jasa</label>
                    <input type="text" class="form-control" value="" readonly id="penggunajasa">
                </div>

                <div class="mb-3">
                    <label for="jenisasesmen" class="form-label secondary-light-text">Jenis Asesmen</label>
                    <input type="text" class="form-control" value="Penilaian Penyedia Jasa" readonly
                           id="jenisasesmen">
                </div>
                <div class="mb-3">
                    <label for="terahkirupdate" class="form-label secondary-light-text">Terahkir Update</label>
                    <input type="text" class="form-control" value="Belum Ada Update" readonly id="terahkirupdate">
                </div>
                <div class="form-group mb-3">
                    <label for="faktorupdate" class="secondary-light-text">Faktor Diupdate</label>
                    <textarea class="form-control" id="faktorupdate" rows="3" readonly
                              ></textarea>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-9">

            <div role="tablist" class="mb-3">

                <div class="items-tab" id="menu-tab">
                    <a class="card-tab d-block c-text card-user" id="vendor" data-roles="vendor">
                        <div class="d-flex justify-content-between">
                            <i class='bx bx-message-square-edit'></i>
                            {{-- <p class="number-card t-bagus">89</p> --}}
                        </div>
                        <div class="mt-2">
                            Penyedia Jasa
                        </div>
                    </a>

                    <a class="card-tab d-block c-text card-user" id="accessorppk" data-roles="accessorppk">
                        <div class="d-flex justify-content-between">
                            <i class='bx bx-message-square-edit'></i>
                            {{-- <p class="number-card t-cukup">67</p> --}}
                        </div>
                        <div class="mt-2">
                            Penilaian PPK
                        </div>
                    </a>

                    <a class="card-tab d-block c-text card-user " id="accessor" data-roles="accessor">
                        <div class="d-flex justify-content-between">
                            <i class='bx bx-message-square-edit'></i>
                            {{-- <p class="number-card t-kurang">38</p> --}}
                        </div>
                        <div class="mt-2">
                            Penilaian Balai
                        </div>
                    </a>

                    <a class="card-tab d-block c-text card-user" id="komulatif" data-roles="komulatif">
                        <div class="d-flex justify-content-between">
                            <i class='bx bx-message-square-edit'></i>
                            {{-- <p class="number-card t-kurang">38</p> --}}
                        </div>
                        <div class="mt-2">
                            Komulatif
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 ">
                    <div class="table-container card-panel" id="parentofchart">
                        <p class="fw-bold t-primary">Faktor Penilaian</p>
                        <hr>
                        <div class="d-flex justify-content-between " style="align-items: end;">
                            <p id="faktorternilai" class="secondary-color-text" style="font-size: .8rem;  bottom: 0;">0% Dari Faktor Penilaian</p>
                            <p id="faktorbelum" class="fw-bold" style="font-size: 2rem; color: #DFA01E;">0</p>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div id="progress-bar-faktor" class="progress-bar" role="progressbar"
                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="col-12  ">
                    <div class="table-container card-panel sticky-top" style="z-index: 0">
                        <p class="fw-bold t-primary" id="map-title">Peta Kinerja Penyedia Jasa</p>
                        <hr>
                        <canvas class="myChart" id="myChart" width="200" height="50"></canvas>
                    </div>
                </div>

                <div class="col-6  ">
                    <div class="table-container card-panel" id="parentofchart">
                        <p class="fw-bold t-primary">Risalah Hasil Penilaian Faktor</p>
                        <hr>
                        <div id="donutchart" style="width: 100%;"></div>
                    </div>
                </div>

                <div class="col-6  ">
                    <div class="table-container card-panel" id="parentofchart">
                        <p class="fw-bold t-primary">Nilai Komulatif</p>
                        <hr>
                        <h1 class=" text-center mt-5" style="font-size: 4rem; color: #DFA01E" id="comulative_value">0</h1>
                        <p id="comulative_status" class="b-cukup r-fullround text-center  ms-auto me-auto p-1 mt-3"
                           style="width: 200px">Sangat Kurang</p>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card-panel  table-container" id="content-detail-nilai">
                        <p class="fw-bold t-primary">Detail Penilaian</p>
                        <hr>
                        <div id="result-container">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span id="title"></span> Upload File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form" onsubmit="return Save()">
                        @csrf
                        <input id="id" name="id" hidden>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Sub Indikator</label>
                            <p class="fw-bold" id="fileNameSub"></p>
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">File</label>
                            <input type="file" class="form-control" id="file" name="file">
                        </div>
                        <button type="submit" class="bt-primary">Simpan</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="modalHistory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="history-container">
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <div class="spinner-grow spinner-grow-sm text-info mr-2" role="status"
                             style="margin-right: 10px">
                        </div>
                        <div class="spinner-grow spinner-grow-sm text-info mr-2" role="status"
                             style="margin-right: 10px">
                        </div>
                        <div class="spinner-grow spinner-grow-sm text-info mr-2" role="status"
                             style="margin-right: 10px">
                        </div>
                        <div class="spinner-grow spinner-grow-sm text-info mr-2" role="status"
                             style="margin-right: 10px">
                        </div>
                        <div class="spinner-grow spinner-grow-sm text-info mr-2" role="status">
                        </div>
                    </div>
                    <div class="text-center">
                        <span>Sedang Mengunduh Riwayat Perubahan Terakhir....</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalCatatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="note-container">
                    <form id="form-note" onsubmit="return SaveNote()">
                        @csrf
                        <input type="hidden" name="id-note" id="id-note" value="">
                        <div class="mb-3">
                            <label for="note" class="form-label">Catatan</label>
                            <textarea class="form-control" id="note" name="note"></textarea>
                        </div>
                        <button type="submit" class="bt-primary">Simpan</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalCatatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="note-container">
                    <form id="form-note" onsubmit="return SaveNote()">
                        @csrf
                        <input type="hidden" name="id-note" id="id-note" value="">
                        <div class="mb-3">
                            <label for="note" class="form-label">Catatan</label>
                            <textarea class="form-control" id="note" name="note"></textarea>
                        </div>
                        <button type="submit" class="bt-primary">Simpan</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalCatatanLihat" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="note" class="form-label">Catatan</label>
                        <p id="note-see"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>


<script src="{{ asset('bootstrap/js/jquery.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/myStyle.js') }}"></script>
{{-- <script src="{{ asset('js/sidebar.js') }}"></script> --}}
<script type="text/javascript" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ asset('js/currency.js') }}"></script>
<script src="{{ asset('js/dialog.js') }}"></script>
<script src="{{ asset('js/moment.js') }}"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
    var package_id = $('#package-list').val();
    var roles = '{{ auth()->user()->roles[0] }}';
    var index = 'vendor';
    var _histId = '';
    google.charts.load("current", {
        packages: ["corechart"]
    });

    // google.charts.setOnLoadCallback(drawChart);

    function drawChart(score) {
        let emptyScore = score[0];
        let badScore = score[1];
        let mediumScore = score[2];
        let goodScore = score[3];
        var data = google.visualization.arrayToDataTable([
            ['Penilaian', 'Nilai'],

            ['Baik (' + goodScore + ')', goodScore],
            ['Cukup (' + mediumScore + ')', mediumScore],
            ['Kurang (' + badScore + ')', badScore],
            ['Kosong (' + emptyScore + ')', emptyScore],

        ]);

        var options = {
            title: 'Total Faktor Di Nilai ' + (badScore + mediumScore + goodScore),
            pieHole: 0.2,
            chart: {
                width: '100%'
            },
            'legend': {
                'position': 'bottom'
            },
            colors: ['green', 'orange', 'red', 'grey'],
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }

    //GANTI MENU
    var header = document.getElementById("menu-tab");
    var btns = header.getElementsByClassName("card-tab");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function () {

            var current = $('.card-tab.active')
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active ";

        });
    }

    function elFileDropdown(hasFile = false, hasAccess = false, hasScore = false, link, name, id) {
        let type1 = '<div class="dropdown-menu">' +
            '<a class="dropdown-item" type="button" data-link="' + link + '" id="download">Download</a>' +
            '<a class="dropdown-item" type="button" data-subname="' + name + '" data-scoreid="' + id +
            '" id="upload">Ganti File</a>' +
            '</div>';

        let type2 = '<div class="dropdown-menu">' +
            '<a class="dropdown-item" type="button" data-link="' + link + '" id="download">Download</a>' +
            '</div>';

        let type3 = '<div class="dropdown-menu">' +
            '<a class="dropdown-item" type="button" data-subname="' + name + '" data-scoreid="' + id +
            '" id="upload">Upload File</a>' +
            '</div>';

        if (hasAccess) {
            if (!hasFile && hasScore) {
                return '<a class="bt-primary-xsm"  style="cursor: pointer"  data-bs-toggle="dropdown" aria-expanded="false">Unggah</a>' +
                    type3;
            } else if (!hasFile && !hasScore) {
                return '<a class="bt-primary-xsm"  style="cursor: pointer"  data-bs-toggle="dropdown" aria-expanded="false">-</a>';
            } else {
                return '<a class="bt-primary-xsm"  style="cursor: pointer"  data-bs-toggle="dropdown" aria-expanded="false">Unduh / Ganti</a>' +
                    type1;
            }
        } else {
            if (!hasFile) {
                return '<a class="bt-primary-xsm"  style="cursor: pointer"  data-bs-toggle="dropdown" aria-expanded="false">-</a>';
            } else {
                return '<a class="bt-primary-xsm"  style="cursor: pointer"  data-bs-toggle="dropdown" aria-expanded="false">Unduh</a>' +
                    type2;
            }
        }
    }

    function elNoteDropdown(hasNote = false, hasAccess = false, hasScore = false, id, note = '') {
        let type1 = '<div class="dropdown-menu">' +
            '<a class="dropdown-item see-note" type="button" data-note="' + note + '" data-scoreid="' + id +
            '">Lihat</a>' +
            '<a class="dropdown-item edit-note" type="button" data-note="' + note + '" data-scoreid="' + id +
            '" id="edit-note">Ganti Catatan</a>' +
            '</div>';

        let type2 = '<div class="dropdown-menu">' +
            '<a class="dropdown-item see-note" type="button" data-note="' + note + '" data-scoreid="' + id +
            '">Lihat</a>' +
            '</div>';

        let type3 = '<div class="dropdown-menu">' +
            '<a class="dropdown-item add-note" type="button" data-scoreid="' + id +
            '">Tambah Catatan</a>' +
            '</div>';
        if (hasAccess) {
            if (!hasNote && hasScore) {
                return '<a class="bt-primary-xsm"  style="cursor: pointer"  data-bs-toggle="dropdown" aria-expanded="false">Detail</a>' +
                    type3;
            } else if (!hasNote && !hasScore) {
                return '<a class="bt-primary-xsm"  style="cursor: pointer"  data-bs-toggle="dropdown" aria-expanded="false">-</a>';
            } else {
                return '<a class="bt-primary-xsm"  style="cursor: pointer"  data-bs-toggle="dropdown" aria-expanded="false">Detail</a>' +
                    type1;
            }
        } else {
            if (!hasNote) {
                return '<a class="bt-primary-xsm"  style="cursor: pointer"  data-bs-toggle="dropdown" aria-expanded="false">-</a>';
            } else {
                return '<a class="bt-primary-xsm"  style="cursor: pointer"  data-bs-toggle="dropdown" aria-expanded="false">Detail</a>' +
                    type2;
            }
        }
    }

    function elButtonHistory(hasHistory, id) {
        if (hasHistory) {
            return '<a data-id="' + id +
                '" class="bt-history"  style="cursor: pointer; font-style: italic; display: block; font-size: 10">Riwayat Perubahan</a>';
        }
        return '';
    }

    function elMainIndicator(key, value) {
        return '<tr class="bg-prim-light primary-light-text" id="indicator-' + key + '">' +
            '<th class="primary-light-text">' + (key + 1) + '</th>' +
            '<th class="primary-light-text">' + value['name'] + '</th>' +
            '<th style="min-width: 100px" ></th>' +
            '<th class="primary-light-text">Update Terahkir</th>' +
            '<th class="primary-light-text">File Terupload</th>' +
            '<th class="primary-light-text">Catatan</th>' +
            '</tr>'
    }

    function elSubIndicator(mainKey, key, value) {
        const {
            single_score,
            score_history,
            id
        } = value;
        const availableScore = ['', 'Kurang', 'Cukup', 'Baik'];
        const availableBtnClass = ['bt-primary-xsm', 'b-buruk-light-xsm', 'b-cukup-light-xsm', 'b-bagus-light-xsm'];
        let score = single_score !== null ? availableScore[single_score['score']] : 'Beri Nilai';
        let hasScore = single_score !== null;
        let file_text = single_score !== null ? single_score['file'] !== null ? 'Download' : 'Upload File' : '-';
        let hasFile = single_score !== null ? single_score['file'] !== null : false;
        let hasNote = single_score !== null ? single_score['note'] !== null : false;
        let note = single_score !== null ? single_score['note'] : '';
        let file_Id = single_score !== null ? single_score['file'] !== null ? 'download' : 'upload' : '-';
        let file_link = single_score !== null ? single_score['file'] : 'Upload File';
        let update_at = single_score !== null ? new Date(single_score['updated_at']) : null;
        let last_update = single_score !== null ? getCurrentDateString(update_at) : '-';
        let btn_class = single_score !== null ? availableBtnClass[single_score['score']] : 'bt-primary-xsm';
        let button_upload = single_score !== null ? single_score['file'] !== null ?
            '<a class="bt-primary-xsm ms-2" data-subname="' + value['name'] + '" data-link="' + file_link +
            '" data-scoreid="' + single_score['id'] + '" id="upload">Upload File</a>' : '' : '';
        let scoreid = single_score !== null ? single_score['id'] : '';
        let dropdown_active = '';
        let el_dropdown = '';
        let hasAccess = false;
        let hasHistory = score_history.length > 0;
        if (roles === index && !getParameter('st')) {
            dropdown_active = 'dropdown';
            hasAccess = true;
            el_dropdown =
                '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> <button class="dropdown-item nilai" type="button" data-value="3" data-subin="' +
                id + '">Baik</button>\n' +
                '<button class="dropdown-item nilai" type="button" data-value="2" data-subin="' + id +
                '">Cukup</button>\n' +
                '<button class="dropdown-item nilai" type="button" data-value="1" data-subin="' + id +
                '">Kurang</button></div>';
        }
        return '<tr class="primary-light-text" id="tr' + scoreid + '">' +
            '<td class="primary-light-text">' + mainKey + '.' + (key + 1) + '</td>\n' +
            '<td><div class="primary-light-text">' + value['name'] + elButtonHistory(hasHistory, id) + '' +
            '</div></td>\n' +
            '<td><div class="dropdown"><a class="' + btn_class +
            ' dropup "  style="cursor: pointer"  data-bs-toggle="dropdown" aria-expanded="false">' + score + '</a>\n' +
            el_dropdown +
            '</div></td>\n' +
            '<td class="primary-light-text">' + last_update + '</td>\n' +
            // '<td><a class="bt-primary-xsm" data-subname="' + value['name'] + '" data-link="' + file_link + '" data-scoreid="' + scoreid + '" id="' + file_Id + '">' + file_text + '</a></td>\n' +
            '<td>' + elFileDropdown(hasFile, hasAccess, hasScore, file_link, value['name'], scoreid) + '</td>\n' +
            '<td>' + elNoteDropdown(hasNote, hasAccess, hasScore, scoreid, note) + '</td>\n' +
            '</tr>';
    }

    $(document).on('click', '#download', function () {
        $(this).attr('target', '_blank')
        $(this).attr('href', $(this).data('link'));
    });
    $(document).on('click', '#upload', function () {
        $('#modalfile #fileNameSub').html($(this).data('subname'))
        $('#modalfile #id').val($(this).data('scoreid'))
        $('#modalfile #file').val('')
        $('#modalfile').modal('show')
    })

    $(document).on('click', '.add-note', function () {
        let id = this.dataset.scoreid;
        $('#modalCatatan #id-note').val(id)
        $('#modalCatatan').modal('show');
    });

    $(document).on('click', '.edit-note', function () {
        let id = this.dataset.scoreid;
        let note = this.dataset.note;
        $('#modalCatatan #id-note').val(id);
        $('#modalCatatan #note').val(note);
        $('#modalCatatan').modal('show');
    });

    $(document).on('click', '.see-note', function () {
        let id = this.dataset.scoreid;
        let note = this.dataset.note;
        $('#modalCatatanLihat #note-see').html(note);
        $('#modalCatatanLihat').modal('show');
    });

    function Save() {
        saveData('Upload File', 'form', null, afterSaveFile)
        return false;
    }

    function SaveNote() {
        saveData('Catatan', 'form-note', '/penilaian/add-note', afterSaveNote)
        return false;
    }

    function afterSaveFile(data) {
        $('#modalfile').modal('hide')
        getScore(index);
        // getHistoryScore(index);
    }

    function afterSaveNote() {
        $('#modalCatatan').modal('hide')
        getScore(index);
    }

    function elTable() {
        return '<table class="table" style="width:100%">' +
            '<tbody id="table"></tbody>' +
            '</table>';
    }

    function getCurrentDateString(date) {
        return date.toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        })
    }

    function getDateOnlyString(date) {
        return date.toLocaleDateString('id-ID', {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        })
    }

    async function getScore(type) {
        let el = $('#result-container');
        let vType = 'default';
        switch (type) {
            case 'vendor':
                vType = 'vendor';
                break;
            case 'accessor':
                vType = 'office';
                break;
            case 'accessorppk':
                vType = 'ppk';
                break;
            default:
                break;
        }
        try {
            el.empty();
            let response = await $.get('/penilaian/results?package=' + package_id + '&type=' + vType);
            if (response['code'] === 200) {
                let data = response['data']['indicator'];
                el.append(elTable());
                let table = $('#table');
                $.each(data, function (k, v) {
                    table.append(elMainIndicator(k, v));
                    let elMain = $('#indicator-' + k);
                    let sub = '';
                    $.each(v['sub_indicator'], function (kSub, vSub) {
                        sub += elSubIndicator((k + 1), kSub, vSub);
                    });
                    elMain.after(sub);
                });
                $('.nilai').on('click', function () {
                    let value = this.dataset.value;
                    let sub_indicator = this.dataset.subin;
                    setScore(sub_indicator, value);
                });

                $('.bt-history').on('click', function () {
                    _histId = this.dataset.id;
                    $('#modalHistory').modal('show');

                });

            }
            await getRadarChart();
        } catch (e) {
            alert('Terjadi Kesalahan Server...')
        }
    }

    function onModalHistoryShow() {
        $('#modalHistory').on('shown.bs.modal', function () {
            getHistoryScore(index)
            // let response = await $.get('/penilaian/get-last-history?package=' + package_id + '&type=' + vType + '&sub=' + _histId);
            // console.log()
        });
    }

    function elHistory(data) {
        const {
            created_at,
            score_after,
            score_before,
            note_before,
            score_total_after,
            score_total_before,
            file_after,
            note_after,
            file_before
        } = data;
        let sa = '';
        let sb = '';
        switch (score_after) {
            case 1:
                sa = 'Buruk';
                break;
            case 2:
                sa = 'Cukup';
                break;
            case 3:
                sa = 'Baik';
                break;
            default:
                break;
        }
        switch (score_before) {
            case 1:
                sb = 'Buruk';
                break;
            case 2:
                sb = 'Cukup';
                break;
            case 3:
                sb = 'Baik';
                break;
            default:
                break;
        }

        let elFileBefore = file_before === null ? '-' : '<a target="_blank" href="' + window.location.origin +
            file_before + '">Download</a>';
        let elFIleAfter = file_after === null ? '-' : '<a target="_blank" href="' + window.location.origin +
            file_after + '">Download</a>';
        let elNoteBefore = note_before !== null ? note_before : '-';
        let elNoteAfter = note_after !== null ? note_after : '-';
        let date = getDateOnlyString(new Date(created_at));
        return '<div class="d-flex mb-2">' +
            '<p class="font-date-history" style="margin-right: 10px">' + date + '</p>' +
            '<div class="flex-grow-1">' +
            // '<p class="font-date-history">' + data['sub_indicator']['name'] + '</p>' +
            '<div class="row">' +
            '<div class="col-6">' +
            '<p class="font-date-history mb-0" style="font-weight: bold">Penilaian Awal</p>' +
            '<p class="font-date-history mb-0">  Nilai : <span>' + sb + '</span></p>' +

            '<p class="font-date-history mb-0">  Komulatif : <span>' + score_total_before.toFixed(2) + '</span></p>' +
            '<p class="font-date-history mb-0">  File : ' + elFileBefore + '</p>' +
            '<p class="font-date-history mb-0">  Catatan : ' + elNoteBefore + '</p>' +
            '</div>' +
            '<div class="col-6">' +
            '<p class="font-date-history mb-0" style="font-weight: bold">Penilaian Akhir</p>' +
            '<p class="font-date-history mb-0">  Nilai : <span>' + sa + '</span></p>' +
            '<p class="font-date-history mb-0">  Komulatif : <span>' + score_total_after.toFixed(2) + '</span></p>' +
            '<p class="font-date-history mb-0">  File : ' + elFIleAfter + '</p>' +
            '<p class="font-date-history mb-0">  Catatan : ' + elNoteAfter + '</p>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
    }

    async function getHistoryScore(type) {
        let el = $('#history-container');
        try {
            let vType = 'default';
            switch (type) {
                case 'vendor':
                    vType = 'vendor';
                    break;
                case 'accessor':
                    vType = 'office';
                    break;
                case 'accessorppk':
                    vType = 'ppk';
                    break;
                default:
                    break;
            }
            el.empty();
            let response = await $.get('/penilaian/get-history?package=' + package_id + '&type=' + vType + '&sub=' +
                _histId);
            console.log(response)
            $.each(response['data'], function (k, v) {
                el.append(elHistory(v));
            });
        } catch (e) {
            console.log(e)
        }
    }

    async function getLastUpdate(type) {
        let vType = 'default';
        switch (type) {
            case 'vendor':
                vType = 'vendor';
                break;
            case 'accessor':
                vType = 'office';
                break;
            case 'accessorppk':
                vType = 'ppk';
                break;
            default:
                break;
        }
        try {
            let response = await $.get('/penilaian/last-update?package=' + package_id + '&type=' + vType);
            if (response['data'] !== null) {
                let updated_at = getCurrentDateString(new Date(response['data']['updated_at']));
                let name = response['data']['sub_indicator']['name'];
                $('#faktorupdate').val(name);
                $('#terahkirupdate').val(updated_at);
            } else {
                $('#faktorupdate').val('Belum Ada Update');
                $('#terahkirupdate').val('Belum Ada Update');
            }
            console.log('last_update')
        } catch (e) {
            alert("Maaf, Sedang Terjadi Kesalahan Pada Server...")
        }
    }

    async function setScore(sub, value) {
        try {
            let response = await $.post('/penilaian/set-score', {
                _token: '{{ csrf_token() }}',
                sub_indicator: sub,
                value: value,
                index: index,
                package: package_id
            });
            if (getParameter('q')) {
                window.location.replace(removeParam('q'))
            }
            await getScore(index);
            // await getHistoryScore(index);
        } catch (e) {
            alert('Terjadi Kesalahan Server...')
        }
    }

    var radarChart;

    function chart(dataChart) {

        let labels = [];
        let values = [];
        let colors = [];
        dataChart['indicator'].forEach(function (v, k) {
            labels.push(v['index']);
            values.push(v['radar']);
            colors.push('white');
        });
        const data = {
            labels: labels,
            datasets: [{
                label: 'Data Indicator',
                data: values,
                fill: true,
                backgroundColor: 'rgba(186, 144, 58, 0.2)',
                borderColor: 'rgb(223, 160, 30)',
                pointBackgroundColor: 'rgb(223, 160, 30)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(223, 160, 30)',

            }],

        };

        const config = {
            type: 'radar',
            data: data,
            options: {
                elements: {
                    line: {
                        borderWidth: 3
                    }
                },
                // responsive: false,
                maintainAspectRatio: true,
                scales: {
                    r: {
                        angleLines: {
                            color: 'white'
                        },
                        grid: {
                            color: 'white'
                        },
                        pointLabels: {
                            color: 'white'
                        }
                    }
                },
                scale: {
                    reverse: false,
                    max: 10,
                    min: 0,
                    stepSize: 2,
                },
            },
            plugins: [{
                beforeInit: function (chart) {
                    chart.data.labels.forEach(function (e, i, a) {
                        var space = e.split(' ');
                        // if (space[2]) {
                        //     a[i] = e.split(' ');
                        // }
                    });
                }
            }]
        };
        if (radarChart) {
            radarChart.destroy();

        }
        radarChart = new Chart(
            document.getElementById('myChart'),
            config,
        );

    }

    async function getRadarChart() {
        let vType = 'default';
        switch (index) {
            case 'vendor':
                vType = 'vendor';
                break;
            case 'accessor':
                vType = 'office';
                break;
            case 'accessorppk':
                vType = 'ppk';
                break;
            default:
                break;
        }
        try {
            let response = await $.get('/penilaian/radar?package=' + package_id + '&type=' + vType);
            setComulative(response['comulative']);
            penilaian(response['data']['score_count']);
            chart(response['data']);
            drawChart(response['data']['score_count']);
            // await getScore(index);
        } catch (e) {
            console.log(e)
        }
    }

    function penilaian(data) {
        console.log('Coba ....', data);
        $('#faktorbelum').html(data[0]);
        let done = parseInt(data[1] + data[2] + data[3]);
        let total = parseInt(data[0] + data[1] + data[2] + data[3]);
        let percent = (done * 100) / total;
        $('#faktorternilai').html(percent.toFixed(0) + '% Dari Faktor Penilaian');
        $('#progress-bar-faktor').attr('style', 'width:' + percent + '%');
        // $('#faktordinilai').text(parseInt(data[1] + data[2] + data[3]))
    }

    function setComulative(data) {
        $('#comulative_value').html(data)

        if (data < 50) {
            $('#comulative_value').addClass('t-kurang');
            $('#comulative_status').addClass('b-kurang').html('Sangat Kurang');
        } else if (data < 64) {
            $('#comulative_value').addClass('t-cukup');
            $('#comulative_status').addClass('b-kurang').html('Kurang');
        } else if (data < 79) {
            $('#comulative_value').addClass('t-cukup');
            $('#comulative_status').addClass('b-cukup').html('Cukup');
        } else if (data < 90) {
            $('#comulative_value').addClass('t-bagus');
            $('#comulative_status').addClass('b-bagus').html('Baik');
        } else if (data < 100) {
            $('#comulative_value').addClass('t-bagus');
            $('#comulative_status').addClass('b-bagus').html('Baik');
        }
    }

    $(document).ajaxStop(function () {
        if (getParameter('q')) {
            $(window).scrollTop($('table #tr' + getParameter('q')).offset().top);
            $('table #tr' + getParameter('q')).focus().addClass('trFocus');
        }
    })

    async function getDetailPackage(pid) {
        try{
            let response = await $.get('/package/data-detail?package='+pid);
            if(response['code'] === 200) {
                $('#paketkonstruksi').val(response['data']['name']);
                $('#penggunajasa').val(response['data']['ppk']['name']);
                $('#nomorkontrak').val(response['data']['no_reference']);
            }else{
                $('#paketkonstruksi').val('');
                $('#penggunajasa').val('');
                $('#nomorkontrak').val('');
            }
            console.log(response)
        }catch(e) {
            console.log(e)
        }
    }
    $(document).ready(function () {
        $('#package-list').on('change', function () {
            package_id = $(this).val();
            getScore(index)
            getDetailPackage($(this).val());
        });
        $('.card-user').on('click', function () {
            index = this.dataset.roles;
            let title = '';
            switch (index) {
                case 'vendor':
                    title = 'Peneyedia jasa';
                    break;
                case 'accessor':
                    title = 'Balai';
                    break;
                case 'accessorppk':
                    title = 'PPK';
                    break;
                default:
                    break;
            }
            getScore(index);

            // getHistoryScore(index);
            getLastUpdate(index);
            $('#map-title').html('Peta Kinerja ' + title);
            $('#jenisasesmen').val('Penilaian ' + title);
        });
        getDetailPackage(package_id);
        getRole();
    })

    function getRole() {
        console.log(roles)
        switch (roles) {
            case 'vendor':
                title = 'Peneyedia jasa';
                index = 'vendor';
                break;
            case 'accessor':
                title = 'Balai';
                index = 'accessor';
                break;
            case 'accessorppk':
                title = 'PPK';
                index = 'accessorppk';
                break;
            default:
                break;
        }
        $('#' + index).addClass('active');
        getScore(index);
        // getHistoryScore(index);
        getLastUpdate(index);
        onModalHistoryShow();
        $('#map-title').html('Peta Kinerja ' + title);
        $('#jenisasesmen').val('Penilaian ' + title);
    }


    $("#info").click(function () {
        $("#detail-nilai").removeClass("active");
        $("#info").addClass("active")
        $("#content-detail-nilai").addClass("d-none")
        $("#content-info").removeClass("d-none")
    });

    $("#detail-nilai").click(function () {
        $("#detail-nilai").addClass("active");
        $("#info").removeClass("active")
        $("#content-detail-nilai").removeClass("d-none")
        $("#content-info").addClass("d-none")
    });
</script>
</html>
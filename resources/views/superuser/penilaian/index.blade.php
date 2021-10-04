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
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                            <img src="{{ $vendor->image }}" height="150" width="150" class="header-image mr-5" />
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


        <p class="title-table mb-0" style="font-size: .8rem; color: gray">Hasil Evaluasi Kinerja Paket </p>
        <p class="fw-bold t-primary" style="font-size: 2rem">Nama Project</p>

        <div class="mb-5 mt-3">

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
                        <label for="faktorupdate " class="secondary-light-text">Faktor Diupdate</label>
                        <textarea class="form-control" id="faktorupdate" rows="3" readonly
                            id="faktorupdate"></textarea>
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

                        <a class="card-tab d-block c-text card-user active" id="accessor" data-roles="accessor">
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
                                <p id="faktorternilai" style="color: gray; font-size: .8rem;  bottom: 0;">25%
                                    Dari
                                    Faktor Penilaian</p>
                                <p id="faktorbelum" class="fw-bold text-primary" style="font-size: 2rem">0</p>
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
                            <h1 class=" text-center mt-5" style="font-size: 4rem" id="comulative_value"></h1>
                            <p id="comulative_status" class="b-cukup r-fullround text-center  ms-auto me-auto p-1 mt-3"
                                style="width: 200px"></p>
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
<script>
    var package_id = $('#package-list').val();
    var roles = '{{ auth()->user()->roles[0] }}';
    var index = 'vendor';
    var _histId = '';

    var radarChart;

    function chart(dataChart) {

        let labels = [];
        let values = [];
        if (dataChart.length > 0) {
            dataChart['indicator'].forEach(function(v, k) {
                labels.push(v['index']);
                values.push(v['radar']);
            });
        }
        const data = {
            labels: labels,
            datasets: [{
                label: 'Data Indicator',
                data: values,
                fill: true,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)',

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
                scale: {
                    reverse: false,
                    max: 10,
                    min: 0,
                    stepSize: 2
                },
            },
            plugins: [{
                beforeInit: function(chart) {
                    chart.data.labels.forEach(function(e, i, a) {
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
            console.log(response)
        } catch (e) {
            alert('Terjadi Kesalahan Server...')
        }
    }

    $(document).ready(function() {
        package_id =
            getScore()
    })
</script>

</html>

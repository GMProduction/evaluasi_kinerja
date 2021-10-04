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
    {{--    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}" type="text/css">--}}
    {{--    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" type="text/css">--}}
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
{{--<div class="banner-information d-flex align-items-center p-5">--}}
{{--    <div class="flex-grow-1 d-flex">--}}
{{--        <img src="{{ $vendor->image }}" height="100" width="100" class="banner-image mr-5"/>--}}
{{--        <div>--}}
{{--            <p class="banner-name">{{ $vendor->vendor->name }}</p>--}}
{{--            <p class="banner-qualified">{{ $vendor->vendor->kualifikasi }}</p>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <div class="text-center">--}}
{{--        <div class="active-package-panel" data-bs-toggle="dropdown" id="dropdownMenuClickableInside"--}}
{{--             data-bs-auto-close="outside" aria-expanded="false">--}}
{{--            <p class="text-center" style="font-size: 16px; font-weight: bold; color: #1D3752; margin-bottom: 0">Paket--}}
{{--                Aktif</p>--}}
{{--            <p class="text-center"--}}
{{--               style="font-size: 16px; font-weight: bold; color: #1D3752; margin-bottom: 0">{{ count($data) }}</p>--}}
{{--        </div>--}}
{{--        <div class="dropdown-menu package-choice" aria-labelledby="dropdownMenuClickableInside">--}}
{{--            <p class="text-center">Paket Aktif Tersedia</p>--}}
{{--            <div id="">--}}
{{--                @foreach($data as $v)--}}
{{--                    <a href="#">{{ $v->name }}</a>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="content" style="height: 80vh">--}}
{{--    <div class="row">--}}
{{--        <div class="col-xl-3">--}}
{{--            <div class="p-2" style="background-color: #1D3752; height: 80vh">--}}
{{--                <p class="text-white">Alamat : </p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xl-9"></div>--}}
{{--    </div>--}}
{{--</div>--}}
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
    <div class="header-profile row">
        <div class="col-xl-9 col-lg-9 d-flex">
            <img src="{{ $vendor->image }}" height="150" width="150" class="header-image mr-5"/>
            <div class="d-flex flex-column">
                <div class="flex-grow-1">
                    <p class="header-name secondary-color-text">{{ $vendor->vendor->name }}</p>
                    <p class="header-qualified secondary-light-text">{{ $vendor->vendor->kualifikasi }}</p>
                </div>
                <div>
                    <select class="color-accent" id="package-list">
                        <option value="">--Pilih Paket--</option>
                        @foreach($data as $v)
                            <option value="{{$v->id}}">{{ $v->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 header-profile-right">
            <div class="d-flex align-items-start">
                <i class="bx bx-home secondary-light-text" style="margin-right: 5px; margin-top: 5px"></i>
                <span class="secondary-light-text">{{ $vendor->vendor->address }}</span>
            </div>
            <div class="d-flex align-items-start">
                <i class="bx bxs-phone secondary-light-text" style="margin-right: 5px; margin-top: 5px"></i>
                <p class="secondary-light-text">{{ $vendor->vendor->phone }}</p>
            </div>
            <div class="d-flex align-items-start">
                <i class="bx bx-user-pin secondary-light-text" style="margin-right: 5px; margin-top: 5px"></i>
                <p class="secondary-light-text">{{ $vendor->vendor->npwp }}</p>
            </div>
            <div class="d-flex align-items-start">
                <i class="bx bx-receipt secondary-light-text" style="margin-right: 5px; margin-top: 5px"></i>
                <p class="secondary-light-text">{{ $vendor->vendor->iujk }}</p>
            </div>
        </div>
    </div>

    <div class="mb-5 mt-3">

    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-3">
            <div class="card-panel">
                <span class="secondary-color-text" style="font-weight: bold">Data Paket Konstruksi</span>
                <hr class="primary-light-text">
                <div class="mb-3">
                    <label for="paketkonstruksi" class="form-label secondary-light-text">Paket Konstruksi</label>
                    <input type="text" class="form-control" value="" readonly
                           id="paketkonstruksi">
                </div>
                <div class="mb-3">
                    <label for="nomorkontrak" class="form-label secondary-light-text">Nomor Kontrak</label>
                    <input type="text" class="form-control" value="" readonly
                           id="nomorkontrak">
                </div>
                <div class="mb-3">
                    <label for="penggunajasa" class="form-label secondary-light-text">Pengguna Jasa</label>
                    <input type="text" class="form-control" value="" readonly
                           id="penggunajasa">
                </div>

                <div class="mb-3">
                    <label for="jenisasesmen" class="form-label secondary-light-text">Jenis Asesmen</label>
                    <input type="text" class="form-control" value="Penilaian Penyedia Jasa" readonly
                           id="jenisasesmen">
                </div>
                <div class="mb-3">
                    <label for="terahkirupdate" class="form-label secondary-light-text">Terahkir Update</label>
                    <input type="text" class="form-control" value="Belum Ada Update" readonly
                           id="terahkirupdate">
                </div>
                <div class="form-group mb-3">
                    <label for="faktorupdate " class="secondary-light-text">Faktor Diupdate</label>
                    <textarea class="form-control" id="faktorupdate" rows="3" readonly
                              id="faktorupdate"></textarea>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9">
            <div class="card-panel">
                <div>
                    <p class="secondary-color-text" id="map-title" style="font-weight: bold">Peta Kinerja Penyedia
                        Jasa</p>
                    <hr class="primary-light-text">
                    <canvas class="myChart" id="myChart" width="200" height="50"></canvas>
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
            dataChart['indicator'].forEach(function (v, k) {
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

    $(document).ready(function () {
        package_id =
        getScore()
    })
</script>
</html>

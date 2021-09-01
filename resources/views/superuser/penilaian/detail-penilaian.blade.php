@extends('superuser.base')

@section('moreCss')
    {{-- <link rel="stylesheet" href="{{ asset('css/tab.css') }}" type="text/css"> --}}
@endsection

@section('title')
    Penilaian
@endsection

@section('content')
    <section class="___class_+?0___" style="margin-top: 100px">
        <div class="mt-4" style="min-height: 23vh">
            <!-- Tab panes -->
            {{-- @yield('contentUser') --}}

            <div class="header-table">
                <p class="title-table">Hasil Evaluasi Kinerja Paket: <span
                        class="fw-bold t-primary">{{ $data->name }}</span></p>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="table-container">
                        <p class="fw-bold t-primary">Data Paket Konstruksi</p>

                        <hr>
                        <div class="mb-3">
                            <label for="namapenyedia" class="form-label">Nama Penyedia Jasa</label>
                            <input type="text" class="form-control" value="{{$data->vendor->vendor->name}}" readonly
                                   id="namapenyedia">
                        </div>

                        <div class="mb-3">
                            <label for="kualifikasi" class="form-label">Kualifikasi Perusahaan</label>
                            <input type="text" class="form-control" readonly id="kualifikasi">
                        </div>

                        <div class="mb-3">
                            <label for="paketkonstruksi" class="form-label">Paket Konstruksi</label>
                            <input type="text" class="form-control" value="{{ $data->name }}" readonly
                                   id="paketkonstruksi">
                        </div>

                        <div class="mb-3">
                            <label for="nomorkontrak" class="form-label">Nomor Kontrak</label>
                            <input type="text" class="form-control" value="{{$data->no_reference}}" readonly
                                   id="nomorkontrak">
                        </div>

                        <div class="mb-3">
                            <label for="penggunajasa" class="form-label">Pengguna Jasa</label>
                            <input type="text" class="form-control" value="{{$data->ppk->name}}" readonly
                                   id="penggunajasa">
                        </div>

                        <div class="mb-3">
                            <label for="jenisasesmen" class="form-label">Jenis Asesmen</label>
                            <input type="text" class="form-control" value="" readonly id="jenisasesmen">
                        </div>

                        <div class="mb-3">
                            <label for="faktordinilai" class="form-label">Faktor Sudah Di Nilai</label>
                            <input type="text" class="form-control" value="0" readonly id="faktordinilai">
                        </div>

                        <div class="mb-3">
                            <label for="faktorbelum" class="form-label">Faktor Belum Di Nilai</label>
                            <input type="text" class="form-control" value="0" readonly id="faktorbelum">
                        </div>

                        <div class="mb-3">
                            <label for="terahkirupdate" class="form-label">Terahkir Update</label>
                            <input type="text" class="form-control" value="21 Maret 2021" readonly id="terahkirupdate">
                        </div>

                        <div class="mb-3">
                            <label for="faktorupdate" class="form-label">Faktor Diupdate</label>
                            <input type="text" class="form-control" value="3.5" readonly id="faktorupdate">
                        </div>
                    </div>
                </div>

                <div class="col-8">
                    <div role="tablist" class="mb-3">
                        <div class="items-tab" id="menu-tab">
                            <a class="card-tab active d-block c-text card-user" id="usuperuser" data-roles="superuser"
                               data-text-roles="Superuser">
                                <div class="d-flex justify-content-between">
                                    <i class='bx bx-message-square-edit'></i>
                                    <p class="number-card t-bagus">89</p>
                                </div>
                                <div class="mt-2">
                                    Penilaian Sendiri
                                </div>
                            </a>

                            <a class="card-tab d-block c-text card-user" id="uadmin" data-roles="admin"
                               data-text-roles="Admin">
                                <div class="d-flex justify-content-between">
                                    <i class='bx bx-message-square-edit'></i>
                                    <p class="number-card t-cukup">67</p>
                                </div>
                                <div class="mt-2">
                                    Penilaian PPK
                                </div>
                            </a>

                            <a class="card-tab d-block c-text card-user" id="uaccessor" data-roles="accessor"
                               data-text-roles="Asesor Balai">
                                <div class="d-flex justify-content-between">
                                    <i class='bx bx-message-square-edit'></i>
                                    <p class="number-card t-kurang">38</p>
                                </div>
                                <div class="mt-2">
                                    Penilaian Balai
                                </div>
                            </a>


                        </div>

                    </div>

                    <div class="row">
                        <div class="col-7">
                            <div class="table-container">
                                <p class="fw-bold t-primary">Peta Kinerja Penyedia Jasa</p>
                                <hr>
                                <canvas class="myChart" id="myChart" width="200" height="50"></canvas>
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="table-container" id="parentofchart">
                                <p class="fw-bold t-primary">Risalah Hasil Penilaian Faktor</p>
                                <hr>
                                <div id="donutchart" style="width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="table-container">
                        <p class="fw-bold t-primary">Detail Penilaian</p>
                        <div id="result-container">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Penilaian', 'Nilai'],

                ['Bagus (50)', 50],
                ['Cukup (10)', 10],
                ['Kurang (10)', 10],


            ]);

            var options = {
                title: 'Total Faktor Di Nilai 70',
                pieHole: 0.2,
                chartArea: {
                    width: '100%'
                },
                'legend': {
                    'position': 'bottom'
                },
                colors: ['green', 'orange', 'red',],
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
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

        function elMainIndicator(key, value) {
            return '<tr class="bg-prim-light" id="indicator-' + key + '">' +
                '<th>' + (key + 1) + '</th>' +
                '<th colspan="2">' + value['name'] + '</th>' +
                '<th>Update Terahkir</th>' +
                '<th>File Terupload</th>' +
                '</tr>'
        }

        function elSubIndicator(mainKey, key, value) {
            const {single_score} = value;
            const availableScore = ['', 'Kurang', 'Cukup', 'Baik'];
            const availableBtnClass = ['bt-primary-xsm', 'b-buruk-light-xsm', 'b-cukup-light-xsm', 'b-bagus-light-xsm'];
            let score = single_score !== null ? availableScore[single_score['score']] : 'Beri Nilai';
            let file_text = single_score !== null ? single_score['file'] !== null ? 'Download' : 'Upload File' : '-';
            let file_link = single_score !== null ? single_score['file'] : 'Upload File';
            let update_at = single_score !== null ? new Date(single_score['updated_at']) : null;
            let last_update = single_score !== null ? getCurrentDateString(update_at) : '-';
            let btn_class = single_score !== null ? availableBtnClass[single_score['score']] : 'bt-primary-xsm';
            return '<tr>' +
                '<td>' + mainKey + '.' + (key + 1) + '</td>\n' +
                '<td>' + value['name'] + '</td>\n' +
                '<td><a class="' + btn_class + '">' + score + '</a></td>\n' +
                '<td>' + last_update + '</td>\n' +
                '<td><a class="bt-primary-xsm">' + file_text + '</a></td>\n' +
                '</tr>';
        }

        function elTable() {
            return '<table class="table" style="width:100%">' +
                '<tbody id="table"></tbody>' +
                '</table>';
        }

        function getCurrentDateString(date) {
            return date.toLocaleDateString('id-ID', {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'})
        }

        async function getScore() {
            let el = $('#result-container');
            try {
                el.empty();
                let response = await $.get('/penilaian/results');
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
                console.log(response)
            } catch (e) {
                console.log(e);
            }
        }


        function chart() {

            const data = {
                labels: [
                    'Sumber Daya Manusia / Personil',
                    'Bahan / Material',
                    'Peralatan Berat',
                    'Peralatan Laboratorium',
                    'Keuangan',
                    'Lingkungan Lokasi',
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [50, 90, 100, 30, 20, 90],
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
                    }
                },
            };


            new Chart(
                document.getElementById('myChart'),
                config,
                options = {
                    scales: {
                        r: {
                            angleLines: {
                                display: false
                            },
                            min: 0,
                            max: 100,
                            // suggestedMin: 0,
                            // suggestedMax: 100
                        }
                    }
                }
            );
        }

        $(document).ready(function () {
            getScore();
            chart();
        })
    </script>
@endsection

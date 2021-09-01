@extends('superuser.base')

@section('moreCss')
    {{-- <link rel="stylesheet" href="{{ asset('css/tab.css') }}" type="text/css"> --}}
@endsection

@section('title')
    Penilaian
@endsection

@section('content')
    <section class="___class_+?0___" style="margin-top: 100px">
        <div class="mt-4 mb-5" style="min-height: 23vh">
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
                            <a class="card-tab active d-block c-text card-user" id="usuperuser" data-roles="vendor"
                               data-text-roles="Superuser">
                                <div class="d-flex justify-content-between">
                                    <i class='bx bx-message-square-edit'></i>
                                    <p class="number-card t-bagus">89</p>
                                </div>
                                <div class="mt-2">
                                    Penyedia Jasa
                                </div>
                            </a>

                            <a class="card-tab d-block c-text card-user" id="uadmin" data-roles="ppk"
                               data-text-roles="Admin">
                                <div class="d-flex justify-content-between">
                                    <i class='bx bx-message-square-edit'></i>
                                    <p class="number-card t-cukup">67</p>
                                </div>
                                <div class="mt-2">
                                    Penilaian PPK
                                </div>
                            </a>

                            <a class="card-tab d-block c-text card-user" id="uaccessor" data-roles="office"
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
                        <div class="col-6">
                            <div class="table-container">
                                <p class="fw-bold t-primary">Peta Kinerja Penyedia Jasa</p>
                                <hr>
                                <canvas class="myChart" id="myChart" width="200" height="50"></canvas>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="table-container" id="parentofchart">
                                <p class="fw-bold t-primary">Risalah Hasil Penilaian Faktor</p>
                                <hr>
                                <div id="donutchart" style="width: 100%;"></div>
                            </div>

                            <div class="table-container" id="parentofchart">
                                <p class="fw-bold t-primary">Nilai Komulatif</p>
                                <hr>
                                <h1 class=" text-center mt-5" style="font-size: 4rem" id="comulative_value"></h1>
                                <p id="comulative_status" class="b-cukup r-fullround text-center  ms-auto me-auto p-1 mt-3"
                                   style="width: 200px"></p>
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
                                <p id="fileNameSub"></p>
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
    </section>
@endsection

@section('script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        var package_id = '{{ $data->id }}';
        var roles = '{{ auth()->user()->roles[0] }}';
        var index = 'vendor';
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
                '<th >' + value['name'] + '</th>' +
                '<th style="min-width: 100px" ></th>' +
                '<th>Update Terahkir</th>' +
                '<th>File Terupload</th>' +
                '</tr>'
        }

        function elSubIndicator(mainKey, key, value) {
            const {single_score, id} = value;
            const availableScore = ['', 'Kurang', 'Cukup', 'Baik'];
            const availableBtnClass = ['bt-primary-xsm', 'b-buruk-light-xsm', 'b-cukup-light-xsm', 'b-bagus-light-xsm'];
            let score = single_score !== null ? availableScore[single_score['score']] : 'Beri Nilai';
            let file_text = single_score !== null ? single_score['file'] !== null ? 'Download' : 'Upload File' : '-';
            let file_Id = single_score !== null ? single_score['file'] !== null ? 'download' : 'upload' : '-';
            let file_link = single_score !== null ? single_score['file'] : 'Upload File';
            let update_at = single_score !== null ? new Date(single_score['updated_at']) : null;
            let last_update = single_score !== null ? getCurrentDateString(update_at) : '-';
            let btn_class = single_score !== null ? availableBtnClass[single_score['score']] : 'bt-primary-xsm';
            let button_upload = single_score !== null ? single_score['file'] !== null ? '<a class="bt-primary-xsm ms-2" data-subname="' + value['name'] + '" data-link="' + file_link + '" data-scoreid="' + single_score['id'] + '" id="upload">Upload File</a>' : '' : '';
            let scoreid = single_score !== null ? single_score['id'] : '';
            let dropdown_active = '';
            let el_dropdown = '';
            if (roles === index) {
                dropdown_active = 'dropdown';
                el_dropdown = '<div class="dropdown-menu"> <button class="dropdown-item nilai" type="button" data-value="3" data-subin="' + id + '">Baik</button>\n' +
                    '<button class="dropdown-item nilai" type="button" data-value="2" data-subin="' + id + '">Cukup</button>\n' +
                    '<button class="dropdown-item nilai" type="button" data-value="1" data-subin="' + id + '">Kurang</button></div>';
            }
            return '<tr>' +
                '<td>' + mainKey + '.' + (key + 1) + '</td>\n' +
                '<td>' + value['name'] + '</td>\n' +
                '<td><a class="' + btn_class + ' " style="cursor: pointer"  data-bs-toggle="' + dropdown_active + '" aria-expanded="false">' + score + '</a>\n' +
                el_dropdown +
                '</td>\n' +
                '<td>' + last_update + '</td>\n' +
                '<td><a class="bt-primary-xsm" data-subname="' + value['name'] + '" data-link="' + file_link + '" data-scoreid="' + scoreid + '" id="' + file_Id + '">' + file_text + '</a></td>\n' +
                '</tr>';
        }

        $(document).on('click', '#download', function () {
            $(this).attr('target', '_blank')
            $(this).attr('href', $(this).data('link'));
        })
        $(document).on('click', '#upload', function () {
            $('#modalfile #fileNameSub').html($(this).data('subname'))
            $('#modalfile #id').val($(this).data('scoreid'))
            $('#modalfile #file').val('')
            $('#modalfile').modal('show')
        })

        function Save() {
            saveData('Upload File', 'form', null, afterSaveFile)
            return false;
        }

        function afterSaveFile(data) {
            $('#modalfile').modal('hide')
            getScore(data)
        }

        function elTable() {
            return '<table class="table" style="width:100%">' +
                '<tbody id="table"></tbody>' +
                '</table>';
        }

        function getCurrentDateString(date) {
            return date.toLocaleDateString('id-ID', {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'})
        }

        async function getScore(type) {
            let el = $('#result-container');
            try {
                el.empty();
                let response = await $.get('/penilaian/results?package=' + package_id + '&type=' + type);
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
                    console.log(value, sub_indicator, package_id);
                    setScore(sub_indicator, value);

                });
                await getRadarChart();
                console.log(response)
            } catch (e) {
                console.log(e);
            }
        }

        async function setScore(sub, value) {
            try {
                let response = await $.post('/penilaian/set-score', {
                    _token: '{{csrf_token()}}',
                    sub_indicator: sub,
                    value: value,
                    index: index,
                    package: package_id
                });
                await getScore(index);

                console.log(response)
            } catch (e) {
                console.log(response)
            }
        }

        var radarChart;

        function chart(dataChart) {

            let labels = [];
            let values = [];
            dataChart['indicator'].forEach(function (v, k) {
                labels.push(v['index']);
                values.push(v['radar']);
                console.log(v)
            });
           const data = {
                labels: labels,
                datasets: [{
                    label: 'My First Dataset',
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
                            console.log()
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
            try {
                let response = await $.get('/penilaian/radar?package=' + package_id);
                setComulative(response['comulative'])
                chart(response['data']);
                // await getScore(index);
                console.log(response)
            } catch (e) {
                console.log(e)
            }
        }

        function setComulative(data) {
            $('#comulative_value').html(data)

            if (data < 50) {
                $('#comulative_value').addClass('t-kurang');
                $('#comulative_status').addClass('b-kurang').html('Kurang');
            } else if (data < 64) {
                $('#comulative_value').addClass('t-cukup');
                $('#comulative_status').addClass('b-kurang').html('Kurang');
            } else if (data < 79) {
                $('#comulative_value').addClass('t-cukup');
                $('#comulative_status').addClass('b-cukup').html('Cukup');
            } else if (data < 90) {
                $('#comulative_value').addClass('t-bagus');
                $('#comulative_status').addClass('b-bagus').html('Baik');
            }else if (data < 100) {
                $('#comulative_value').addClass('t-bagus');
                $('#comulative_status').addClass('b-bagus').html('Baik');
            }
        }

        $(document).ready(function () {
            getScore('vendor');
            // getRadarChart();
            // chart();
            $('.card-user').on('click', function () {
                index = this.dataset.roles;
                getScore(index)
            })
        })

    </script>
@endsection

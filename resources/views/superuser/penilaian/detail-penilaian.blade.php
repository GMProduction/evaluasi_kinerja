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
                <p class="title-table">Hasil Evaluasi Kinerja Paket: <span class="fw-bold t-primary">{Nama
                        Konstruksi}</span> </p>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="table-container">
                        <p class="fw-bold t-primary">Data Paket Konstruksi</p>

                        <hr>
                        <div class="mb-3">
                            <label for="namapenyedia" class="form-label">Nama Penyedia Jasa</label>
                            <input type="text" class="form-control" readonly id="namapenyedia">
                        </div>

                        <div class="mb-3">
                            <label for="kualifikasi" class="form-label">Kualifikasi Perusahaan</label>
                            <input type="text" class="form-control" readonly id="kualifikasi">
                        </div>

                        <div class="mb-3">
                            <label for="paketkonstruksi" class="form-label">Paket Konstruksi</label>
                            <input type="text" class="form-control" readonly id="paketkonstruksi">
                        </div>

                        <div class="mb-3">
                            <label for="nomorkontrak" class="form-label">Nomor Kontrak</label>
                            <input type="text" class="form-control" readonly id="nomorkontrak">
                        </div>

                        <div class="mb-3">
                            <label for="penggunajasa" class="form-label">Pengguna Jasa</label>
                            <input type="text" class="form-control" readonly id="penggunajasa">
                        </div>

                        <div class="mb-3">
                            <label for="jenisasesmen" class="form-label">Jenis Asesmen</label>
                            <input type="text" class="form-control" readonly id="jenisasesmen">
                        </div>

                        <div class="mb-3">
                            <label for="faktordinilai" class="form-label">Faktor Sudah Di Nilai</label>
                            <input type="text" class="form-control" readonly id="faktordinilai">
                        </div>

                        <div class="mb-3">
                            <label for="faktorbelum" class="form-label">Faktor Belum Di Nilai</label>
                            <input type="text" class="form-control" readonly id="faktorbelum">
                        </div>

                        <div class="mb-3">
                            <label for="terahkirupdate" class="form-label">Terahkir Update</label>
                            <input type="text" class="form-control" readonly id="terahkirupdate">
                        </div>

                        <div class="mb-3">
                            <label for="faktorupdate" class="form-label">Faktor Diupdate</label>
                            <input type="text" class="form-control" readonly id="faktorupdate">
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
                        <table id="table" class="table " style="width:100%">
                            <tr class="bg-prim-light">
                                <th>1</th>
                                <th colspan="2">Sumber Daya Manusia / Personil</th>
                                <th>Update Terahkir</th>
                                <th>File Terupload</th>
                            </tr>

                            <tr>
                                <td>1.1</td>
                                <td>Produktivitass</td>
                                <td><a class="b-bagus-light-xsm">Baik</a></td>
                                <td>31 Agustus 2021</td>
                                <td><a class="bt-primary-xsm">Download</a></td>
                            </tr>
                            <tr>
                                <td>1.2</td>
                                <td>Produktivitas</td>
                                <td><a class="b-bagus-light-xsm">Baik</a></td>
                                <td>31 Agustus 2021</td>
                                <td><a class="bt-primary-xsm">Download</a></td>
                            </tr>
                            <tr class="bg-prim-light">
                                <th>1</th>
                                <th colspan="2">Sumber Daya Manusia / Personil</th>
                                <th>Update Terahkir</th>
                                <th>File Terupload</th>
                            </tr>

                            <tr>
                                <td>1.1</td>
                                <td>Produktivitas</td>
                                <td><a class="b-cukup-light-xsm">Cukup</a></td>
                                <td>31 Agustus 2021</td>
                                <td><a class="bt-primary-xsm">Download</a></td>
                            </tr>
                            <tr>
                                <td>1.2</td>
                                <td>Produktivitas</td>
                                <td><a class="b-buruk-light-xsm">Buruk</a></td>
                                <td>31 Agustus 2021</td>
                                <td><a class="bt-primary-xsm">Download</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                colors: ['green', 'orange', 'red', ],
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }

        //GANTI MENU
        var header = document.getElementById("menu-tab");
        var btns = header.getElementsByClassName("card-tab");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {

                var current = $('.card-tab.active')
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active ";


            });
        }
    </script>
@endsection

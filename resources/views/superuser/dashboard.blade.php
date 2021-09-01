@extends('superuser.base')

@section('moreCss')
    {{-- <link rel="stylesheet" href="{{ asset('css/tab.css') }}" type="text/css"> --}}
@endsection


@section('content')

    <section class="" style="margin-top: 100px">
        <canvas id="myChart"></canvas>

        <div role="tablist">
            <div class="items-tab" id="menu-tab">
                <a class="card-tab  d-block c-text card-user" id="usuperuser" data-roles="superuser" data-text-roles="Superuser">
                    <div class="d-flex justify-content-between">
                        <i class='bx bx-user-circle icon-size-lg '></i>
                        <p class="number-card">0</p>
                    </div>
                    <div class="mt-2">
                        Data User
                    </div>
                </a>

                <a class="card-tab d-block c-text card-user" id="uadmin" data-roles="admin" data-text-roles="Admin">
                    <div class="d-flex justify-content-between">
                        <i class='bx bx-message-square-detail nav_icon'></i>
                        <p class="number-card">0</p>
                    </div>
                    <div class="mt-2">
                        Data PPK
                    </div>
                </a>

                <a class="card-tab d-block c-text card-user" id="uaccessor" data-roles="accessor" data-text-roles="Asesor Balai">
                    <div class="d-flex justify-content-between">
                        <i class='bx bx-building-house'></i>
                        <p class="number-card">0</p>
                    </div>
                    <div class="mt-2">
                        Data Paket Konstruksi
                    </div>
                </a>

                <a class="card-tab d-block c-text card-user" id="uaccessorppk" data-roles="accessorppk" data-text-roles="Asesor PPK">
                    <div class="d-flex justify-content-between">
                        <i class='bx bx-doughnut-chart'></i>
                        <p class="number-card">0</p>
                    </div>
                    <div class="mt-2">
                        Data Indikator
                    </div>
                </a>


            </div>


        </div>
        <!-- Tab panes -->
        <div class="mt-4" style="min-height: 23vh">
            <!-- Tab panes -->
            {{-- @yield('contentUser') --}}


            <div class="table-container">
                <p class="fw-bold t-primary">Data Konstruksi Yang Masih Berlangsung</p>
                <table id="table" class="table table-striped" style="width:100%">
                    <tr>
                        <th>Paket</th>
                        <th>No. Kontrak</th>
                        <th>Tanggal Kontrak</th>
                        <th>PPK</th>
                        <th>Penyedia Jasa</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                    </tr>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var roles, textRoles;
        var table;
        $(document).ready(function () {
            chart()
            roles = 'superuser';
            textRoles = 'Superuser'
        });

        function chart() {

            const data = {
                labels: [
                    'Eating',
                    'Drinking',
                    'Sleeping',
                    'Designing',
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [65, 59, 90, 81],
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




    </script>
@endsection

@extends('superuser.base')

@section('moreCss')
    {{-- <link rel="stylesheet" href="{{ asset('css/tab.css') }}" type="text/css"> --}}
@endsection


@section('content')

    <section class="" style="margin-top: 100px">
    {{--        <canvas id="myChart" height="400" width="400"></canvas>--}}
    {{--        <canvas id="canvas" height="400" width="400"></canvas>--}}
    @if(auth()->user()->roles[0] == 'superuser' || auth()->user()->roles[0] == 'admin')
        @include('superuser.dashboard.superuser', ['data' => 'content'])
    @endif

    </section>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @if(auth()->user()->roles[0] == 'superuser' || auth()->user()->roles[0] == 'admin')
        @include('superuser.dashboard.superuser', ['data' => 'script'])
    @endif

    <script>
        var roles, textRoles;
        var table;
        $(document).ready(function () {
            // chart()
            // cahar11()
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
                    'Designing',
                    'Designing',
                    'Designing',
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [60, 40, 35, 80, 75, 62, 55],
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
                    // elements: {
                    // line: {
                    //     borderWidth: 3
                    // },
                    responsive: false,
                    maintainAspectRatio: true,
                    scale: {
                        reverse: false,
                        max: 100,
                        min: 0,
                        stepSize: 20
                    },

                    // }
                },
            };
            var canvas = document.getElementById("myChart");
            var radar = new Chart(canvas,
                config
            );
        }

        function cahar11() {
            var options = {
                responsive: false,
                maintainAspectRatio: true,
                scale: {
                    scale: {
                        min: 0,
                        max: 5,
                    },
                }
            };

            var dataLiteracy = {
                labels: [
                    "1", "2", "3", "4", "5"
                ],
                datasets: [{
                    label: "Literacy",
                    backgroundColor: "rgba(179,181,198,0.2)",
                    borderColor: "rgba(179,181,198,1)",
                    pointBackgroundColor: "rgba(179,181,198,1)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(179,181,198,1)",
                    data: [
                        2, 3, 4, 1, 2
                    ]
                }]
            };

            var ctx = document.getElementById("canvas");
            var myRadarChart = new Chart(ctx, {
                type: 'radar',
                data: dataLiteracy,
                options: options
            });
            console.log(myRadarChart);
        }


    </script>
@endsection

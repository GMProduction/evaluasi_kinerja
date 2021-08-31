@extends('superuser.base')

@section('title')
    Dashboard
@endsection

@section('content')

    <div style="margin-top: 100px">
        <canvas id="myChart"></canvas>
    </div>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function() {

        $("#dashboard").addClass("active");
        chart()
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

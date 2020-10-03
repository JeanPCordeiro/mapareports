@extends('adminlte::page')

@section('title', 'Welcome')

@section('content_header')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><B>Breakdown Rate</B> for line Cellulose Plants</h3>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="lineChartSHL"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>




    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->

@stop

@section('js')

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function() {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- LINE CHART -
    //--------------


    var lineChartCanvasSHL = $('#lineChartSHL').get(0).getContext('2d')

    var lineChartDataSHL = {
        labels: {!!$months!!},
        datasets: [{
                label: 'BVS',
                fill: false,
                backgroundColor: 'blue',
                borderColor: 'blue',
                data: {!!$rateBVS!!}
            },
            {
                label: 'SHL',
                fill: false,
                backgroundColor: 'orange',
                borderColor: 'orange',
                data: {!!$rateSHL!!}
            },

            {
                label: 'MLG',
                fill: false,
                backgroundColor: 'brown',
                borderColor: 'brown',
                data: {!!$rateMLG!!}
            },
            
        ]
    }

    var lineChartOptionsSHL = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            display: true
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: true,
                }
            }],
            yAxes: [{
                ticks: {
                    suggestedMin: 6,
                    suggestedMax: 6
                }
            }]
        }
    }

    // This will get the first returned node in the jQuery collection.
    var lineChartSHL = new Chart(lineChartCanvasSHL, {
        type: 'line',
        data: lineChartDataSHL,
        options: lineChartOptionsSHL
    })

 
})
</script>

@stop
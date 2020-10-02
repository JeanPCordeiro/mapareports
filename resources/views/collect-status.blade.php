@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark"><B>Collect</B> Status</h1>
@stop

@section('content')


<?php
    $area = json_decode($factories, true);
    $nb0=0;
    $nb1=0;
    $nb2=0;
    foreach($area as $i => $v)
    {
        if ($v['state']=='0') $nb0++;
        if ($v['state']=='1') $nb1++;
        if ($v['state']=='2') $nb2++;
    }
    $nbTot = $nb0+$nb1+$nb2;
    $rate0 = $nb0/$nbTot*100;
    $rate1 = $nb1/$nbTot*100;
    $rate2 = $nb2/$nbTot*100;
?>

    <div class="container-fluid">

    <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="fas fa-hourglass-end"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Completed</span>
                <span class="info-box-number">{!!$nb2!!}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                {!!$rate2!!} %
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
              <span class="info-box-icon"><i class="fas fa-hourglass-half"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">In Progress</span>
                <span class="info-box-number">{!!$nb1!!}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                {!!$rate1!!} %
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="fas fa-hourglass-start"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">To Be Done</span>
                <span class="info-box-number">{!!$nb0!!}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                {!!$rate0!!} %
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>


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

</script>

@stop
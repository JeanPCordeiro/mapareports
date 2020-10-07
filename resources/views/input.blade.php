@extends('adminlte::page')

@section('title', 'Collect Data')

@section('content_header')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">List of Lines</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Factory</th>
                                <th>Line</th>
                                <th>Work Time</th>
                                <th>Break Time</th>
                                <th></TH>
                                <th>Breakdown Rate</Th>
                                <th>YTD</Th>
                                <th>State</TH>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($mycollectes as $table)
                            <TR>
                                <TD>{{ $table->id }}</TD>
                                <TD>{{ $table->date }}</TD>
                                <TD>{{ $table->factory }}</TD>
                                <TD>{{ $table->line }}</TD>
                                <TD><B>{{ $table->work }}</B></TD>
                                <TD><B>{{ $table->break }}</B></TD>
                                <td><a href="/edit/{{ $table->id }}" role="button" class="btn btn-info btn-sm">Edit</a>
                                </td>
                                <TD>{{ $table->rate }}</TD>
                                <TD>{{ $table->ytd }}</TD>
                                <td>
                                    @if ($table->state == 0)
                                    <span class="badge bg-danger">To Be Done</span>
                                    @endif
                                    @if ($table->state == 1)
                                    <span class="badge bg-warning">To Validate</span>
                                    @endif
                                    @if ($table->state == 2)
                                    <span class="badge bg-success">Completed</span>
                                    @endif
                                </td>

                            </TR>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

</div>
</div>

@stop

@section('css')

@stop

@section('js')
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
@stop
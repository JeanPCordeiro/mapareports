@extends('adminlte::page')

@section('title', 'List Site Lines')

@section('content_header')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">List Lines</h3>
                </div>
                <div class="card-body">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Domain</th>
                                <th>Site</th>
                                <th>Line</th>
                                <th>Work</th>
                                <th>Break</th>
                                <th>Action</th>
                                <th>Rate</th>
                                <th>YTD</th>
                                <th>State</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($breakdowns as $breakdown)
                            <tr>
                                <td>{{ $breakdown->id }}</td>
                                <td>{{ $breakdown->date }}</td>
                                <td>{{ $breakdown->domain }}</td>
                                <td>{{ $breakdown->site }}</td>
                                <td>{{ $breakdown->line }}</td>
                                <td><B>{{ $breakdown->work }}</B></td>
                                <td><B>{{ $breakdown->break }}</B></td>
                                <td><a class="btn btn-primary btn-xs"
                                        href="{{ route('breakdowns.edit',$breakdown->id) }}">Edit</a></td>
                                <td>{{ $breakdown->rate }}</td>
                                <td>{{ $breakdown->ytd }}</td>
                                <td>
                                    @if ($breakdown->state == 0)
                                    <span class="badge bg-danger">To Be Done</span>
                                    @endif
                                    @if ($breakdown->state == 1)
                                    <span class="badge bg-warning">To Validate</span>
                                    @endif
                                    @if ($breakdown->state == 2)
                                    <span class="badge bg-success">Completed</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Domain</th>
                                <th>Site</th>
                                <th>Line</th>
                                <th>Work</th>
                                <th>Break</th>
                                <th>Action</th>
                                <th>Rate</th>
                                <th>YTD</th>
                                <th>State</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

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

<!-- DataTables 
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
-->

<script>
$(document).ready(function() {
    $('#mytable').DataTable({
        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.footer()))
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        }
    });
});
</script>
@stop
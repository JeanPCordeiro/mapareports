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

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Factory</th>
                            <th>Line</th>
                            <th>Work</th>
                            <th>Action</th>
                            <th>Rate</th>
                            <th>YTD</th>
                            <th>State</th>
                        </tr>
                        @foreach ($breakdowns as $breakdown)
                        <tr>
                            <td>{{ $breakdown->id }}</td>
                            <td>{{ $breakdown->date }}</td>
                            <td>{{ $breakdown->factory }}</td>
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
@stop
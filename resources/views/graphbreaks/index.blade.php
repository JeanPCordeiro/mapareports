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
                            <th>Domain</th>
                            <th>Site</th>
                            <th>Line</th>
                            <th>Rate</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($lines as $line)
                        <tr>
                            <td>{{ $line->domain }}</td>
                            <td>{{ $line->site }}</td>
                            <td>{{ $line->line }}</td>
                            <td>{{ $line->rate }}</td>
                            <td>


                                <a class="btn btn-info btn-xs" href="{{ route('graphbreaks.show',$line->id) }}">View
                                    last 12 months graph</a>




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
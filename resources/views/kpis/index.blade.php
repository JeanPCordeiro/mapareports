@extends('adminlte::page')

@section('title', 'List KPI Indicators')

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
                    <h3 class="card-title">List KPIs</h3>
                    <div class="card-tools">
                        <a class="btn btn-success" href="{{ route('kpis.create') }}">Create New KPI</a>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <tr>
                            <th>Scope</th>
                            <th>Item</th>
                            <th>Unit</th>
                            <th>Domain</th>
                            <th>Site</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($kpis as $kpi)
                        <tr>
                            <td>{{ $kpi->scope }}</td>
                            <td>{{ $kpi->item }}</td>
                            <td>{{ $kpi->unit }}</td>
                            <td>{{ $kpi->domain }}</td>
                            <td>{{ $kpi->site}}</td>
                            <td>
                                <form action="{{ route('kpis.destroy',$kpi->id) }}" method="POST">

                                    <a class="btn btn-info btn-xs" href="{{ route('kpis.show',$kpi->id) }}">Show</a>

                                    <a class="btn btn-primary btn-xs" href="{{ route('kpis.edit',$kpi->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
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
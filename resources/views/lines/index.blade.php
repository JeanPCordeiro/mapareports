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
                    <div class="card-tools">
                        <a class="btn btn-success" href="{{ route('lines.create') }}">Create New Line</a>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <tr>
                            <th>Factory</th>
                            <th>Line</th>
                            <th>Rate</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($lines as $line)
                        <tr>
                            <td>{{ $line->factory }}</td>
                            <td>{{ $line->line }}</td>
                            <td>{{ $line->rate }}</td>
                            <td>
                                <form action="{{ route('lines.destroy',$line->id) }}" method="POST">

                                    <a class="btn btn-info btn-xs" href="{{ route('lines.show',$line->id) }}">Show</a>

                                    <a class="btn btn-primary btn-xs" href="{{ route('lines.edit',$line->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                </form>
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
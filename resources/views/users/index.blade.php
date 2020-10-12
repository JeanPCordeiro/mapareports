@extends('adminlte::page')

@section('title', 'List Users')

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
                    <h3 class="card-title">List Users</h3>
                    <div class="card-tools">
                        <a class="btn btn-success" href="{{ route('users.create') }}">Create New User</a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Factory</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->level }}</td>
                                <td>{{ $user->factory }}</td>
                                <td>
                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">

                                        <a class="btn btn-info btn-xs"
                                            href="{{ route('users.show',$user->id) }}">Show</a>

                                        <a class="btn btn-primary btn-xs"
                                            href="{{ route('users.edit',$user->id) }}">Edit</a>

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

<script>
$(function() {
    $("#mytable").DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>


@stop
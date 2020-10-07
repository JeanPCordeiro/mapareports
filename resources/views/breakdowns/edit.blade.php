@extends('adminlte::page')

@section('title', 'Generate a collect campaign')

@section('content_header')


@section('content')

<div class="row">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">


                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Breakdown</h3>
                        <div class="card-tools">
                            <a class="btn btn-success" href="{{ route('breakdowns.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

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
                                </tr>
                            </thead>
                            <tbody>
                                <TR>
                                    <form action="{{ route('breakdowns.update',$breakdown->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <TD>{{ $breakdown->id }}</TD>
                                                    <TD>{{ $breakdown->date }}</TD>
                                                    <TD>{{ $breakdown->factory }}</TD>
                                                    <TD>{{ $breakdown->line }}</TD>
                                                    <TD>
                                                        <input type="text" name="work" value="{{ $breakdown->work }}"
                                                            class="form-control" placeholder="Work">
                                                    </TD>
                                                    <TD>
                                                        <input type="text" name="break" value="{{ $breakdown->break }}"
                                                            class="form-control" placeholder="Break">
                                                    </TD>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                <TD><button type="submit" class="btn btn-primary btn-sm">Save</button>
                                                </TD>
                                            </div>
                                        </div>
                                    </form>
                                </TR>
                            </tbody>
                        </table>
                    </div>
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
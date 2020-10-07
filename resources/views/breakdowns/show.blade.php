@extends('adminlte::page')

@section('title', 'Generate a collect campaign')

@section('content_header')


@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Line</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('lines.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Factory:</strong>
                {{ $line->factory }} <BR>
                <strong>Line:</strong>
                {{ $line->line }} <BR>
                <strong>Rate:</strong>
                {{ $line->rate }} <BR>
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
@extends('adminlte::page')

@section('title', 'Generate a collect campaign')

@section('content_header')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Line</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('lines.index') }}"> Back</a>
        </div>
    </div>
</div>
   
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
   
<form action="{{ route('lines.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Factory:</strong>
                <input type="text" name="factory" class="form-control" placeholder="Factory">
                <strong>Line:</strong>
                <input type="text" name="line" class="form-control" placeholder="Line">
                <strong>Rate:</strong>
                <input type="text" name="rate" class="form-control" placeholder="Rate">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
   
</form>

@section('content')

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

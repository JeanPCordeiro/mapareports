@extends('adminlte::page')

@section('title', 'Generate a collect campaign')

@section('content_header')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New KPI</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('kpis.index') }}"> Back</a>
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
   
<form action="{{ route('kpis.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Scope:</strong>
                <input type="text" name="scope" class="form-control" placeholder="Scope">
                <strong>Item:</strong>
                <input type="text" name="item" class="form-control" placeholder="Item">
                <strong>Unit:</strong>
                <input type="text" name="unit" class="form-control" placeholder="Unit">
                <strong>Domain:</strong>
                <input type="text" name="domain" class="form-control" placeholder="Domain">
                <strong>Site:</strong>
                <input type="text" name="site" class="form-control" placeholder="Scope">
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

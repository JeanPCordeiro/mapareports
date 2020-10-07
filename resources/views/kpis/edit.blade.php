@extends('adminlte::page')

@section('title', 'Generate a collect campaign')

@section('content_header')


@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Kpi</h2>
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
  
    <form action="{{ route('kpis.update',$kpi->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Scope:</strong>
                    <input type="text" name="scope" value="{{ $kpi->scope }}" class="form-control" placeholder="Scope">
                    <strong>Item:</strong>
                    <input type="text" name="item" value="{{ $kpi->item }}" class="form-control" placeholder="Item">
                    <strong>Unit:</strong>
                    <input type="text" name="unit" value="{{ $kpi->unit }}" class="form-control" placeholder="Unit">
                    <strong>Domain:</strong>
                    <input type="text" name="domain" value="{{ $kpi->domain }}" class="form-control" placeholder="Domain">
                    <strong>Site:</strong>
                    <input type="text" name="site" value="{{ $kpi->site }}" class="form-control" placeholder="Site">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>
   
    </form>


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
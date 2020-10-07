@extends('adminlte::page')

@section('title', 'List Users')

@section('content_header')


@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List Users</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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
  
    <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="scope" value="{{ $user->name }}" class="form-control" placeholder="Name">
                    <strong>Email:</strong>
                    <input type="email" name="item" value="{{ $user->email }}" class="form-control" placeholder="Email">
                    <strong>Password:</strong>
                    <input type="password" name="password" value="" class="form-control" placeholder="password">
                    <strong>Level:</strong>
                    <input type="text" name="level" value="{{ $user->level }}" class="form-control" placeholder="Level">
                    <strong>Factory:</strong>
                    <input type="text" name="Factory" value="{{ $user->factory }}" class="form-control" placeholder="Factory">
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
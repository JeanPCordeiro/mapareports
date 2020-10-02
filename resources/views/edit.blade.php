@extends('adminlte::page')

@section('title', 'Edit Line')

@section('content_header')


@section('content')

    <div class="container-fluid">

    <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Breakdown Line Indicators Edit</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
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
                  <form action="/update" method="post">
                  @csrf
                  @foreach($mycollectes as $table) 
                  <input type="hidden" id="id" name="id" value="{{ $table->id}}">
                        <TR>
                            <TD>{{ $table->id }}</TD>
                            <TD>{{ $table->date }}</TD>
                            <TD>{{ $table->factory }}</TD>
                            <TD>{{ $table->line }}</TD>
                            <TD>
                              <div class="form-group"> 
                                <input type="text" id="work" name="work" class="form-control" value="{{ $table->work}}">
                              </div>
                            </TD>
                            <TD>
                              <div class="form-group"> 
                                <input type="text" id="break" name="break" class="form-control" value="{{ $table->break}}">
                              </div>
                            </TD>
                            <td><button type="submit" class="btn btn-primary">Save</button></td>
                        </TR>
                        @endforeach
                  </form>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

        </div>
    </div>

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

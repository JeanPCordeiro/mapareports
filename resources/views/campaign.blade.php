@extends('adminlte::page')

@section('title', 'Generate a collect campaign')

@section('content_header')


@section('content')

<div class="container-fluid">

<div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Generate a new Collect Campaign</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <tbody>
              <form action="/newcampaign" method="post">
              @csrf


                    <TR>
                        <TD>Campaign Date</TD>
                        <TD>
                          <div class="form-group"> 
                            <input type="text" id="newdate" name="newdate" class="form-control" value="{{ $campaigndate}}">
                          </div>
                        </TD>

                        <td><button type="submit" class="btn btn-primary">Generate</button></td>
                    </TR>

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

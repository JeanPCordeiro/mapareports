@extends('adminlte::page')

@section('title', 'Welcome')

@section('content_header')
    <h1 class="m-0 text-dark">Welcome</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    Hi <B>{{ Auth::user()->name }}</B>, nice to see you on Mapa Spontex Reporting site !<BR>
                    Your level of authorization is <B>{{ Auth::user()->level }}</B>
                    <I>(Level 1 allows report's visualization, 
                    Level 2 adds data's input,
                    Level 3 adds full administration)
                    </I>.
                </div>
            </div>
        </div>
    </div>
@stop

@extends('layouts.calender')
@section('content')
@if(Auth::guest())

<header class="masthead">
    <div class="overlay">
        <div class="container">
            <h1 class="display-1 text-white">Please Login or Register</h1>
            <h2 class="display-4 text-white">To Check Before Book</h2>
        </div>
    </div>
</header>

@else
<header class="masthead">
    <div class="overlay">
        <div class="container">
            <h1 class="display-1 text-white">Save Your Time</h1>
            <h2 class="display-4 text-white">Check Before Book</h2>
        </div>
    </div>
</header>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/homepage">Home</a></li>
    <li class="breadcrumb-item active">Check Availability</li>
</ol>
<div class="container">
  <h1 class="my-4 text-center">Vehicle Color</h1>
  <div class="row">
    <div class="col-lg-4 mb-4">
      <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading text-center">Car</h4>
      </div>
    </div>
    <div class="col-lg-4 mb-4">
      <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading text-center">Bus</h4>
      </div>
    </div>
    <div class="col-lg-4 mb-4">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading text-center">Van</h4>
      </div>
    </div>
  </div>
</div>
<div class="container" style="padding-top: 100px; padding-bottom: 100px;">
    <div id='calendar'></div>
    <div id="modal-event" class="modal fade" tabindex="-1" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Vehicle Detail</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('_title', 'Model') }}
                        {{ Form::text('_title', old('_title'), ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('_date_start', 'START DATE') }}
                        {{ Form::text('_date_start', old('_date_start'), ['class' => 'form-control', 'readonly' => 'true']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('_time_start', 'START TIME') }}
                        {{ Form::text('_time_start', old('_time_start'), ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('_date_end', 'DATE TIME END') }}
                        {{ Form::text('_date_end', old('_date_end'), ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('_color', 'COLOR') }}
                        <div class="input-group colorpicker">
                            {{ Form::text('_color', old('_color'), ['class' => 'form-control']) }}
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dafault" data-dismiss="modal">CANCEL</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
@extends('layouts.master')
@section('head')
@stop
@section('content')
<header class="masthead">
	<div class="overlay">
		<div class="container">
			<h1 style="color: #ffffff; font-size: 60px;">Enter Booking Detail</h1>
			<h2 class="display-4 text-white"></h2>
		</div>
	</div>
</header>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/homepage">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url('login') }}">Login</a></li>
    <li class="breadcrumb-item active"><a href="/admin">Dashboard</a></li>
    <li class="breadcrumb-item active">Book</a></li>
</ol>
<div class="container-fluid" style="padding-top: 35px; padding-bottom: 35px;">
	<div class="col-md-6 col-md-offset-3 well">
		<!-- BEGIN BORDERED TABLE PORTLET-->
		<div class="row" style="">
			<div class="col-md-10 col-md-offset-1 text-center">
				<h1>First step</h1>
				<p> Fill the form</p>
				<hr>
			</div>
			{!! Form::open(['method'=>'POST', 'action'=>'UserController@booking', 'files'=>true]) !!}
			<div class="form-group col-md-10 col-md-offset-1">
				<label for="name">Name:</label>
				<input type="text" value="{{ Auth::user()->name }}" class="form-control" name="name" readonly="">
			</div>
			<div class="form-group col-md-10 col-md-offset-1">
				<label for="name">Email:</label>
				<input type="text" value="{{ Auth::user()->email }}" class="form-control" name="email" readonly="">
			</div>
			<div class="form-group col-md-10 col-md-offset-1">
				<label for="name">Purpose:</label>
				<select class="form-control" name="purpose">
					<option value="Conference">Conference</option>
					<option value="Camp">Camp</option>
					<option value="Trip">Trip</option>
				</select>
			</div>
			<div class="form-group col-md-10 col-md-offset-1">
				<label for="name">Destination address:</label>
				<textarea name="destination" class="form-control" required></textarea>
			</div>
			<div class="form-group col-md-10 col-md-offset-1">
				<label for="name">Total Passenger:</label>
				<input type="text" value="" class="form-control" name="total_passenger" required>
			</div>
			<div class="form-group col-md-10 col-md-offset-1">
				<label for="inputPassword1" class="control-label">Departure Date</label>
				<div class="input-group">
					<input type="text" class="form-control" readonly name="start_date" value="{{ $start_date }}">
				</div>
			</div>
			<div class="form-group col-md-10 col-md-offset-1">
				<label for="inputPassword1" class="control-label">Return Date</label>
				<div class="input-group">
					<input type="text" class="form-control" readonly name="end_date" value="{{ $end_date }}">
				</div>
			</div>
			<div class="col-md-10 col-md-offset-1 text-center">
				<h1>Second step</h1>
				<p>Upload your documents</p>
				<hr>
			</div>
			
			<div class="form-group col-md-10 col-md-offset-1">
				<!-- <label for="inputPassword1" class="control-label">Upload file</label> -->
				<input class="form-control input-line input-medium" type="file" name="attachment" id="fileToUpload">
			</div>
			<div>
				<div class="form-group col-md-10 col-md-offset-1 text-center">
					<!-- <label for="inputPassword1" class="control-label">Upload file</label> -->
					<input class="btn btn-success" type="submit" value="Book Now">
				</div>
			</div>
			{!! Form::close() !!}
		</div>
		<!-- END BORDERED TABLE PORTLET-->
	</div>
</div>
@stop
@section('script')
<script>
	
	function myFunction() {
		
		if($('#filter_status').val() == ''){
			window.location.href = '/user';
		}
		else{
			window.location.href = '/user?status=' + $( "#filter_status" ).val();
		}
	}
</script>
@if(Session::has('message'))
<script>
	swal(
		'',
		"{{Session::get('message')}}",
		'success'
		)
</script>
@endif
@include('errors.validation-errors')
@stop
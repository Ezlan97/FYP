@extends('layouts.master')
@section('head')
@stop
@section('content')
<header class="masthead">
	<div class="overlay">
		<div class="container">
			<h1 style="color: #ffffff; font-size: 60px;">Welcome {{ Auth::user()->name }}</h1>
			<h2 class="display-4 text-white" style="color: #ffffff;">Start Booking Now</h2>
		</div>
	</div>
</header>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="/homepage">Home</a></li>
	<li class="breadcrumb-item"><a href="{{ url('login') }}">Login</a></li>
	<li class="breadcrumb-item active">Booking</li>
</ol>
<div class="container" style="padding-top: 80px; padding-bottom: 80px;">
	<div class="col-md-10 col-md-offset-1 well">
		<!-- BEGIN BORDERED TABLE PORTLET-->
		<div class="portlet box blue-dark">
			<div class="portlet-title">
				<div class="caption">
					<h3 class="text-center">Booking History</h3>
				</div>
			</div>
			<div class="portlet-body">
				<div class="col-md-10 margin-bottom-15px padding-left-0px">
					<div class="col-md-3 padding-left-0px">
						<select class="form-control input-sm" id="filter_status" name="filter_status" onchange="myFunction()" placeholder="Filter Status">
							<option value="">Filter Status</option>
							<option value="">All</option>
							<option value="0">Pending</option>
							<option value="1">Approved</option>
							<option value="2">Rejected</option>
						</select>
					</div>
					
				</div>
				<div class="table-scrollable table-bordered table-hover">
					<table class="table table-hover table-light">
						<thead>
							<tr class="uppercase">
								<th> # </th>
								<th> Destination </th>
								<th> Purpose </th>
								<th> Departure Date </th>
								<th> Return Date </th>
								<th> Status </th>
								<th> Remarks </th>
								<th> Update </th>
							</tr>
						</thead>
						<tbody>
							<?php $count = 1; ?>
							@if(count($histories) > 0)
							@foreach($histories as $history)
							<?php $currentPageTotalNumber = ($histories->currentPage() - 1) * 5; ?>
							<tr>
								<td><b>{{$count + $currentPageTotalNumber}}</b></td>
								<td> {{ $history->destination }}</td>
								<td> {{ $history->purpose }}</td>
								<td> {{ $history->start_date }}</td>
								<td> {{ $history->end_date }}</td>
								<td>
									<span
									class="label min-width-100px
									@if( $history->approval == 2) {{ 'label-danger' }}
									@elseif ($history->approval == 0){{ 'label-default' }}
									@elseif ($history->approval == 1){{ 'label-success' }}
									@else {{ 'label-danger' }}
									@endif">
									@if( $history->approval == 2) {{ 'Rejected' }}
									@elseif ($history->approval == 0){{ 'Pending' }}
									@elseif ($history->approval == 1){{ 'Approved' }}
									@else {{ 'Rejected' }}
									@endif
								</span>
							</td>
							<td>
								<a class="btn btn-warning" data-toggle="modal" data-target="#remarksModal{{ $history->history_id }}">
									<i class="fa fa-list"></i>
									View Remarks
								</a>
							</td>
							<td>
								<a class="btn btn-info" data-toggle="modal" data-target="#updatePost{{ $history->history_id }}">
									<i class="fa fa-pencil" aria-hidden="true">Update</i>
								</a>
							</td>
						</tr>
						<?php $count++ ?>
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-12">
			<div class="pull-right">
				{{$histories->render()}}
			</div>
		</div>
	</div>
	<!-- END BORDERED TABLE PORTLET-->
	<div class="col-md-7 text-center">
		<a href="" class="btn btn-sm green-jungle pull-right" id="createButton" data-toggle="modal" data-target="#createModal"><button class="btn btn-lg btn-success">Book Now</button></a>
	</div>
</div>
</div>
<!-- Modal -->
<div id="createModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Choose Departure and Return Date</h4>
			</div>
			<div class="modal-body">
				<div class="table-scrollable table-scrollable-borderless">
					{!! Form::open(['method'=>'POST', 'action'=>'UserController@showAvailableBooking', 'files'=>true]) !!}
					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Departure date</label>
						<div class="col-md-8">
							<input type="text" name="start_date" class="form-control input-line" id="date_start">
						</div>
					</div>
					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Return date</label>
						<div class="col-md-8">
							<input type="text" name="end_date" class="form-control input-line" id="date_end">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success submitDate"> Submit </button>
				<button type="button" class="btn btn-danger btn-warning" data-dismiss="modal">Close</button>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
<!-- End modal -->
<!-- Modal -->
@foreach($histories as $history)
<div id="remarksModal{{ $history->history_id }}" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Remarks / Message</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="form-group col-md-12">
						<textarea class="form-control" placeholder="">{{ $history->remarks }}</textarea>
					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endforeach
<!-- End Modal -->

@foreach($histories as $history)
<div class="modal fade" id="updatePost{{ $history->history_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Update Booking</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" action="{{ route('booking.update', $history->id ) }}" enctype="multipart/form-data">
					{{ method_field('PATCH')}} {{ csrf_field() }}
					<div class="col-md-8 col-md-offset-2">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" value="{{ Auth::user()->name }}" class="form-control" name="name" readonly="">
						</div>
						<div class="form-group">
							<label for="name">Position:</label>
							<input type="text" value="{{ Auth::user()->position }}" class="form-control" name="position" readonly="">
						</div>
						<div class="form-group">
							<label for="name">Email:</label>
							<input type="text" value="{{ Auth::user()->email }}" class="form-control" name="email" readonly="">
						</div>
						<div class="form-group">
							<label for="name">Faculty:</label>
							<input type="text" value="{{ Auth::user()->faculty }}" class="form-control" name="faculty" readonly="">
						</div>
						<div class="form-group">
							<label for="name">Purpose:</label>
							<select class="form-control" name="purpose">
								<option value="Conference">Conference</option>
								<option value="Camp">Camp</option>
								<option value="Trip">Trip</option>
							</select>
						</div>
						<div class="form-group">
							<label for="name">Destination address:</label>
							<textarea name="destination" class="form-control">{{ $history->destination }}</textarea>
						</div>
						<div class="form-group">
							<label for="name">Total Passenger:</label>
							<input type="text" value="{{ $history->total_passenger }}" class="form-control" name="total_passenger" required>
						</div>
						<div class="form-group">
							<label for="inputPassword1" class="control-label">Departure Date</label>
							<div class="input-group">
								<input type="text" class="form-control" readonly name="start_date" value="{{ $history->start_date }}">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword1" class="control-label">Return Date</label>
							<div class="input-group">
								<input type="text" class="form-control" readonly name="end_date" value="{{ $history->end_date }}">
							</div>
						</div>
						<div class="form-group text-center">
							<h1>Second step</h1>
							<p>Upload your documents</p>
							<hr>
						</div>

						<div class="form-group">
							<!-- <label for="inputPassword1" class="control-label">Upload file</label> -->
							<input class="form-control input-line input-medium" type="file" name="attachment" id="fileToUpload">
						</div>
						<div>
							<div class="form-group text-center">
								<!-- <label for="inputPassword1" class="control-label">Upload file</label> -->
								<input class="btn btn-success" type="submit" value="Book Now">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endforeach


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
	$(document).ready(function(){

		$(".submitDate").click(function(event){
			var isValid = true;
			if($('#e_date').val() == '' || $('#s_date').val() == '')
			{
				$('#createModal').modal('toggle');
				swal(
					'',
					"Please select date!",
					'error'
					)
				isValid = false;
			}
			if (!isValid) {
				event.preventDefault();
			}
		});
	});
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
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
								<th> </th>
								<th> </th>
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
								<td> {{ date('M j, Y H:i a', strtotime( $history->start_date )) }} </td>
								<td> {{ date('M j, Y H:i a', strtotime( $history->end_date )) }} </td>
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
									Message
								</a>
							</td>
							<td>
								<a href="" class="btn btn-primary editBtn" data-toggle="modal" data-target="#editModal" data-history_id="{{ $history->history_id }}" 
									data-history_destination="{{ $history->destination }}" 
									data-history_purpose="{{ $history->purpose }}" 
									data-history_start="{{ $history->start_date }}" 
									data-history_end="{{ $history->end_date }}"
									data-history_attachment="{{ $history->attachment }}"
									data-history_total_passenger="{{ $history->total_passenger }}">
									<i class="fa fa-list">Update</i>
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




{{-- MODAL --}}




<!-- Booking Modal -->
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


<!-- Remark Modal -->
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
						<p>{{ $history->remarks }}</p>
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


<!-- Update Modal -->
<div id="editModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update Booking</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					{!! Form::open(['method'=>'POST', 'action'=>'UserController@update', 'files'=>true]) !!}
					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Destination</label>
						<div class="col-md-8">
							<textarea type="text" name="destination" class="form-control input-line" id="m_history_destination"></textarea>
						</div>
					</div>
					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Purpose</label>
						<div class="col-md-8">
							<input type="text" name="purpose" class="form-control input-line" id="m_history_purpose">
						</div>
					</div>
					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Total Passanger</label>
						<div class="col-md-8">
							<input type="text" name="total_passenger" class="form-control input-line" id="m_history_total_passenger">
						</div>
					</div>
					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Start Date</label>
						<div class="col-md-8">
							<input type="text" name="start_date" class="form-control input-line" placaeholder="m_history_start" id="date_start1">
						</div>
					</div>
					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">End Date</label>
						<div class="col-md-8">
							<input type="text" name="end_date" class="form-control input-line" placaeholder="m_history_end" id="date_end2">
						</div>
					</div>
					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Documents</label>
						<div class="col-md-8">
							<input class="form-control input-line input-medium" type="file" name="attachment" id="fileToUpload">
							<small id="passwordHelpBlock" class="form-text text-muted">
								Optional
							</small>
						</div>
					</div>
					<div class="form-group">
						<input type="hidden" name="id" id="m_history_id">
						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
						<input type="hidden" name="car_id" value="0">
						<input type="hidden" name="remarks" value="">
						<input type="hidden" name="approval" value="0">
						<input type="hidden" name="attachment_id" id="m_history_attachment">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Update</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->


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

	$('.editBtn').click(function(){
		var roles_id = $(this).data('roles_id');
		var faculties_id = $(this).data('faculties_id');
		$("#m_history_id").val($(this).data('history_id'));
		$("#m_history_purpose").val($(this).data('history_purpose'));
		$("#m_history_destination").val($(this).data('history_destination'));
		$("#m_history_total_passenger").val($(this).data('history_total_passenger'));
		$("#m_history_start").val($(this).data('history_start'));
		$("#m_history_end").val($(this).data('history_end'));
		$("#m_history_attachment").val($(this).data('history_attachment'));
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
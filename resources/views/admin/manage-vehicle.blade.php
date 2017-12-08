@extends('layouts.master')
@section('head')
@stop
@section('content')
<header class="masthead">
	<div class="overlay">
		<div class="container">
			<h1 style="color: #ffffff; font-size: 60px;">Manage Vehicle</h1>
			<h2 class="display-4 text-white"></h2>
		</div>
	</div>
</header>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="/homepage">Home</a></li>
	<li class="breadcrumb-item">Login</li>
	<li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
	<li class="breadcrumb-item">Manage Vehicle</li>
</ol>
<div class="container" style="padding-top: 100px; padding-bottom: 100px;">
	<div class="col-md-10 col-md-offset-1 well">
		<!-- BEGIN BORDERED TABLE PORTLET-->
		<div class="portlet box blue-dark">
			<div class="portlet-body">
				<div class="table-scrollable table-scrollable-borderless">
					<div class="col-md-12">
						<table class="table table-bordered" style="padding-top: 30px;">
							<thead>
								<tr class="uppercase">
									<th> <input id="checkall-checkbox" type="checkbox"> </th>
									<th> # </th>
									<th> Model </th>
									<th> Plate </th>
									<th> Type </th>
									<th>Start date</th>
									<th>End date</th>
									<th> </th>
									<th> </th>
								</tr>
							</thead>
							<tbody id="tbody">
								<?php $count = 1; ?>
								@foreach($vehicles as $vehicle)
								<?php $currentPageTotalNumber = ($vehicles->currentPage() - 1) * 5; ?>
								<tr>
									<td> <input class="single-checkbox" type="checkbox" name="vehicle_id[]" form="form_update_status" value="{{ $vehicle->id }}"> </td>
									<td>{{$count + $currentPageTotalNumber}}</td>
									<td> {{ $vehicle->model }}</td>
									<td> {{ $vehicle->plate }}</td>
									<td> {{ $vehicle->type }}</td>
									<td> {{ $vehicle->start }} </td>
									<td> {{ $vehicle->end }} </td>
									<td>
										<a href="{{ route('admin.view-vehicle-histories', $vehicle->id ) }}" class="btn blue btn-sm editBtn">View Booking History</a>
									</td>
									<td>
										<a href="" class="btn blue btn-sm editBtn" data-toggle="modal" data-target="#editModal" data-vehicle_id="{{ $vehicle->id }}" data-vehicle_model="{{ $vehicle->model }}" data-vehicle_type="{{ $vehicle->type }}" data-vehicle_plate="{{ $vehicle->plate }}"><button class="btn btn-sm btn-info deleteBtn">Edit</button></a>
									</td>
								</tr>
								<?php $count++ ?>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-md-6">
							{!! Form::open(['method'=>'DELETE', 'action'=>['AdminController@deleteVehicle'], 'id'=>'form_update_status']) !!}
							<button class="btn btn-sm btn-danger deleteBtn">Delete</button>
							{!! Form::close() !!}
						</div>
						<div class="col-md-6">
							<div class="pull-right">
								{{$vehicles->render()}}
							</div>
						</div>
					</div>
				</div>
				<!-- END BORDERED TABLE PORTLET-->
			</div>
		</div>
	</div>
	<div class="col-md-5 col-md-offset-5">
		<a href="" id="createButton" data-toggle="modal" data-target="#createModal"><button class="btn btn-lg btn-success">Create New Vehicle</button></a>
	</div>
	<!-- Modal -->
	<div id="editModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit Info</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						{!! Form::open(['method'=>'PATCH', 'action'=>'AdminController@editVehicle']) !!}
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Model</label>
							<div class="col-md-8">
								<input type="text" name="model" class="form-control input-line" id="m_vehicle_model">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Plate</label>
							<div class="col-md-8">
								<input type="text" name="plate" class="form-control input-line" id="m_vehicle_plate">
							</div>
						</div>
						<div class="form-group col-md-12 dropdown">
							<label for="inputPassword1" class="col-md-4 control-label">Type</label>
							<div class="col-md-8">
								<select class="form-control" name="type" required>
									<option value="" disabled selected>Select</option>
									<option value="FSTM">FSTM</option>
									<option value="FPM">FPM</option>
									<option value="FP">FP</option>
									<option value="FSU">FSU</option>
									<option value="PA">PA</option>
									<option value="FPPI">FPPI</option>
									<option value="PPT">PPT</option>
									<option value="PPS">PPS</option>
								</select>
							</div>
						</div>
						<input type="hidden" name="id" id="m_vehicle_id">
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
<!-- Modal -->
<div id="createModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Create New Vehicle</h4>
			</div>
			<div class="modal-body">
				<div class="table-scrollable table-scrollable-borderless">
					{!! Form::open(['method'=>'POST', 'action'=>'AdminController@createVehicle']) !!}
					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Model</label>
						<div class="col-md-8">
							<input type="text" name="model" class="form-control input-line" id="vmodel" value="{{ old('model') }}">
						</div>
					</div>
					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Plate</label>
						<div class="col-md-8">
							<input type="text" name="plate" class="form-control input-line" id="vplate" value="{{ old('plate') }}">
						</div>
					</div>
					<div class="form-group col-md-12 dropdown">
						<label for="inputPassword1" class="col-md-4 control-label">Type</label>
						<div class="col-md-8">
							<select class="form-control" name="type" id="vplate" value="{{ old('type') }}" required>
								<option value="" disabled selected>Select</option>
								<option value="Car">Car</option>
								<option value="Bus">Bus</option>
								<option value="Van">Van</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-12 dropdown">
						<label for="inputPassword1" class="col-md-4 control-label">Color</label>
						<div class="col-md-8">
							<select class="form-control" name="color" id="vplate" value="{{ old('type') }}" required>
								<option value="" disabled selected>Select</option>
								<option value="#87CEFA" style="background:#87CEFA; color: #ffffff;">Car</option>
								<option value="#FFB6C1" style="background:#FFB6C1; color: #ffffff;">Bus</option>
								<option value="#7FFFD4" style="background:#7FFFD4; color: #ffffff;">Van</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Start date</label>
						<div class="col-md-8">
							<input type="text" name="start" class="form-control input-line" id="date_start" value="{{ old('start') }}">
						</div>
					</div>
					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">End date</label>
						<div class="col-md-8">
							<input type="text" name="end" class="form-control input-line" id="date_end" value="{{ old('end') }}">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-success active submitVehicleBtn"> Submit </button>
				<button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	<!-- End modal -->
	@stop
	@section('script')
	<script>
		$(document).ready(function(){
			$('#checkall-checkbox').click(function(){
				if(this.checked){
					$('.checker').find('span').addClass('checked');
					$("input.single-checkbox").prop('checked', true).show();
				}
				else{
					$('.checker').find('span').removeClass('checked');
					$("input.single-checkbox").prop('checked', false);
				}
			});
			$('.editBtn').click(function(){
				var roles_id = $(this).data('roles_id');
				var faculties_id = $(this).data('faculties_id');
				$("#m_vehicle_id").val($(this).data('vehicle_id'));
				$("#m_vehicle_model").val($(this).data('vehicle_model'));
				$("#m_vehicle_plate").val($(this).data('vehicle_plate'));
				$("#m_vehicle_type").val($(this).data('vehicle_type'));
			});
		});
	</script>
	@if(Session::has('create_message'))
	<script>
		alertify.success("{{Session::get('create_message')}}");
	</script>
	@endif
	@if(Session::has('delete_message'))
	<script>
		alertify.warning("{{Session::get('delete_message')}}");
	</script>
	@endif
	@if(Session::has('update_message'))
	<script>
		alertify.success("{{Session::get('update_message')}}");
	</script>
	@endif
	@include('errors.validation-errors')
	@include('errors.validation-errors-script')
	@stop
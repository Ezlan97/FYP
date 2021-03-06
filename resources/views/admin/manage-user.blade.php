
@extends('layouts.master')
@section('head')
@stop
@section('content')
<header class="masthead">
	<div class="overlay">
		<div class="container">
			<h1 style="color: #ffffff; font-size: 60px;">Manage User</h1>
			<h2 class="display-4 text-white"></h2>
		</div>
	</div>
</header>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="/homepage">Home</a></li>
	<li class="breadcrumb-item">Login</li>
	<li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
	<li class="breadcrumb-item">Manage User</li>
</ol>
<div class="container" style="padding-top: 100px; padding-bottom: 100px;">
	<div class="col-md-12 well">
		<table class="table">
			<thead class="thead-inverse">
				<tr>
					<th></th>
					<th> # </th>
					<th> Name </th>
					<th> Email </th>
					<th> Staff / Matrik No. </th>
					<th> Phone </th>
					<th> Role </th>
					<th> Faculty </th>
				</tr>
			</thead>
			<tbody id="tbody">
				<?php $count = 1; ?>
				@foreach($users as $user)
				<?php $currentPageTotalNumber = ($users->currentPage() - 1) * 5; ?>
				<tr>
					<td> <input class="single-checkbox" type="checkbox" name="users_id[]" form="form_update_status" value="{{ $user->id }}"> </td>
					<td>{{$count + $currentPageTotalNumber}}</td>
					<td> {{ $user->name }}</td>
					<td> {{ $user->email }}</td>
					<td> {{ $user->matrik }}</td>
					<td> {{ $user->phone }}</td>
					<td>
						@if($user->roles_id == 1)
						Admin
						@else
						User
						@endif
					</td>
					<td> {{ $user->faculty }}</td>
					<td> <a href="" class="btn blue btn-sm editBtn" data-toggle="modal" data-target="#editModal" data-user_id="{{ $user->id }}" data-username="{{ $user->name }}" data-user_email="{{ $user->email }}" data-roles_id="{{ $user->roles_id }}" data-faculty="{{ $user->faculty }}" data-phone="{{ $user->phone }}" data-matrik="{{ $user->matrik }}"><button class="btn btn-primary">Edit</button></a>
					</td>
					<?php $count++ ?>
					@endforeach
				</tbody>
			</table>
			<div class="row">
				<div class="col-md-6">
					{!! Form::open(['method'=>'DELETE', 'action'=>['AdminController@deleteUser'], 'id'=>'form_update_status']) !!}
					<button class="btn btn-sm btn-danger deleteBtn">Delete</button>
					{!! Form::close() !!}
				</div>
				<div class="col-md-6">
					<div class="pull-right">
						{{$users->render()}}
					</div>
				</div>
			</div>
		</div>
		<!-- END BORDERED TABLE PORTLET-->
		<div class="col-md-12 text-center">
			<a href="" class="btn btn-lg" id="createButton" data-toggle="modal" data-target="#createModal"><button class="btn btn-lg btn-success">Create New User</button></a>
		</div>
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
						{!! Form::open(['method'=>'PATCH', 'action'=>'AdminController@editUser']) !!}
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Name</label>
							<div class="col-md-8">
								<input type="text" name="name" class="form-control input-line" id="m_username">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Email</label>
							<div class="col-md-8">
								<input type="email" name="email" class="form-control input-line" id="m_email" disabled>
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Password</label>
							<div class="col-md-8">
								<input type="password" name="password" class="form-control input-line">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-8">
								<input type="password" name="password_confirmation" class="form-control input-line">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Staff/matrik number</label>
							<div class="col-md-8">
								<input type="text" name="matrik" class="form-control input-line" id="m_matrik">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Phone</label>
							<div class="col-md-8">
								<input type="text" name="phone" class="form-control input-line" id="m_phone">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Roles</label>
							<div class="col-md-8">
								<select class="form-control" name="roles_id"  id="m_roles_id">
									<option value="2">User</option>
									<option value="1">Admin</option>
								</select>
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Faculty</label>
							<div class="col-md-8">
								<select class="form-control" name="faculty" id="m_faculty">
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
						<input type="hidden" name="id" id="m_user_id">
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
	<!-- End Modal -->
	<!-- Modal -->
	<div id="createModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Create New User</h4>
				</div>
				<div class="modal-body">
					<div class="table-scrollable table-scrollable-borderless">
						{!! Form::open(['method'=>'POST', 'action'=>'AdminController@createUser']) !!}
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Name</label>
							<div class="col-md-8">
								<input type="text" name="name" class="form-control input-line" id="username" value="{{ old('name') }}">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Email</label>
							<div class="col-md-8">
								<input type="email" name="email" class="form-control input-line" id="email" value="{{ old('email') }}">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Password</label>
							<div class="col-md-8">
								<input type="password" name="password" class="form-control input-line" id="password">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-8">
								<input type="password" name="password_confirmation" class="form-control input-line" id="confirm_password">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Staff/matrik number</label>
							<div class="col-md-8">
								<input type="text" name="matrik" class="form-control input-line" id="">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Phone</label>
							<div class="col-md-8">
								<input type="text" name="phone" class="form-control input-line" id="">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Roles</label>
							<div class="col-md-8">
								<select class="form-control" name="roles_id"  id="">
									<option value="2">User</option>
									<option value="1">Admin</option>
								</select>
							</div>
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword1" class="col-md-4 control-label">Faculty</label>
							<div class="col-md-8">
								<select class="form-control" name="faculty" id="">
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
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-transparent blue btn-sm active submitUserBtn"> Submit </button>
					<button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
					{!! Form::close() !!}
				</div>
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
				var faculty = $(this).data('faculty');
				if(roles_id == 1){
					role = 'Admin';
				}
				else{
					role = 'User';
				}
				$("#m_user_id").val($(this).data('user_id'));
				$("#m_username").val($(this).data('username'));
				$("#m_email").val($(this).data('user_email'));
				$("#m_matrik").val($(this).data('matrik'));
				$("#m_phone").val($(this).data('phone'));
				$("#m_faculty").val(faculty);
				$("#m_roles_id").val(roles_id);
			});
//If selected role is admin, then disabled select faculty
$("#faculty_select").attr("disabled", true);
$("#roles_select").change(function(){
	if($("#roles_select").val() == '1'){
		$("#faculty_select").attr("disabled", true);
	}
	else{
		$("#faculty_select").attr("disabled", false);
	}
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
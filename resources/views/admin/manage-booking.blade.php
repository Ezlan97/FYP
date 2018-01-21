@extends('layouts.master')

@section('head')

@stop

@section('content')
<header class="masthead">
	<div class="overlay">
		<div class="container">
			<h1 style="color: #ffffff; font-size: 60px;">Manage Booking</h1>
			<h2 class="display-4 text-white"></h2>
		</div>
	</div>
</header>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="/homepage">Home</a></li>
	<li class="breadcrumb-item">Login</li>
	<li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
	<li class="breadcrumb-item">Manage Booking</li>
</ol>
<div class="row" style="padding-top: 60px; padding-bottom: 60px;">
	<div class="col-md-10 col-md-offset-1 well">
		<!-- BEGIN BORDERED TABLE PORTLET-->
		<div class="portlet box blue-dark">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-calendar font-white"></i>
					<span class="caption-subject font-white sbold uppercase">Booking Management</span>
				</div>
			</div>
			<div class="portlet-body">
				<div class="col-md-12 margin-bottom-15px padding-left-0px">
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
								<th> User Name </th>
								<th> Position </th>
								<th> Car Model </th>
								<th> Event Title </th>
								<th> Destination </th>
								<th> Passenger </th>
								<th> Departure Date </th>
								<th> Return Date </th>
								<th> File </th>
								<th>Action</th>
								<th> Status </th>
								<th> Remarks </th>
								<th> Summary </th>
							</tr>
						</thead>
						<tbody id="tbody">
							<?php $count = 1; ?>
							@if(count($histories) > 0)
							@foreach($histories as $history)
							<?php $currentPageTotalNumber = ($histories->currentPage() - 1) * 5; ?>
							<tr>
								<td><b>{{$count + $currentPageTotalNumber}} </b></td>
								<td> {{ $history->name }} </td>
								<td> {{ $history->position }} </td>
								<td> {{ $history->title }} </td>
								<td> {{ $history->event_title }} </td>
								<td> {{ $history->destination }} </td>
								<td class="text-center"> {{ $history->total_passenger }} </td>
								<td> {{ date('M j, Y H:i a', strtotime( $history->start_date )) }} </td>
								<td> {{ date('M j, Y H:i a', strtotime( $history->end_date )) }} </td>
								<td>
									<a class="btn btn-sm btn-success" href="{{ $directory.$history->filepath }}" download>
										Download
									</a>
								</td>
								<td>
									<a href="{{ route('admin.approve-reject-confirmation', $history->history_id ) }}" class="btn btn-sm btn-warning">Approve | Reject</a>
								</td>
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
								{{ $history->remarks }}
							</td>
							<td>
								<a class="btn btn-sm btn-primary btnPrint1" data-toggle="modal" data-target="#summaryModal{{ $history->history_id }}">
									View
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
	</div>
	<!-- END BORDERED TABLE PORTLET-->
	<div class="row">
		<div class="col-md-6">
			{{$histories->render()}}
		</div>
		<div class="col-md-6">
		</div>
	</div>
</div> 
</div>





{{-- MODAL --}}





<!-- Summary Modal -->
@foreach($histories as $history)
<div id="summaryModal{{ $history->history_id }}" class="modal fade printable" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Booking Info</h3>
			</div>
			<div class="modal-body">
				<div class="row">

					{{-- User Info --}}
					<h4 class="text-center col-md-12" style="font-weight:bold;">User Info</h4>
					<p></p>

					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Name :</label>
						<div class="col-md-8">
							<p>{{ $history->name }}</p>
						</div>
					</div>

					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Position :</label>
						<div class="col-md-8">
							<p>{{ $history->position }}</p>
						</div>
					</div>

					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Staff/matrik number :</label>
						<div class="col-md-8">
							<p>{{ Auth::user()->matrik }}</p>
						</div>
					</div>

					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Faculty :</label>
						<div class="col-md-8">
							<p>{{ Auth::user()->faculty }}</p>
						</div>
					</div>

					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Phone :</label>
						<div class="col-md-8">
							<p>{{ Auth::user()->phone }}</p>
						</div>
					</div>

					{{-- Journey Info --}}
					<h4 class="text-center col-md-12" style="font-weight:bold;">Journey Info</h4>
					<p></p>

					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Event Title :</label>
						<div class="col-md-8">
							<p>{{ $history->event_title }}</p>
						</div>
					</div>

					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Destination :</label>
						<div class="col-md-8">
							<p>{{ $history->destination }}</p>
						</div>
					</div>

					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Purpose :</label>
						<div class="col-md-8">
							<p>{{ $history->purpose }}</p>
						</div>
					</div>

					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Total Passenger :</label>
						<div class="col-md-8">
							<p>{{ $history->total_passenger }}</p>
						</div>
					</div>

					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Departure Date :</label>
						<div class="col-md-8">
							<p>{{ date('M j, Y H:i a', strtotime( $history->start_date )) }}</p>
						</div>
					</div>

					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Return Date :</label>
						<div class="col-md-8">
							<p>{{ date('M j, Y H:i a', strtotime( $history->end_date )) }}</p>
						</div>
					</div>

					{{-- Vehicle Info --}}
					<h4 class="text-center col-md-12" style="font-weight:bold;">Vehicle Info</h4>
					<p></p>	

					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Vehicle Type :</label>
						<div class="col-md-8">
							<p>{{ $history->type }}</p>
						</div>
					</div>

					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Vehicle Model :</label>
						<div class="col-md-8">
							<p>{{ $history->title }}</p>
						</div>
					</div>

					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Vehicle Plate No :</label>
						<div class="col-md-8">
							<p>{{ $history->plate }}</p>
						</div>
					</div>

					{{-- Status Info --}}
					<h4 class="text-center col-md-12" style="font-weight:bold;">Status Info</h4>
					<p></p>

					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Status Info</label>
						<div class="col-md-8">
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
					</div>
				</div>

			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" onclick="window.print();">Print</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>

</div>
</div>
@endforeach
<!-- End Modal -->

<!-- Modal -->
<div id="vehicleModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Vehicle Info</h4>
			</div>
			<div class="modal-body">
				<div class="row">

					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Model</label>
						<div class="col-md-8">
							<input type="text" name="title" class="form-control input-line" id="m_vehicle_model" disabled>
						</div>
					</div>
					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Plate</label>
						<div class="col-md-8">
							<input type="text" name="plate" class="form-control input-line" id="m_vehicle_plate" disabled>
						</div>
					</div>
					<div class="form-group col-md-12">
						<label for="inputPassword1" class="col-md-4 control-label">Type</label>
						<div class="col-md-8">
							<input type="text" name="type" class="form-control input-line" id="m_vehicle_type" disabled>
						</div>
					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div id="remarksModal" class="modal fade" role="dialog">
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
						<textarea id="m_remarks" class="form-control" readonly=""></textarea>
					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
<!-- End Modal -->



@stop

@section('script')

<script src="../../assets/global/plugins/icheck/icheck.min.js"></script>

<script src="../../assets/admin/pages/scripts/form-icheck.js"></script>

<script> FormiCheck.init();  </script>

<script>
	function myFunction() {
		if($('#filter_status').val() == ''){
			window.location.href = '/admin/manage-booking';
		}
		else{
			window.location.href = '/admin/manage-booking/?status=' + $( "#filter_status" ).val();
		}
	}

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

		$('.showUser').click(function(){
			var faculty = $(this).data('faculty');

			$("#m_user_id").val($(this).data('user_id'));
			$("#m_username").val($(this).data('username'));
			$("#m_email").val($(this).data('user_email'));
			$("#m_matrik").val($(this).data('matrik'));
			$("#m_phone").val($(this).data('phone'));
			$("#m_faculty").val(faculty);

		});

		$('.showVehicle').click(function(){

			$("#m_vehicle_model").val($(this).data('vehicle_model'));
			$("#m_vehicle_plate").val($(this).data('vehicle_plate'));
			$("#m_vehicle_type").val($(this).data('vehicle_type'));
		});

		$('.showRemarks').click(function(){
			$("textarea#m_remarks").val($(this).data('remarks'));
		});
	});

	$().ready(function () {
    $('.modal.printable').on('shown.bs.modal', function () {
        $('.modal-dialog', this).addClass('focused');
        $('body').addClass('modalprinter');

        if ($(this).hasClass('autoprint')) {
            window.print();
        }
    }).on('hidden.bs.modal', function () {
        $('.modal-dialog', this).removeClass('focused');
        $('body').removeClass('modalprinter');
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
	@include('errors.validation-errors-script')

	@stop
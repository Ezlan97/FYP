<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>fullCalendar and Laravel 5.3</title>
	<link href="{{ asset('css/one-page-wonder.css') }}" rel="stylesheet">
	{!! Html::style('vendor/seguce92/bootstrap/css/bootstrap.min.css') !!}
	{!! Html::style('vendor/seguce92/fullcalendar/fullcalendar.min.css') !!}
	{!! Html::style('vendor/seguce92/bootstrap-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}
	{!! Html::style('vendor/seguce92/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') !!}
</head>

{{-- style --}}
<style type="text/css">

body {
	padding-top: 0px;
}

@media (min-width: 768px) {
	.navbar-nav {
		float: none;
	}
}

.nav.navbar-nav {
	display: flex;
	justify-content: center;
	flex-wrap: wrap;
	margin-right: 20px;
}

.nav-item {
	margin-right: 26px;
}

footer {
	background-color: #2d2d30;
	color: #f5f5f5;
	padding: 32px;
}
</style>

{{-- body --}}
<body>
	{{-- navbar --}}
	<nav class="navbar navbar-inverse navbar-fixed-top" style="padding-bottom: 3px; padding-top: 3px;">
		<div class="container">
			<div class="collapse navbar-collapse" id="navbarResponsive">
				@if (Auth::guest())
				<ul class="navbar-nav nav" style="font-size: 16px">
					<li class="nav-item px-lg-4"><a class="nav-link" href="/homepage">Home</a></li>
					<li class="nav-item px-lg-4"><a class="nav-link" href="calender">Check Booking Availability</a></li>
					<li class="nav-item px-lg-4"><a class="nav-link" href="{{ url('login') }}">Login</a></li>
					<li class="nav-item px-lg-4"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
				</ul>
				@elseif(Auth::user()->roles_id>1)
				<ul class="navbar-nav nav" style="font-size: 16px">
					<li class="nav-item px-lg-4"><a class="nav-link" href="/homepage">Home</a></li>
					<li class="nav-item px-lg-4"><a class="nav-link" href="calender">Check Booking Availability</a></li>
					<li class="nav-item px-lg-4"><a class="nav-link" href="/admin">Booking</a></li>
					<li class="nav-item px-lg-4"><a class="nav-link" href="{{ url('/logout') }}">Log Out</a></li>
				</ul>
				@else
				<ul class="navbar-nav nav" style="font-size: 16px">
					<li class="nav-item px-lg-4"><a class="nav-link" href="/homepage">Home</a></li>
					<li class="nav-item px-lg-4"><a class="nav-link" href="/calender">Check Booking Availability</a></li>
					<li class="nav-item px-lg-4"><a class="nav-link" href="/admin">Dashboard</a></li>
					<li class="nav-item px-lg-4"><a class="nav-link" href="{{ url('/logout') }}">Log Out</a></li>
				</ul>
				@endif
			</div>
		</div>
	</nav>

	{{-- header --}}
	@if (Auth::guest())

	<header class="masthead">
		<div class="overlay">
			<div class="container">
				<h1 style="color: #ffffff; font-size: 60px;">Please Register Or Login</h1>
				<h2 class="display-4 text-white" style="color: #ffffff; font-size: 40px;">To Check Before Book</h2>
			</div>
		</div>
	</header>

	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/homepage">Home</a></li>
		<li class="breadcrumb-item active">Check Availability</li>
	</ol>

	@else
	<header class="masthead">
		<div class="overlay">
			<div class="container">
				<h1 style="color: #ffffff; font-size: 60px;">Save Your Time</h1>
				<h2 class="display-4 text-white" style="color: #ffffff; font-size: 40px;">Check Before Book</h2>
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
				<div class="alert alert-info" role="alert">
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

	{{-- calender --}}
	<div class="container" style="padding-bottom: 100px; padding-top: 100px;">

		<div id='calendar'></div>

		<div id="modal-event" class="modal fade" tabindex="-1" data-backdrop="static">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4>Vehicle Detail</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							{{ Form::label('_event_title', 'Event Title') }}
							{{ Form::text('_event_title', old('_event_title'), ['class' => 'form-control', 'readonly']) }}
						</div>

						<div class="form-group">
							{{ Form::label('_title', 'Vehicle') }}
							{{ Form::text('_title', old('_title'), ['class' => 'form-control', 'readonly']) }}
						</div>

						<div class="form-group">
							{{ Form::label('_date_start', 'Event Start Date') }}
							{{ Form::text('_date_start', old('_date_start'), ['class' => 'form-control', 'readonly' => 'true']) }}
						</div>

						<div class="form-group">
							{{ Form::label('_date_end', 'Event End Date') }}
							{{ Form::text('_date_end', old('_date_end'), ['class' => 'form-control', 'readonly']) }}
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-dafault" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

	</div>
	@endif

	{{-- footer --}}
	<footer class="bg-dark text-white" style="padding-top: 30px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-sm-6 mb-4">
					<h5>Location</h5>
					<p>Kolej Universiti Islam Antarabangsa Selangor
						<br> Bandar Seri Putra,
						<br> 43600 Bangi,
						<br> Selangor Darul Ehsan.</p>
					</div>
					<div class="col-lg-4 col-sm-6 mb-4">
						<h5>Contact Us</h5>
						<p>Phone : 603-8925 4251
							<br> Fax : 603-8926 8462
							<br> Facebook   : (KUIS) Kolej Universiti Islam Antarabangsa Selangor
							<br> Email : info@kuis.edu.my
							<br>
						</div>
						<div class="col-lg-4 col-sm-6 mb-4">
							<h5>About Us</h5>
							<p>KUIS is committed to ensuring that every program offered is competitive, competitive and qualified and meets Malaysian Qualifications Agency (MQA) certification. http://www.mqa.gov.my/.</p>
						</div>
					</div>
					<hr>
					<div class="copyrights">
						<div class="row">
							<div class="col-sm-6">
								<p>&copy; 2017 Kuis Transportation Booking System. All rights reserved.</p>
							</div>
							<div class="col-sm-6 text-right">
								<p>Created
								by Shuhadah</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</body>

	{!! Html::script('vendor/seguce92/jquery.min.js') !!}
	{!! Html::script('vendor/seguce92/bootstrap/js/bootstrap.min.js') !!}
	{!! Html::script('vendor/seguce92/fullcalendar/lib/moment.min.js') !!}
	{!! Html::script('vendor/seguce92/fullcalendar/fullcalendar.min.js') !!}
	{!! Html::script('vendor/seguce92/bootstrap-datetimepicker/js/bootstrap-material-datetimepicker.js') !!}
	{!! Html::script('vendor/seguce92/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') !!}

	<script>
		var BASEURL = "{{ url('/') }}";
		$(document).ready(function() {

			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,basicWeek,basicDay'
				},
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                selectable: true,
                selectHelper: true,

                select: function(start){
                	start = moment(start.format());
                	$('#date_start').val(start.format('YYYY-MM-DD'));
                	$('#responsive-modal').modal('show');
                },

                events: BASEURL + '/events',

                eventClick: function(event, jsEvent, view){
                	var date_start = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
                	var time_start = $.fullCalendar.moment(event.start).format('hh:mm:ss');
                	var date_end = $.fullCalendar.moment(event.end).format('YYYY-MM-DD hh:mm:ss');
                	$('#modal-event #delete').attr('data-id', event.id);
                	$('#modal-event #_title').val(event.title);
                	$('#modal-event #_destination').val(event.destination);
                	$('#modal-event #_event_title').val(event.event_title);
                	$('#modal-event #_desc').val(event.desc);
                	$('#modal-event #_date_start').val(date_start);
                	$('#modal-event #_time_start').val(time_start);
                	$('#modal-event #_date_end').val(date_end);
                	$('#modal-event #_color').val(event.color);
                	$('#modal-event').modal('show');
                }
            });

		});

		// $('.colorpicker').colorpicker();

		// $('#time_start').bootstrapMaterialDatePicker({
		// 	date: false,
		// 	shortTime: false,
		// 	format: 'HH:mm:ss'
		// });

		// $('#date_end').bootstrapMaterialDatePicker({
		// 	date: true,
		// 	shortTime: false,
		// 	format: 'YYYY-MM-DD HH:mm:ss'
		// });

		// $('#delete').on('click', function(){
		// 	var x = $(this);
		// 	var delete_url = x.attr('data-href')+'/'+x.attr('data-id');

		// 	$.ajax({
		// 		url: delete_url,
		// 		type: 'PATCH',
		// 		success: function(result){
		// 			$('#modal-event').modal('hide');
		// 			alert(result.message);
		// 		},
		// 		error: function(result){
		// 			$('#modal-event').modal('hide');
		// 			alert(result.message);
		// 		}
		// 	});
		// });

	</script>
	</html>

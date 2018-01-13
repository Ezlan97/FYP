<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<?php date_default_timezone_set("Asia/Kuala_Lumpur"); ?>
	<meta charset="utf-8"/>
	<title>KUIS - Transportation Booking System</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/clockface/css/clockface.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>
	<!-- END PAGE LEVEL STYLES -->
	<!-- BEGIN THEME STYLES -->
	<!-- END THEME STYLES -->
	<!-- Alertrify -->
	<script src="{{ asset('assets/alertrify/js/alertify.min.js') }}"></script>
	<!-- include the style -->
	<link rel="stylesheet" href="{{ asset('assets/alertrify/css/alertify.min.css') }}" />
	<!-- include a theme -->
	<link rel="stylesheet" href="{{ asset('assets/alertrify/css/themes/default.min.css') }}" />
	<!-- Sweet Alert -->
	<script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}">
	<!-- Bttn.Surge -->
	<link rel="stylesheet" href="{{ asset('assets/bttn.surge/bttn.min.css') }}">
	<link href="{{ asset('css/one-page-wonder.css') }}" rel="stylesheet">
	{!! Html::style('vendor/seguce92/fullcalendar/fullcalendar.min.css') !!}
	{!! Html::style('vendor/seguce92/bootstrap-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}

	<!-- Custom CSS -->
	<style>
	.navbar {
		position: relative;
		min-height: 50px;
		margin-bottom: 0px;
		border: 1px solid transparent;
	}
	body {
		padding-top: 0px;
	}
	
	@media (min-width: 768px) {
		.navbar-nav {
			float: none;
		}
	}

	.nav.navbar-nav {
		color: #343A40;
		display: flex;
		justify-content: center;
		flex-wrap: wrap;
	}

	.nav-item {
    margin-right: 26px;
	}

	@media print {
		body.modalprinter * {
			visibility: hidden;
		}

		body.modalprinter .modal-dialog.focused {
			position: absolute;
			padding: 0;
			margin: 0;
			left: 0;
			top: 0;
		}

		body.modalprinter .modal-dialog.focused .modal-content {
			border-width: 0;
		}

		body.modalprinter .modal-dialog.focused .modal-content .modal-header .modal-title,
		body.modalprinter .modal-dialog.focused .modal-content .modal-body,
		body.modalprinter .modal-dialog.focused .modal-content .modal-body * {
			visibility: visible;
		}

		body.modalprinter .modal-dialog.focused .modal-content .modal-header,
		body.modalprinter .modal-dialog.focused .modal-content .modal-body {
			padding: 0;
		}

		body.modalprinter .modal-dialog.focused .modal-content .modal-header .modal-title {
			margin-bottom: 20px;
		}
	}

	footer {
		background-color: #2d2d30;
		color: #f5f5f5;
		padding: 32px;
	}
</style>
@yield('head')
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" style="padding-bottom: 3px; padding-top: 3px;">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarResponsive">
                @if(Auth::user()->roles_id>1)
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
	@yield('content')
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
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
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<script src="/../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="/../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="/../assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
	<script src="/../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
	<script src="/../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="/../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="/../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
	<script src="/../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
	<script src="/../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="/../assets/global/scripts/metronic.js" type="text/javascript"></script>
	<script src="/../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
	<script src="/../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
	<script src="/../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
	<script src="/../assets/admin/pages/scripts/components-pickers.js"></script>
	<script src="{{asset('assets/scripts/printPage.js') }}"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- Clock -->
	<script type="text/javascript">
		<!--
		function updateClock ( )
		{
			var currentTime = new Date ( );
			var currentHours = currentTime.getHours ( );
			var currentMinutes = currentTime.getMinutes ( );
			var currentSeconds = currentTime.getSeconds ( );
	// Pad the minutes and seconds with leading zeros, if required
	currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
	currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;
	// Choose either "AM" or "PM" as appropriate
	var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";
	// Convert the hours component to 12-hour format if needed
	currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
	// Convert an hours component of "0" to "12"
	currentHours = ( currentHours == 0 ) ? 12 : currentHours;
	// Compose the string for display
	var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
	// Update the time display
	document.getElementById("clock").firstChild.nodeValue = currentTimeString;
}

</script>
@yield('script')
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
{!! Html::script('vendor/seguce92/jquery.min.js') !!}
{!! Html::script('vendor/seguce92/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('vendor/seguce92/fullcalendar/lib/moment.min.js') !!}
{!! Html::script('vendor/seguce92/fullcalendar/fullcalendar.min.js') !!}
{!! Html::script('vendor/seguce92/bootstrap-datetimepicker/js/bootstrap-material-datetimepicker.js') !!}
<script>

	$('#date_start').bootstrapMaterialDatePicker({
		date: true,
		shortTime: false,
		format: 'YYYY-MM-DD HH:mm:ss'
	});


	$('#date_end').bootstrapMaterialDatePicker({
		date: true,
		shortTime: false,
		format: 'YYYY-MM-DD HH:mm:ss'
	});

	$('#date_start1').bootstrapMaterialDatePicker({
		date: true,
		shortTime: false,
		format: 'YYYY-MM-DD HH:mm:ss'
	});


	$('#date_end2').bootstrapMaterialDatePicker({
		date: true,
		shortTime: false,
		format: 'YYYY-MM-DD HH:mm:ss'
	});


	$('#delete').on('click', function(){
		var x = $(this);
		var delete_url = x.attr('data-href')+'/'+x.attr('data-id');
		$.ajax({
			url: delete_url,
			type: 'PATCH',
			success: function(result){
				$('#modal-event').modal('hide');
				alert(result.message);
			},
			error: function(result){
				$('#modal-event').modal('hide');
				alert(result.message);
			}
		});
	});


	$(document.body)
	.on('show.bs.modal', function () {
		if (this.clientHeight <= window.innerHeight) {
			return;
		}
    // Get scrollbar width
    var scrollbarWidth = getScrollBarWidth()
    if (scrollbarWidth) {
    	$(document.body).css('padding-right', scrollbarWidth);
    	$('.navbar-fixed-top').css('padding-right', scrollbarWidth);    
    }
})
	.on('hidden.bs.modal', function () {
		$(document.body).css('padding-right', 0);
		$('.navbar-fixed-top').css('padding-right', 0);
	});


	function getScrollBarWidth () {
		var inner = document.createElement('p');
		inner.style.width = "100%";
		inner.style.height = "200px";

		var outer = document.createElement('div');
		outer.style.position = "absolute";
		outer.style.top = "0px";
		outer.style.left = "0px";
		outer.style.visibility = "hidden";
		outer.style.width = "200px";
		outer.style.height = "150px";
		outer.style.overflow = "hidden";
		outer.appendChild (inner);

		document.body.appendChild (outer);
		var w1 = inner.offsetWidth;
		outer.style.overflow = 'scroll';
		var w2 = inner.offsetWidth;
		if (w1 == w2) w2 = outer.clientWidth;

		document.body.removeChild (outer);

		return (w1 - w2);
	};
</script>
</html>
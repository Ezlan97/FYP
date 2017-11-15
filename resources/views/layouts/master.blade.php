<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.1
Version: 3.6.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<?php date_default_timezone_set("Asia/Kuala_Lumpur"); ?>
	<meta charset="utf-8"/>
	<title>AHDA</title>
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
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css') }}"/>
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

	<!-- Custom CSS -->


	@yield('head')
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				@if (Auth::guest())
				<ul class="navbar-nav mx-auto">
					<li class="nav-item px-lg-4"><a class="nav-link" href="/homepage">Home</a></li>
					<li class="nav-item px-lg-4"><a class="nav-link" href="calender">Check Booking Availability</a></li>
					<li class="nav-item px-lg-4"><a class="nav-link" href="{{ url('login') }}">Login</a></li>
					<li class="nav-item px-lg-4"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
				</ul>
				@else
				<ul class="navbar-nav mx-auto">
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
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
</div>
<!-- /.container -->
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
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="/../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="/../assets/global/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="/../assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="/../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="/../assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="/../assets/admin/pages/scripts/components-pickers.js"></script>
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

// -->
</script>

<script>
	jQuery(document).ready(function() {       
           // initiate layout and plugins
           Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
ComponentsPickers.init();
});   
</script>
@yield('script')
<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>
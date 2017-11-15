<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>Ahda</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">
  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Pathway+Gothic+One|PT+Sans+Narrow:400+700|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <!-- Fonts END -->
  <!-- Global styles BEGIN -->
  <link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../assets/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css" rel="stylesheet">
  <!-- Global styles END -->
  <!-- Page level plugin styles BEGIN -->
  <link href="../../assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <!-- Page level plugin styles END -->
  <!-- Theme styles BEGIN -->
  <link href="../../assets/global/css/components.css" rel="stylesheet">
  <link href="../../assets/frontend/onepage/css/style.css" rel="stylesheet">
  <link href="../../assets/frontend/onepage/css/style-responsive.css" rel="stylesheet">
  <link href="../../assets/frontend/onepage/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="../../assets/frontend/onepage/css/custom.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/clockface/css/clockface.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>
  {!! Html::style('vendor/seguce92/bootstrap/css/bootstrap.min.css') !!}
  {!! Html::style('vendor/seguce92/fullcalendar/fullcalendar.min.css') !!}
  {!! Html::style('vendor/seguce92/bootstrap-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}
  {!! Html::style('vendor/seguce92/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') !!}
  <!-- Theme styles END -->

  <style type="text/css">
  .datepicker.dropdown-menu {
    z-index: 10000 !important;
  }
  .bg1 {
    background-color: blue;
  }
</style>
</head>
<!--DOC: menu-always-on-top class to the body element to set menu on top -->
<body>
  <!-- Header BEGIN -->
  <div class="header header-mobi-ext">
    <div class="container">
      <div class="row">
        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
        <!-- Navigation BEGIN -->
        <div class="col-md-9">
          <ul class="header-navigation">
            <li class="current"><a href="/">Home</a></li>
            <li><a href="#contact">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="{{ url('check-availability') }}">Check Booking Availability</a></li>
            <li><a href="{{ url('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
          </ul>
        </div>
        <!-- Navigation END -->
      </div>
    </div>
  </div>
  <!-- Header END -->
  <!-- Promo block BEGIN -->
  <div class="promo-block" id="promo-block">
    <div class="tp-banner-container">
      <div class="tp-banner" >
        <ul>
          <li data-transition="fade" data-slotamount="5" data-masterspeed="700" data-delay="9400" class="slider-item-1">
            <img src="image/head2.jpg" alt="" data-bgfit="cover" style="opacity:0.4 !important;" data-bgposition="center center" data-bgrepeat="no-repeat">
            <div class="tp-caption large_text customin customout start"
            data-x="center"
            data-hoffset="0"
            data-y="center"
            data-voffset="60"
            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
            data-speed="1000"
            data-start="500"
            data-easing="Back.easeInOut"
            data-endspeed="300">
            <div class="promo-like"><i class="fa fa-car"></i></div>
            <div class="promo-like-text">
              <h2>Book Faster!</h2>
              <p>Book KUIS vehicle  <a href="{{ url('login') }}">faster and easier</a> here..</p>
            </div>
          </div>
          <div class="tp-caption large_bold_white fade"
          data-x="center"
          data-y="center"
          data-voffset="-110"
          data-speed="300"
          data-start="1700"
          data-easing="Power4.easeOut"
          data-endspeed="500"
          data-endeasing="Power1.easeIn"
          data-captionhidden="off"
          style="z-index: 6">Kuis<span> Transportation</span> Booking System 
        </div>
      </li>
      <li data-transition="fadefromright" data-slotamount="5" data-masterspeed="700" data-delay="9400" class="slider-item-2">
        <img src="image/head2.jpg" alt="slidebg2" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
        <div class="caption lft start"
        data-y="center"
        data-voffset="40"
        data-x="center"
        data-hoffset="-250"
        data-speed="600" 
        data-start="500" 
        data-easing="easeOutBack"><img src="" alt="">
      </div>
      <div class="caption lft start"
      data-y="center"
      data-voffset="130"
      data-x="center"
      data-hoffset="170"
      data-speed="600" 
      data-start="1200" 
      data-easing="easeOutBack"><img src="" alt="">
    </div>
    <div class="tp-caption large_bold_white fade"
    data-x="center"
    data-y="40"
    data-speed="300"
    data-start="1700"
    data-easing="Power4.easeOut"
    data-endspeed="500"
    data-endeasing="Power1.easeIn"
    data-captionhidden="off"
    style="z-index: 6">Time <span>Saving</span> System
  </div>
</li>
</ul>
</div>
</div>
</div>
<!-- Promo block END -->

<!-- BEGIN PRE-FOOTER -->
<div class="pre-footer" id="check-date">
  <div class="container">
    <div class="row">
      @yield('content')
      
    </div>
    <!-- END BOTTOM ABOUT BLOCK -->
  </div>
  <!-- BEGIN FOOTER -->
  <div class="footer">
    <div class="container">
      <div class="row">
        <!-- BEGIN COPYRIGHT -->
        <div class="col-md-12 text-center">
          <div class="copyright">2017 © Ahda. ALL Rights Reserved.</div>
        </div>
        <!-- END COPYRIGHT -->
      </div>
    </div>
  </div>
  <!-- END FOOTER -->
  <a href="#promo-block" class="go2top scroll"><i class="fa fa-arrow-up"></i></a>
  <!--[if lt IE 9]>
  <script src="../../assets/global/plugins/respond.min.js"></script>
<![endif]-->
<!-- Load JavaScripts at the bottom, because it will reduce page load time -->
<!-- Core plugins BEGIN (For ALL pages) -->
<script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Core plugins END (For ALL pages) -->
<!-- BEGIN RevolutionSlider -->
<script src="../../assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
<script src="../../assets/frontend/onepage/scripts/revo-ini.js" type="text/javascript"></script> 
<!-- END RevolutionSlider -->
<!-- Core plugins BEGIN (required only for current page) -->
<script src="../../assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="../../assets/global/plugins/jquery.easing.js"></script>
<script src="../../assets/global/plugins/jquery.parallax.js"></script>
<script src="../../assets/global/plugins/jquery.scrollTo.min.js"></script>
<script src="../../assets/frontend/onepage/scripts/jquery.nav.js"></script>
<!-- Core plugins END (required only for current page) -->
<!-- Global js BEGIN -->
<script src="../../assets/frontend/onepage/scripts/layout.js" type="text/javascript"></script>

<script src="/../assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="/../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="/../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

<script type="text/javascript" src="/../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="/../assets/global/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="/../assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="/../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="/../assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<script src="/../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="/../assets/admin/pages/scripts/components-pickers.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

{!! Html::script('vendor/seguce92/jquery.min.js') !!}
{!! Html::script('vendor/seguce92/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('vendor/seguce92/fullcalendar/lib/moment.min.js') !!}
{!! Html::script('vendor/seguce92/fullcalendar/fullcalendar.min.js') !!}
{!! Html::script('vendor/seguce92/bootstrap-datetimepicker/js/bootstrap-material-datetimepicker.js') !!}
{!! Html::script('vendor/seguce92/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') !!}

<script>
  $(document).ready(function() {
          Metronic.init(); // init metronic core components
          Layout.init(); // init current layout
          QuickSidebar.init(); // init quick sidebar
          Demo.init(); // init demo features
          ComponentsPickers.init();
        });

  $(document).ready(function () {
        // Handler for .ready() called.
        $('html, body').animate({
          scrollTop: $('#check-date').offset().top
        }, 'slow');
      });

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
                    $('#modal-event #_date_start').val(date_start);
                    $('#modal-event #_time_start').val(time_start);
                    $('#modal-event #_date_end').val(date_end);
                    $('#modal-event #_color').val(event.color);
                    $('#modal-event').modal('show');
                }
        });

      });

        $('.colorpicker').colorpicker();

        $('#time_start').bootstrapMaterialDatePicker({
            date: false,
            shortTime: false,
            format: 'HH:mm:ss'
        });

        $('#date_end').bootstrapMaterialDatePicker({
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
  
    </script>
    <!-- Global js END -->
  </body>
  </html>
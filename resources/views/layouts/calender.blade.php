<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KUIS Vehicle Booking System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.css" rel="stylesheet">
    {!! Html::style('vendor/seguce92/fullcalendar/fullcalendar.min.css') !!}
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
    <!-- Footer -->
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
                                <p>Created with
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
    <script>
        var BASEURL = "{{ url('/') }}";
        $(document).ready(function() {
            $('#calendar').fullCalendar(
            {
                title: 'model',
                header: {
                    left: 'next today',
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
                    $('#modal-event #_title').val(vehicle.title);
                    $('#modal-event #_date_start').val(date_start);
                    $('#modal-event #_time_start').val(time_start);
                    $('#modal-event #_date_end').val(date_end);
                    $('#modal-event #_color').val(event.color);
                    $('#modal-event').modal('show');
                }
            });
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
    </html>
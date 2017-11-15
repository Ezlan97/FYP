
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>One Page Wonder - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
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
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
</div>
<!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>


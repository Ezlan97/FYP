@extends('layouts.app')
@section('content')
<header class="masthead">
  <div class="overlay">
    <div class="container">
      <h1 class="display-1 text-white"></h1>
      <h2 class="display-4 text-white">KUIS Transportation Booking System</h2>
    </div>
  </div>
</header>
<section>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 order-2">
        <div class="p-5">
          <img class="img-fluid rounded-circle" src="image/car.jpg" alt="">
        </div>
      </div>
      <div class="col-md-6 order-1">
        <div class="p-5">
          <h2 class="display-4">Car</h2>
          <p>We offer you a wide range of new high-quality vehicles for the automotive class to meet your needs and budget the best choice.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="p-5">
          <img class="img-fluid rounded-circle" src="image/bus.jpg" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="p-5">
          <h2 class="display-4">Bus</h2>
          <p>Charter buses are great for all types of events where you need transport of larger groups. Charter buses take up to 56 passengers, they have great storragae facilities, airconditioning and wifi. Many charter buses have additional facilities such as freezer and USB ports.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 order-2">
        <div class="p-5">
          <img class="img-fluid rounded-circle" src="image/van.jpg" alt="">
        </div>
      </div>
      <div class="col-md-6 order-1">
        <div class="p-5">
          <h2 class="display-4">Van</h2>
          <p>For individuals or businesses that require a vehicle with a single large enclosed area, a van could be a leading choice for drivers. Capable of securely holding a large amount of cargo or passengers, vans are significantly styled for practicality rather than other factors such as performance. From the 1930s to the 1980s, vans were almost entirely based on truck-like chassis structures.</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
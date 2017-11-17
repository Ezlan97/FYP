@extends('layouts.app')
@section('content')
@section('content')
<header class="masthead">
  <div class="overlay">
    <div class="container">
      <h1 class="display-1 text-white">Welcome {{ Auth::user()->name }} </h1>
      <h2 class="display-4 text-white">KUIS Transportation Booking System</h2>
    </div>
  </div>
</header>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/homepage">Home</a></li>
  <li class="breadcrumb-item">Login</li>
  <li class="breadcrumb-item">Dashboard</li>
</ol>
<div class="container">
  <h1 class="my-4 text-center">Current Status</h1>
  <div class="row">
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading text-center">Total Vehicle</h4>
        <hr>
        <p class="mb-0 text-center"><span data-counter="counterup" data-value="">{{ count($vehicles) }}</span></p>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading text-center">Approved Booking</h4>
        <hr>
        <p class="mb-0 text-center"><span data-counter="counterup" data-value="">{{ count($approved) }}</span></p>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading text-center">Rejected Booking</h4>
        <hr>
        <p class="mb-0 text-center"><span data-counter="counterup" data-value="">{{ count($rejected) }}</span></p>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading text-center">Pending Booking</h4>
        <hr>
        <p class="mb-0 text-center"><span data-counter="counterup" data-value="">{{ count($pending) }}</span></p>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <h1 class="my-4 text-center">Manage</h1>
  <!-- Marketing Icons Section -->
  <div class="row text-center">
    <div class="col-lg-4 mb-4">
      <div class="card h-100">
        <h4 class="card-header">User Management</h4>
        <div class="card-body">
          <p class="card-text">Create,update,delete and check user booking history.</p>
        </div>
        <div class="card-footer">
          <a href="{{ route('admin.manage-user') }}" class="btn btn-primary">Manage</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4">
      <div class="card h-100">
        <h4 class="card-header">Booking Management</h4>
        <div class="card-body">
          <p class="card-text">Check booking status, determine user vehicle, download user file, accept and reject booking request and make a remark for user.</p>
        </div>
        <div class="card-footer">
          <a href="{{ route('admin.manage-booking') }}" class="btn btn-primary">Manage</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4">
      <div class="card h-100">
        <h4 class="card-header">Vehicle Management</h4>
        <div class="card-body">
          <p class="card-text">Create,update and delete vehicle.</p>
        </div>
        <div class="card-footer">
          <a href="{{ route('admin.manage-vehicle') }}" class="btn btn-primary">Manage</a>
        </div>
      </div>
    </div>
  </div>
</div>
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
});
</script>
@include('errors.validation-errors')
@include('errors.validation-errors-script')
@stop
@endsection
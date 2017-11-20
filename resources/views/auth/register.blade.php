@extends('layouts.app')
@section('content')
<header class="masthead">
    <div class="overlay">
        <div class="container">
            <h1 style="color: #ffffff; font-size: 60px;">Register To Book</h1>
            <h2 class="display-4 text-white"></h2>
        </div>
    </div>
</header>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/homepage">Home</a></li>
    <li class="breadcrumb-item">Register</li>
</ol>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2" style="padding-top: 100px; padding-bottom: 100px;">
            <div class="card m-t-50">
                <div class="card-body">
                    <h2>Register</h2>
                    <hr>
                    <!-- BEGIN REGISTRATION FORM -->
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <p class="hint" style="font-size: medium; color: #000000;">
                            Fill up your information
                        </p>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Name</label>
                            <input class="form-control " type="text" placeholder="Fullname" name="name" value="{{ old('name') }}" required/>
                        </div>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Email</label>
                            <input class="form-control " type="text" autocomplete="off" placeholder="E-mail Address" name="email" value="{{ old('email') }}" required/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Position</label>
                            <select class="form-control" name="position">
                                <option value="" disabled selected>Select</option>
                                <option value="Student">Student</option>
                                <option value="Lecture">Lecture</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Faculty</label>
                            <select class="form-control" name="faculty" required>
                                <option value="" disabled selected>Faculty</option>
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
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Phone No.</label>
                            <input class="form-control " type="text" autocomplete="off" placeholder="Phone No." name="phone" value="{{ old('phone') }}" required/>
                        </div>
                        <p class="hint" style="font-size: medium; padding-top: 30px; color: #000000;">
                            Fill up login information
                        </p>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Staff/Matrics No.</label>
                            <input class="form-control " type="text" autocomplete="off" placeholder="Staff/Matrics No." name="matrik" value="{{ old('matrik') }}" required/>
                        </div>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Password</label>
                            <input class="form-control " type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" required/>
                        </div>
                        <div class="form-group" style="margin-bottom: 45px;">
                            <label class="control-label visible-ie8 visible-ie9">Password Confirmation</label>
                            <input class="form-control " type="password" autocomplete="off" placeholder="Password Confirmation" name="password_confirmation"/>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" id="register-submit-btn" class="btn btn-primary text-center" style="min-width: 120px">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END REGISTRATION FORM -->
@endsection
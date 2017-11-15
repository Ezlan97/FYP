    @extends('layouts.app')
    @section('content')
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
                        <label class="control-label visible-ie8 visible-ie9">Staff/Matrics No.</label>
                        <input class="form-control " type="text" autocomplete="off" placeholder="Staff/Matrics No." name="matrik" value="{{ old('matrik') }}" required/>
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
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <input class="form-control " type="text" autocomplete="off" placeholder="E-mail Address" name="email" value="{{ old('email') }}" required/>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control " type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" required/>
                </div>
                <div class="form-group" style="margin-bottom: 45px;">
                    <label class="control-label visible-ie8 visible-ie9">Password Confirmation</label>
                    <input class="form-control " type="password" autocomplete="off" placeholder="Password Confirmation" name="password_confirmation"/>
                </div>
        <!--
        <div class="form-group margin-top-20 margin-bottom-20">
            <label class="check">
            <input type="checkbox" name="tnc"/>
            <span class="loginblue-font">I agree to the </span>
            <a href="#" class="loginblue-link">Terms of Service</a>
            <span class="loginblue-font">and</span>
            <a href="#" class="loginblue-link">Privacy Policy </a>
            </label>
            <div id="register_tnc_error">
            </div>
        </div>
    -->
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
    @extends('layouts.app')
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2" style="padding-top: 100px; padding-bottom: 100px;">
                <div class="card m-t-50">
                    <div class="card-body"> 

                        <h2>Log In</h2>

                        <hr>

                        <!-- BEGIN LOGIN FORM -->
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">

                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-actions text-center">
                                <button type="submit" class="btn btn-success uppercase "  style="min-width: 100px">Login</button>
                            </div>
                        </form>
                        <!-- END LOGIN FORM -->
                    </div>
                </div>          
            </div>
        </div>
    </div>

    @endsection


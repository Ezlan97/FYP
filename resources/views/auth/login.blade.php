@extends('layouts.app')
@section('content')
<header class="masthead">
    <div class="overlay">
        <div class="container">
            <h1 style="color: #ffffff; font-size: 60px;">Login To Book</h1>
            <h2 class="display-4 text-white"></h2>
        </div>
    </div>
</header>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/homepage">Home</a></li>
    <li class="breadcrumb-item">Login</li>
</ol>
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
                        <div class="form-group{{ $errors->has('matrik') ? ' has-error' : '' }}">
                            <label for="matrik" class="control-label">Staff/Matrik ID</label>
                            <input id="matrik" type="id" class="form-control" name="matrik" value="{{ old('matrik') }}" required autofocus>
                            @if ($errors->has('matrik'))
                            <span class="help-block">
                                <strong>{{ $errors->first('matrik') }}</strong>
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
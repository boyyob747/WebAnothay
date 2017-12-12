@extends('layouts.main')
@section('title','Sinh vien')
@section('content')
    @if(Auth::check())
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Welcome</h3>
            </div>
            <div class="panel-body">
                <?php
                $user = Auth::user();
                echo "Name : " . Auth::user()->name . "<br>";
                echo "Email : " . Auth::user()->email;
                ?>
            </div>
        </div>
    @else
        <div class="container">
            <div class="card card-container">
                <span class="glyphicon glyphicon-list-alt"></span>
                <center><h3>Đăng nhập</h1></center>
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <span id="reauth-email" class="reauth-email"></span>
                    <input id="email" type="text" class="form-control" name="email" placeholder="Username"
                           value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                    @endif
                    <br>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password"
                           required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                    @endif
                    <br>
                    <button class="btn btn-block btn-primary" type="submit">Sign in</button>
                </form><!-- /form -->
            </div><!-- /card-container -->
        </div><!-- /container -->
    @endif
@endsection

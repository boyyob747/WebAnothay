@extends('layouts.main')
@section('title','Sinh vien')
@section('content')
<div class="container">
    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <span class="glyphicon glyphicon-list-alt"></span>
        <center><h3>Đăng nhập để làm bài thi</h1></center>
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin">
            <span id="reauth-email" class="reauth-email"></span>
            <input type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
            <br>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <br>
            <button class="btn btn-block btn-primary" type="submit">Sign in</button>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->
@stop

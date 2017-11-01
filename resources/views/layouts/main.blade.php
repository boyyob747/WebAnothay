<html>
<head>
  <title>@yield('title')</title>
  {!! Html::style('bootstrap/css/bootstrap.min.css') !!}
  {!! Html::style('css/custom.css') !!}
  {!! Html::script('js/jquery.min.js') !!}
  {!! Html::style('awesome/css/font-awesome.min.css') !!}
</head>
<body>
  <div class="navbar navbar-inverse">
    <div class="container">
      <a class="navbar-brand" href="#">TEST ONLINE</a>
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeader">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse navHeader">
        <ul class="nav navbar-nav navbar-left">
          <li <?php if(isset($home))
          {
            echo $home;
          } ?>>
          <a href="{{ action('PagesController@index')}}">Home</a></li>

          @guest

          @else
          <?php
          $user = Auth::user();
          $state = Auth::user()->state;
          if ($state == 0)
          {
            ?>
            <li <?php if(isset($baithi))
            {
              echo $baithi;
            } ?>><a href="{{ action('PagesController@about')}}">Bài thi</a></li>
            <li <?php if(isset($baitab))
            {
              echo $baitab;
            } ?>><a href="{{ action('PagesController@about')}}">Bài tập</a></li>
            <li <?php if(isset($diem))
            {
              echo $diem;
            } ?>><a href="{{ action('PagesController@about')}}">Điểm thi</a></li>
          <?php }
          else if ($state == 1) // giao vien
          {

          }
          else { // admin
          ?>
          <li <?php if(isset($giaovien))
          {
            echo $giaovien;
          } ?>><a href="{{ action('TeachersController@index')}}">Giáo viên</a></li>
          <li <?php if(isset($baitab))
          {
            echo $baitab;
          } ?>><a href="{{ action('PagesController@about')}}">Sinh viên</a></li>
        <?php } ?>
          @endguest
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li <?php if(isset($about))
          {
            echo $about;
          } ?>><a href="{{ action('PagesController@about')}}">About</a></li>
          @guest
          <li><a href="{{ action('PagesController@index')}}">Login</a></li>
          @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
              <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
        @endguest
      </ul>

    </div>
  </div>
</div>
<div class="container">
  <div>
    @yield('content')
  </div>
</div>

<footer class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container">
    <p class="navbar-text">&copy;CopyRight By Nhóm 1A</p>
    <!-- : 1.Khanh Minh 2.Hoàng Đình 3.Quý Định Lê 3.Dung Phương 5.Anothay Alounsavanh-2017 -->
  </div>
</footer>

{!! Html::script('js/customScript.js') !!}

{!! Html::script('bootstrap/js/bootstrap.min.js') !!}
</body>
</html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<html>
<head>
  <title>@yield('title')</title>
  {!! Html::style('bootstrap/css/bootstrap.min.css') !!}
  {!! Html::style('css/custom.css') !!}
  {!! Html::style('css/dataTables.bootstrap.min.css') !!}
  {!! Html::script('js/jquery.min.js') !!}
  {!! Html::script('js/custom.js') !!}
  {!! Html::script('js/jquery.dataTables.min.js') !!}
  {!! Html::script('js/dataTables.bootstrap.min.js') !!}
  {!! Html::style('awesome/css/font-awesome.min.css') !!}
</head>
<body>
  <div id="wrap">
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
          { ?>
            <li <?php if(isset($lophocphan))
            {
              echo $lophocphan;
            } ?>><a href="{{ action('LopHocPhanController@index')}}">Tạo lớp học phần</a></li>
          <?php
          }
          else { // admin
          ?>
          <li <?php if(isset($giaovien))
          {
            echo $giaovien;
          } ?>><a href="{{ action('TeachersController@index')}}">Giáo viên</a></li>
          <li <?php if(isset($sinhvien))
          {
            echo $sinhvien;
          } ?>><a href="{{ action('StudentsController@index')}}">Sinh viên</a></li>
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
  <div id="content-main" class="container-fluid">
  @yield('content')
  </div>

</div>

   <div id="footer">
  <div class="containergg">
            <span>
              <a href='https://www.facebook.com/boy.a.anothay'><i class="fa fa-facebook fa-3x fa-fw"></i></a>

            </span>
            <span>
              <h3>Copyright by Nhóm 1A</h3>
            </span>
  </div>
</div>


{!! Html::script('js/customScript.js') !!}

{!! Html::script('bootstrap/js/bootstrap.min.js') !!}
</body>
</html>

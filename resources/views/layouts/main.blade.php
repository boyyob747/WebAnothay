<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<html>
<head>
  <title>@yield('title')</title>
  {!! Html::script('js/nicEdit.js') !!}
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

          @if(Auth::user()->state == 0)

            <li <?php if(isset($lophocphan))
            {
              echo $lophocphan;
            } ?>><a href="{{ action('ThongTinLopHocPhanController@getThongTinLopSV')}}">Lớp học phần</a></li>
          @elseif(Auth::user()->state == 1)
            <li <?php if(isset($lophocphan))
            {
              echo $lophocphan;
            } ?>><a href="{{ action('LopHocPhanController@index')}}">Lớp học phần</a></li>
          @else
          <li <?php if(isset($giaovien))
          {
            echo $giaovien;
          } ?>><a href="{{ action('TeachersController@index')}}">Quản lý giáo viên</a></li>
          <li <?php if(isset($sinhvien))
          {
            echo $sinhvien;
          } ?>><a href="{{ action('StudentsController@index')}}">Quản lý sinh viên</a></li>
        <li <?php if(isset($lophocphan))
        {
          echo $lophocphan;
        } ?>><a href="{{ action('LopHocPhanController@index')}}">Quản lý lớp học phần</a></li>
          @endif
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
     <div class="container">
          <div class="row">

                   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                       <ul class="adress">
                            <span>Adress</span>
                            <li>
                               <p>Trường đại học bách khoa, 60 ngô sĩ liêng</p>
                             </li>

                             <li>
                               <p>boysavan@gmail.com</p>
                             </li>
                        </ul>
                   </div>

                   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                       <ul class="contact">
                            <span>Contact</span>
                            <li>
                               <a href="{{url('/home')}}">Home</a>
                             </li>

                             <li>
                                <a href="{{ action('PagesController@about')}}">About</a>
                             </li>
                       </ul>
                   </div>


                   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   </div>

                   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <ul class="social">
                                 <span>Social</span>
                                      <a href='https://www.facebook.com/boy.a.anothay'><i class="fa fa-facebook fa-3x fa-fw"></i></a>
                                      <a href="https://github.com/"><i class="fa fa-github fa-3x" ></i></a>

                        </ul>
                  </div>
              </div>
           </div>
</div>


{!! Html::script('js/customScript.js') !!}

{!! Html::script('bootstrap/js/bootstrap.min.js') !!}
</body>
</html>

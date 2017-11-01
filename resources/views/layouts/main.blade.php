<html>
    <head>
        <title>App Name - @yield('title')</title>
        {!! Html::style('bootstrap/css/bootstrap.min.css') !!}
          {!! Html::style('css/custom.css') !!}
          {!! Html::script('js/jquery.min.js') !!}
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
					<ul class="nav navbar-nav navbar-right">
						<li <?php if(isset($home))
            {
              echo $home;
            } ?>>
            <a href="{{ action('PagesController@index')}}">Home</a></li>
						<li <?php if(isset($about))
            {
              echo $about;
            } ?>><a href="{{ action('PagesController@about')}}">About</a></li>
            <li><a href="{{ action('PagesController@index')}}">Login</a></li>
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

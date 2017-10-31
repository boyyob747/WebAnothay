<html>
    <head>
        <title>App Name - @yield('title')</title>
        {!! Html::style('bootstrap/css/bootstrap.min.css') !!}
    </head>
    <body>
      <button class="btn btn-primary">boy</button>
        <div class="container">
            @yield('content')
        </div>
        {!! Html::script('js/jquery.min.js') !!}
          {!! Html::script('bootstrap/js/bootstrap.min.js') !!}
    </body>
</html>

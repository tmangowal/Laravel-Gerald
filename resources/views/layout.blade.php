<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
      @section('navbar')
        <nav class="d-flex flex-row">
          <a href="/">Home</a>
          <a href="/">Products</a>
          <a href="/">Contact</a>
        </nav>
      @endsection
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
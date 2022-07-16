<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <title></title>
  <link rel="icon" href="{{ asset('web/images/favicon.png')}}" type="image/png" />
  <link rel="apple-touch-icon" href="{{ asset('web/images/favicon.png')}}" />
  <link rel="preload stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}" as="style" type="text/css" />

  @yield('styles')
</head>
<body>
<div id="preloader"></div>
<header>
  <div class="container">
    <div class="header">
      <div class="logo" style="width: 200px; height: 200px; margin: 0 auto;"><a href="{{ url('/login')}}"><img src="{{ asset('web/images/logo.png') }}" alt="ECC" /></a></div>
      <div class="menu-btn"></div>
    </div>
  </div>
</header>

@yield('content')
<script src="{{ asset('web/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('web/js/bootstrap.min.js') }}" type="text/javascript"></script>
@yield('script')
<script src="{{ asset('web/js/custom.js') }}" type="text/javascript"></script>
</body>
</html>

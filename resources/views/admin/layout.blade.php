<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title></title>
  <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel=" stylesheet" type="text/css">
  <link href="{{ asset('dashboard/css/style.css') }}" rel=" stylesheet" type="text/css">
  <link href="{{ asset('dashboard/css/responsive.css') }}" rel=" stylesheet" type="text/css">
  <link href="{{ asset('dashboard/css/jquery-ui.css') }}" rel="stylesheet" type="text/css"/>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  @yield('styles')
</head>
<body class="menu-open">
  @include('includes.header')
  <div class="wrapper dashboard-wrapper">
    @include('includes.sidebar')
    <div id="main">
      <div class="top-data">
        <div class="filter-div">
        </div>
      </div>
      <div class="content-div">
        <div class="content">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  @include('includes.footer')
</body>
</html>
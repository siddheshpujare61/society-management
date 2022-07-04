<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">

  <title>Dashboard</title>
  <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel=" stylesheet" type="text/css">
  <link href="{{ asset('dashboard/css/jquery-ui.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('dashboard/css/style.css') }}" rel=" stylesheet" type="text/css">
  <link href="{{ asset('dashboard/css/responsive.css') }}" rel=" stylesheet" type="text/css">
  
</head>
<body class="menu-open">
  @include('includes.header')
  <div class="wrapper dashboard-wrapper">
    @include('includes.sidebar')
    <div id="main">
      <div class="top-data">
        <div class="filter-div">
        </div>
        <div class="sub-data">
          <ul>
            <li class="owner-name">Siddhesh</li>
            <li class="duration">@php echo date("l jS \of F Y") @endphp</li>
          </ul>
        </div>
      </div>
      <div class="content-div">
        <div class="content">
          
        </div>
      </div>
    </div>
  </div>

  @include('includes.footer')
</body>

</html>

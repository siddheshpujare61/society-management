<header>
  <div class="logo"><a href="#"><img src="{{ asset('dashboard/images/logo.png') }}" alt=""></a></div>
  <div class="menu-btn"></div>
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-3 optionsmain">
  <select name="global_society" id="global_society" class=" form-control select2 chosen-select">
    <option value="">Please Select Society</option>
  </select>  
</div>
  <div class="user-menu">
      <ul>
        <li><a href="#" title="My Profile">My Profile</a></li>
        <li><a href="{{ route('logout') }}" title="Log Out">Logout</a></li>
      </ul>
  </div>
</header>
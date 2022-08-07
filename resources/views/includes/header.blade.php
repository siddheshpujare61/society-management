<header>
  <div class="logo"><a href="#"><img src="{{ asset('dashboard/images/logo.png') }}" alt=""></a></div>
  <div class="menu-btn"></div>
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-3 optionsmain">
  <select name="global_society" id="global_society" onchange="setGlobal(this.value);" class=" form-control select2 chosen-select">
    <option value="">Please Select Society</option>
    <?php
      use App\Models\Society;
      $societies = Society::all();
      $sessionSocietyId = session()->get('g_society_id');
    ?>
    @foreach ($societies as $society)
    @if ($sessionSocietyId==$society->id)
    <option value="{{ $society->id }}" selected="selected">{{ $society->name }}</option>
    @else
    <option value="{{ $society->id }}">{{ $society->name }}</option>
    @endif
      
    @endforeach
  </select>  
</div>
  <div class="user-menu">
      <ul>
        <li><a href="#" title="My Profile">My Profile</a></li>
        <li><a href="{{ route('logout') }}" title="Log Out">Logout</a></li>
      </ul>
  </div>
</header>
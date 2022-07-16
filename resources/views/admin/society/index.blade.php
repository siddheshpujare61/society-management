@extends('admin.layout')
@section('content')


<div class="ui grid stackable">
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <div id="main" class="project-wrapper">
    <div class="top-data">
      <div class="sub-title">
        <ul class="breadcrumb">
          <li>Society Management</li>
        </ul>
      </div>
      <div class="filter-div">
        <a href="{{ route('society.create') }}" class="btn btn-outline-info">Add Society</a>        
      </div>
    </div>
    <div class="content-div">
      <div class="table-wrapper table-responsive">
        <table class="table table-bordered" id="project-proposal-table">
          <thead class="thead-light">
            <tr>
              <th style="width: 10px;" class="serial">#</th>
                <th>Society Name</th>
                <th>Document</th>
                <th>Established Date</th>
                <th>Developer</th>
                <th>Consultant</th>
                <!-- <th>Agency</th>
                <th>Building Information</th>
                <th>Address</th> -->
                 <th>Status</th>
                <th class="action-div">Actions</th>
            </tr>
            @foreach ($societies as $society)
            <tr>
              <td style="width: 10px;">{{ ++$i }}</td>              
              <td>{{ $society->name }}</td>
              <td>
                <a href="/dashboard/images/society_images/{{ $society->uploaded_document }}" target="_blank">
                  <img src="/dashboard/images/society_images/{{ $society->uploaded_document }}" style="width:150px; height: 150px;">
                </a>
              </td>
              <td>{{ $society->established_date }}</td>
              <td>{{ $society->developer }}</td>
              <td>{{ $society->consultant }}</td>
              <!-- <td>{{ $society->agency }}</td>
              <td>{{ $society->building_info }}</td>
              <td>{{ $society->address }}</td> -->
              <td>{{ ($society->status == 0) ? "Inactive" : "Active" }}</td>
              <td>
                <form action="{{ route('society.destroy',$society->id) }}" method="POST">
                  <!-- <a class="btn btn-info" href="{{ route('society.show',$society->id) }}">Show</a> -->
                  <a class="btn btn-primary" href="{{ route('society.edit',$society->id) }}">Edit</a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach           
          </thead>
          <tbody>
          </tbody>
        </table>
         {!! $societies->links('pagination::bootstrap-4') !!}
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    window.setTimeout(function() {
      $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
          $(this).remove(); 
      });
    }, 1000);
});
</script>
@endsection
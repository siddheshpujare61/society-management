@extends('admin.layout')
     
@section('content')
<div id="main" class="append-wrapper atru-wrapper">
  <div class="top-data">
    <div class="sub-title">
      <ul class="breadcrumb">
        <li><a href="{{ route('society.index') }}">Society Management</a></li>
        <li>Edit Society</li>
      </ul>
    </div>
  </div>
  @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

  <div class="content-div">
    <div class="steps-wrapper">
      <div class="form-div">
         <form action="{{ route('society.update',$society->id) }}" method="POST" enctype="multipart/form-data"> 
          @csrf
          @method('PUT')
          <div class="field">
            <div class="half-field">
              <div class="label"><span>Society Name</span></div>
              <div class="label-value">
                <div class="select-box">
                  <input type="text" name="name" value="{{ $society->name }}" class="form-control" placeholder="Name">
                </div>
              </div>
            </div>
            <div class="half-field">
              <div class="label"><span>Established Date</span></div>
                 <div class="label-value">
                  <div class="input-box">
                      <input type="text" class="datepicker" name="established_date" placeholder="Select Date" autocomplete="off" required="required" value="{{ $society->established_date }}" />
                  </div>
                </div>              
            </div>
          </div>
          <div class="field ipad-side">            
            <div class="half-field">
              <div class="label"><span>Developer</span></div>
              <div class="label-value">
                <div class="select-box">
                  <input type="text" name="developer" value="{{ $society->developer }}" />
                </div>
              </div>
            </div>
            <div class="half-field">
              <div class="label"><span>Consultant</span></div>
              <div class="label-value">
                <div class="select-box">
                  <input type="text" name="consultant" value="{{ $society->consultant }}" />
                </div>
              </div>
            </div>  
          </div>
          <div class="field">            
            <div class="half-field">
              <div class="label"><span>Agency</span></div>
                 <div class="label-value">
                  <div class="input-box"> 
                      <input type="text" name="agency" value="{{ $society->agency }}" />
                  </div>
                </div>              
            </div>
            <div class="half-field">
              <div class="label"><span>Attach Document</span></div>
                 <div class="label-value">
                  <div class="input-box"> 
                      <input type="file" name="uploaded_document" value="{{ $society->uploaded_document }}" />
                      <a href="/dashboard/images/society_images/{{ $society->uploaded_document }}" target="_blank"><img src="/dashboard/images/society_images/{{ $society->uploaded_document }}" style="margin: 10px 0 0 0; width: 100px; height: 100px;"></a>
                  </div>
                </div>              
            </div>
          </div>
          <div class="field">
            <div class="half-field">
              <div class="label"><span>Building Info</span></div>
              <div class="label-value">
                <div class="select-box">
                  <textarea name="building_info">{{ $society->building_info }}</textarea>
                </div>
              </div>
            </div>            
            <div class="half-field">
              <div class="label"><span>Address</span></div>
                 <div class="label-value">
                  <div class="input-box">
                      <textarea name="address">{{ $society->address }}</textarea>
                  </div>
                </div>              
            </div>
          </div>
          <div class="field">
            <div class="half-field">
              <div class="label"><span>Status</span></div>
              <div class="label-value">
                <div class="select-box">
                  <select name="status">
                    <option value="0" {{ ($society->status == 0) ? "selected='selected'" : "" }}> Inactive</option>
                    <option value="1" {{ ($society->status == 1) ? "selected='selected'" : "" }}> Active</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
           @csrf
          <div class="button-group">
            <button type="submit" class="btn btn-outline-info next-step-btn ">Submit</button>
          </div>           
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
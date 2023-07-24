@extends('layouts.app')
@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
  <br />
    <h3 class="display-5 text-center"> <i class="fas fa-cube" style="color:#ebbd34"></i> Add New Package Details</h3>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
      <br />
    @endif
      <form method="post" action="{{ route('package.store') }}">
          @csrf
          <div class="form-group">    
              <label for="truck_number">Truck Number</label>
              <select name="truck_number" class="form-control">
              <option selected disabled>-</option>
              @foreach ($trucks as $count => $truck)
                @if(($truck->Package()->count()) < 50)
                  <option value="{{$truck['truck_number']}}">{{$truck['truck_number']}}</option>
                @endif
              @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="package_name">Package Number</label>
              <input type="text" class="form-control" name="package_number"/>
          </div>
          <div class="form-group">
              <label for="receiver_name">Receiver</label>
              <input type="text" class="form-control" name="receiver_name"/>
          </div>
          <div class="form-group">
              <label for="destination">Destination</label>
              <input type="text" class="form-control" name="destination"/>
          </div>
          <div class="row justify-content-center">
          <a href="{{ route('package.index')}}" class="btn btn-primary bg-danger">Return</a>&nbsp;&nbsp;                        
          <button type="submit" class="btn btn-primary text-center bg-success">Save Details</button>
          </div>
      </form>
  </div>
</div>
</div>
@endsection

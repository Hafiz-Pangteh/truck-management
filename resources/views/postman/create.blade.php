@extends('layouts.app')
@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
  <br />
    <h3 class="display-5 text-center"><i class="fas fa-user" style="color:#ebbd34"></i> Add New Postman Details</h3>
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
      <form method="post" action="{{ route('postman.store') }}">
          @csrf
        <div class="form-group">   
            <label for="title">Truck Number</label>
            <input type="text" class="form-control" id="truck_number" name="truck_number" placeholder="no truck is assigned yet" readonly>
        </div>
        <div class="form-group">
            <label for="title">Postman Number</label>
            <input type="text" class="form-control" id="postman_number" name="postman_number">
        </div>
        <div class="form-group">
            <label for="title">Postman Name</label>
            <input type="text" class="form-control" id="postman_name" name="postman_name">
        </div>

        <div class="row justify-content-center">
          <a href="{{ route('postman.index')}}" class="btn btn-primary bg-danger">Return</a>&nbsp;&nbsp;                        
          <button type="submit" class="btn btn-primary text-center bg-success">Save Details</button>
          </div>
      </form>
  </div>
</div>
</div>
@endsection

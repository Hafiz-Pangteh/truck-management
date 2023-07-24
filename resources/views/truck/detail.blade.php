@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">

    
    
    <div class="col-sm-12">
    <br />
    <h3 class="display-5 text-center"><i class="fas fa-cube" style="color:#ebbd34"></i> Item list of Truck Number {{$trucks->truck_number}}</h3> 
    
    <table class="table table-striped mt-5">
        <thead>
            <tr>
              <th>Package Number</th>
              <th>Receiver Name</th>
              <th>Destination</th>
            </tr>
        </thead>
        <tbody>
       @foreach($packages as $count => $package) 
            <tr>
               
                <td>{{$package->package_number}}</td>
                <td>{{$package->receiver_name}}</td>
                <td>{{$package->destination}}</td>
                
            </tr>
            @endforeach  
        </tbody>
      </table>
      <div class="text-center">
        <a href="{{ route('truck.index')}}" class="btn btn-primary">Return</a>&nbsp;&nbsp;    
        </div>
    </div>
    
    </div>
</div>

@endsection
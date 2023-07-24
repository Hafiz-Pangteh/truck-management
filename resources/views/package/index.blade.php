@extends('layouts.app')
@section('content')
<style>
.w-5{
  display: none;
}
</style>
<div class="row">

<div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success text-center">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>

<div class="col-sm-12">
<br />
<h3 class="display-5 text-center"> <i class="fas fa-cube" style="color:#ebbd34"></i> Package Details</h3> 

<table class="table table-striped mt-5">
    <thead>
        <tr>
          <th>No</th>
          <th>Truck Number</th>
          <th>Package Number</th>
          <th>Receiver Name</th>
          <th>Destination</th>
          <th colspan="2" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($packages as $count => $package)
        <tr>
            <td>{{$packages->firstItem()+ $count}}</td>
            <td>{{$package->truck_number}}</td>
            <td><a href="{{ route('package.show',$package->package_id)}}">{{$package->package_number}}</a></td>
            <td>{{$package->receiver_name}}</td>
            <td>{{$package->destination}}</td>
            <td class="text-center">
                <a href="{{ route('package.edit',$package->package_id)}}" class="btn btn-primary btn-block">Edit</a>
            </td>
            <td class="text-center">
                <form action="{{ route('package.destroy', $package->package_id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-block" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <span>
  {{$packages->links("pagination::bootstrap-4")}}
  </span>
  <div class="text-center">
    <a style="margin: 19px;" href="{{ route('package.create')}}" class="btn btn-primary bg-success">New package Details</a>
  </div>
</div>

</div>
@endsection

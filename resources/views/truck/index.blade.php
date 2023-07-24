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
<h3 class="display-5 text-center"><i class="fas fa-truck" style="color:#ebbd34"></i> Truck Details</h3> 

<table class="table table-striped mt-5">
    <thead>
        <tr>
          <th>No</th>
          <th>Truck Number</th>
          <th>Quantity</th>
          <th>Postman in Charge</th>
          <th>Operation Date</th>
          <th>Status</th>
          <th colspan="2" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($trucks as $count => $truck)
        <tr>
            <td>{{$trucks->firstItem()+ $count}}</td>
            <td><a href="{{ route('truck.show',$truck->truck_id)}}">{{$truck->truck_number}}</a></td>
            <td>{{$truck->Package()->count()}}</td>
            @if($truck->postman_name != null)           
            <td>{{$truck->postman_name}}</td>
            @else
            <td> - </td>
            @endif
            <td>{{$truck->date_of_operation}}</td>
     @if(($truck->Package()->count()) < 50)
         <td class="table-success"> AVAILABLE </td>
          @else
             <td class="table-danger"> FULL </td>
          @endif
            <td></td>
            <td class="text-center">
              <a href="{{ route('detail.show',$truck->truck_id)}}" class="btn btn-secondary btn-block" >Item-list</a>
          </td>
            <td class="text-center">
                <a href="{{ route('truck.edit',$truck->truck_id)}}" class="btn btn-primary btn-block">Edit</a>
            </td>
            
            <td class="text-center">
                <form action="{{ route('truck.destroy', $truck->truck_id)}}" method="post">
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
  {{$trucks->links("pagination::bootstrap-4")}}
  </span>
  <div class="text-center">
    <a style="margin: 19px;" href="{{ route('truck.create')}}" class="btn btn-primary bg-success">New Truck Details</a>
  </div>
</div>

</div>
@endsection

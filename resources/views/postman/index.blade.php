@extends('layouts.app')
@section('content')

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
<h3 class="display-5 text-center"><i class="fas fa-user" style="color:#ebbd34"></i> Postman Details</h3> 

    <table class="table table-striped mt-5">
        <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Truck Number</th>
              <th scope="col">Postman number</th>
              <th scope="col">Postman name</th>
              <th scope="col">Status</th>
              <th colspan="2" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($postman as $count => $postman)
            <tr>
                    <td>{{++$count}}</td>
                    <td>{{$postman->truck['truck_number']}}</td>
                    <td><a href="{{ route('postman.show',$postman->postman_id)}}">{{$postman->postman_number}}</a></td>
                    <td>{{$postman->postman_name}}</td>
                    @if($postman->truck['truck_number'] != null)
                      <td class="table-success"> ASSIGNED </td>
                    @else
                      <td class="table-danger"> NOT ASSIGNED </td>
                    @endif
                    <td class="text-center">
                <a href="{{ route('postman.edit',$postman->postman_id)}}" class="btn btn-primary btn-block">Edit</a>
            </td>
            <td class="text-center">
                <form action="{{ route('postman.destroy', $postman->postman_id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-block" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div class="text-center">
    <a style="margin: 19px;" href="{{ route('postman.create')}}" class="btn btn-primary bg-success">New postman Details</a>
  </div>
</div>

</div>
@endsection
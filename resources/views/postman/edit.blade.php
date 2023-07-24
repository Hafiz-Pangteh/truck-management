  
@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <br />
        <h3 class="display-5 text-center"><i class="fas fa-user" style="color:#ebbd34"></i> Update Postman Details</h3>
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
        <form method="post" action="{{ route('postman.update', $postman->postman_id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="truck_number">Truck Number</label>
                <input type="text" value="{{$postman->truck_number}}" class="form-control" id="truck_number" name="truck_number" readonly>
            </div>
            <div class="form-group">
                <label for="postman_number">Postman Number</label>
                <input type="text" value="{{$postman->postman_number}}" class="form-control" id="postman_number" name="postman_number">
            </div>  
            <div class="form-group">
                <label for="postman_name">Postman Name</label>
                <input type="text" value="{{$postman->postman_name}}" class="form-control" id="postman_name" name="postman_name">
            </div> 
            <div class="text-center">
            <a href="{{ route('postman.index')}}" class="btn btn-primary bg-danger">Return</a>&nbsp;&nbsp;    
            <button type="submit" class="btn btn-primary bg-success">Update Details</button>
            </div>
        </form>
    </div>
</div>
@endsection

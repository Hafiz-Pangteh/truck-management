@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <br />
        <h3 class="display-5 text-center"<i class="fas fa-user" style="color:#ebbd34"></i> Postman Details</h3>
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
            <div class="form-group">
                <label for="truck_number">Truck Number</label>
                <input type="text" class="form-control" name="truck_number" value="{{ $postman->truck_number }}" readonly>
            </div>
            <div class="form-group">
                <label for="postman_number">Postman Number</label>
                <input type="text" class="form-control" name="postman_number" value="{{ $postman->postman_number }}" readonly>
            </div>
            <div class="form-group">
                <label for="postman_name">Postman Name</label>
                <input type="text" class="form-control" name="postman_name" value="{{ $postman->postman_name }}" readonly>
            </div>
            <div class="form-group">
                <label for="date_of_operation">Status</label>
                @if($postman->truck_number != null)
                <input type="text" class="form-control" name="date_of_operation" value="ASSIGNED" readonly>
                    @else
                
                    <input type="text" class="form-control" name="date_of_operation" value="NOT ASSIGNED" readonly>
                    @endif
            </div>
            </form>
            <div class="text-center">
            <a href="{{ route('postman.index')}}" class="btn btn-primary">Return</a>&nbsp;&nbsp;    
            </div>
    </div>
</div>
@endsection

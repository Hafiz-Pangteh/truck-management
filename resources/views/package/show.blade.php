@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <br />
        <h3 class="display-5 text-center"> <i class="fas fa-cube" style="color:#ebbd34"></i> Package Details</h3>
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
                @if($packages->truck_number != null)
                <input type="text" class="form-control" name="truck_number" value="{{ $packages->truck_number }}" readonly>
                @else
                <input type="text" class="form-control" name="truck_number" value="no trucks assigned" readonly>
                @endif
          </div>
            <div class="form-group">
                <label for="package_number">Package Number</label>
                <input type="text" class="form-control" name="package_number" value="{{ $packages->package_number }}" readonly>
            </div>
            <div class="form-group">
                <label for="receiver_name">Receiver Name</label>
                <input type="text" class="form-control" name="package_number" value="{{ $packages->receiver_name }}" readonly>
            </div>
            <div class="form-group">
                <label for="destination">Destination</label>
                <input type="text" class="form-control" name="destination" value="{{ $packages->destination }}" readonly>
            </div>
            </form>
            <div class="text-center">
            <a href="{{ route('package.index')}}" class="btn btn-primary">Return</a>&nbsp;&nbsp;    
            </div>
    </div>
</div>
@endsection

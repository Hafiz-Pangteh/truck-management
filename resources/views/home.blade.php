@extends('layouts.app')

@section('content')
<style>
.text-large {
  font-size: 130%;
}
</style>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container">
<div class="row justify-content-center mt-4">
<div class="col-md-8">
<h1 class="text-center bg-success border mb-3 p-2 font-weight-bold" style="color:#fffcd1"> Choose Which to Track: </h1>
<div class="jumbotron border">
        <div class="container-fluid mb-3">
            <div class="row">
            <div class="col-sm d-flex">
                <div class="card-body bg-light pt-5 pb-5 text-large border text-center">   
                    <span class="font-weight-bold text-large" style="color:#eb4034"> {{count($trucks)}} </span>
                    <br/>
                    <i class="fas fa-truck" style="color:#ebbd34"></i>
                    @if((count($trucks)) <= 1)
                    <a href="{{ route('truck.index')}}">Truck</a>
                    @elseif ((count($trucks)) > 1)
                    <a href="{{ route('truck.index')}}">Trucks</a>
                    @endif
                </div>
            </div>
            <div class="col-sm d-flex">
                <div class="card-body bg-light pt-5 pb-5 text-large border text-center">
                    <span class="font-weight-bold text-large text-center" style="color:#eb4034"> {{count($packages)}} </span>
                    <br/>
                    <i class="fas fa-cube" style="color:#ebbd34"></i>
                    @if((count($packages)) <= 1)
                    <a href="{{ route('package.index')}}"> Package </a>
                    @elseif((count($packages)) > 1)
                    <a href="{{ route('package.index')}}"> Packages </a>
                    @endif
                </div>
            </div>
            <div class="col-sm d-flex">
                <div class="card-body bg-light pt-5 pb-5 text-large border text-center">
                    <span class="font-weight-bold text-large text-center" style="color:#eb4034"> {{count($postmen)}} </span>
                    <br/>
                    <i class="fas fa-user" style="color:#ebbd34"></i>
                    @if((count($postmen)) <= 1)
                    <a href="{{ route('postman.index')}}"> Postman </a>
                    @elseif((count($postmen)) > 1)
                    <a href="{{ route('postman.index')}}"> Postmen </a>
                    @endif
                </div>
            </div>
            </div>
        </div>
</div>
</div>
</div>
</div>

<!-- <div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
            <div class="card-header bg-success font-weight-bold">Choose Which to Track: </div>
                <div class="card-body bg-light pt-5 pb-5 text-large">
                <i class="fas fa-truck" style="color:#ebbd34"></i>
                <a href="{{ route('truck.index')}}">Trucks</a>
                <span class="font-weight-bold text-large" style="color:#ebbd34"> : {{count($trucks)}} </span>
                </div>
                <div class="card-body pt-5 pb-5 text-large">
                <i class="fas fa-cube" style="color:#ebbd34"></i>
                <a href="{{ route('package.index')}}"> Packages </a>
                <span class="font-weight-bold text-large" style="color:#ebbd34"> : {{count($packages)}} </span>
                </div>
                <div class="card-body bg-light pt-5 pb-5 text-large">
                <i class="fas fa-user" style="color:#ebbd34"></i>
                <a href="{{ route('postman.index')}}"> Postmen </a>
                <span class="font-weight-bold text-large" style="color:#ebbd34"> : {{count($postmen)}} </span>
                </div>
            </div>
        </div>
    </div>
</div> -->

@endsection

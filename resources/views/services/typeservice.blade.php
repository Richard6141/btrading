@extends('layouts.app')
@section('content')
<div class="full-title">
  <div class="container">
    <h1 class="mt-4 mb-3"> Services </h1>
    <div class="breadcrumb-main">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item active">{{$typeService}}</li>
      </ol>
    </div>
  </div>
</div>
<div class="services-bar">
  <div class="container">
    <h1 class="py-4">{{$typeService}}</h1>
    <div class="row">
      @foreach ($services as $service)
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <div class="card-img">
            @if($service->image == null)
            <img class="img-fluid" src="{{asset('images/services-img-01.jpg')}}" alt="" />
            @else
            <img class="img-fluid" src="{{ asset('image/' . $service->image) }}" alt="" style="max-width: 100% !important; max-height: 300px; !important" />
            @endif
          </div>
          <div class=" card-body">
            <h4 class="card-header"> {!!$service->label!!} </h4>
            <p class="card-text">{!!$service->description!!}</p>
            <p class="card-text">{!!$service->advantages!!}</p>
            <p class="card-text">{!!$service->terms!!}</p>
          </div>
          <a href="{{route($typeService. '.form')}}" class="btn btn-primary">Ask for a {{$typeService}} <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
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
            </ol>
        </div>
    </div>
</div>
<div class="services-bar">
    <div class="container">
        <h1 class="text-center mb-5" style="color: #1273eb">Liste des types de service</h1>
        <div class="services-bar">
            <div class="container">
                <div class="row">
                    @foreach ($typeservices as $typeService)
                    <div class="col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-img">
                                @if($typeService->image == null)
                                <img class="img-fluid" src="{{asset('images/services-img-01.jpg')}}" alt="" />
                                @else
                                <img class="img-fluid" src="{{ asset('image/' . $typeService->image) }}" alt="" />
                                @endif
                            </div>
                            <div class="card-body">
                                <h4 class="card-header"> {{$typeService->label}} </h4>
                                <p class="card-text">{!!$typeService->description!!}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{route('edit.typeservice', $typeService->id)}}" class="btn btn-primary m-3">Edit
                                    <i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{route('delete.typeservice', $typeService->id)}}"
                                    class="btn btn-primary m-3 bg-danger">Delete
                                    <i class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
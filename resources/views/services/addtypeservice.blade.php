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
        <form class="col align-self-center" action="{{ route('submit.typeservice') }}" method="POST" enctype="multipart/form-data">
            <h1 class="text-center mb-5" style="color: #1273eb">Create new type service !</h1>
            @csrf
            <div class="form-group row">
                <label for="inputlabel" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="label" class="form-control" id="inputlabel" value="{{ old('label') }}"
                        placeholder="Name">
                    @error('label')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="inputimage" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control" id="inputimage" value="{{ old('image') }}"
                        placeholder="image">
                    @error('image')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mt-20">
                <label for="inputdescription" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" value="{{ old('description') }}" id="mytextarea" placeholder="Description"></textarea>
                    @error('description')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn"
                    style="background-color: #1273eb!important; color:white">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
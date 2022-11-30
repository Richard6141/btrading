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
        <form class="col align-self-center" id="form" action="{{ route('edittypeservice.submit', $typeService->id) }}"
            method="POST" enctype="multipart/form-data">
            <h1 class="text-center mb-5" style="color: #1273eb">Edit type service !</h1>
            @csrf
            <div class="form-group row mb-2">
                <label for="inputlabel" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="label" class="form-control" id="inputlabel"
                        value="{{ $typeService->label }}" placeholder="Name">
                    @error('label')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="inputimage" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control" id="inputimage"
                        value="{{ $typeService->image }}" placeholder="image">
                    @error('image')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mt-20 mb-2">
                <label for="inputdescription" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" value="{{ old('description') }}" id="mytextarea"
                        placeholder="Description">{{$typeService->description}}</textarea>
                    @error('description')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                <div class="col-md-6">
                    {!! RecaptchaV3::field('register') !!}
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn" id="button"
                    style="background-color: #1273eb!important; color:white">Submit
                </button>
                <button class="btn btn-primary" id="loader" type="button" style="display: none" disabled>
                    <span class="spinner-border spinner-border-sm" id="pageLoader" role="status"
                        aria-hidden="true"></span>
                    Loading...
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
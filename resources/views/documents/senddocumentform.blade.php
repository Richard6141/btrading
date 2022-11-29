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
        <form class="col align-self-center" action="{{ route('documents.submit') }}" method="POST"
            enctype="multipart/form-data">
            <h1 class="text-center mb-5" style="color: #1273eb">Envoyez un document !</h1>
            @csrf
            <div class="form-group row mb-2">
                <label for="user_id" class="col-sm-2 col-form-label">Client</label>
                <div class="col-sm-10">
                    <select name="user_id" id="user_id" class="form-control">
                        <option value="">Choose the service's type</option>
                        @foreach($customers as $item)
                        <option value="{{$item->id}}" selected>{{$item->name.' '. $item->firstname}}</option>
                        @endforeach
                    </select>
                    @error('type_service_id')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="inputimage" class="col-sm-2 col-form-label">Target</label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control" value="{{ old('image') }}"
                        placeholder="image">
                    @error('image')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="inputmessage" class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                    <textarea name="description" value="{{ old('description') }}" id="mytextarea"
                        placeholder="Tapez votre message ici .."></textarea>
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
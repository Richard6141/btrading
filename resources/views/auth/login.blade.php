@extends('layouts.app')  
@section('content')
<header class="slider-main">
    <div class="col-12 d-flex justify-content-end" style="min-height:800px; background-image: url('images/slider-01.jpg')">
        <div class="card" style="width: 40rem;">
            <div class="card-body row align-items-center">
                <form class="col align-self-center" action="{{ route('connection') }}" method="POST">
                    <h1 class="text-center mb-5" style="color: #1273eb">Login to your account now !</h1>
                    @csrf
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" class="form-control" id="inputName" value="{{ old('username') }}" placeholder="Téléphone ou email" autofocus=true>
                            @error('username')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-20">
                        <label for="inputFirstname" class="col-sm-2 col-form-label">Password</label>
                        <div style="margin-bottom: 15px !important" class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="inputFirstname" value="{{ old('password') }}" placeholder="Mot de passe">
                            @error('password')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                            <br>
                            <div class="d-flex justify-content-between">
                        <div >
                            <label class="anim">
                                <input type="checkbox" name="remember" class="checkbox">
                                <span>Remember me</span>
                            </label>
                        </div>
                        <div>
                            <label >
                                <a href="" href="#">
                                {{ __('Forgot Your Password?') }}</a>
                            </label>
                        </div>
                    </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn" style="background-color: #1273eb!important; color:white">Login</button>
                    </div>
                    <div class="d-flex justify-content-end">
                        <p>Don't have an Account? <a href="{{route('register.view')}}"> Register Now!</a></p>
                    </div>
                </form></div>
            </div>
          </div>
</header>
@endsection
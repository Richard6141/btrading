
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@extends('layouts.app')

@section('content')

<div class="main-banner header-text">
    <div class="Modern-Slider">
        <!-- Item -->
        <div class="item item-1">
            <div class="img-fill">
                <div class="row text-content">
                    <div class="col">
                        <h6>we are ready to help you</h6>
                        <h4>Financial Analysis<br>&amp; Consulting</h4>
                        <p>This finance HTML template is 100% free of charge provided by TemplateMo for everyone. This is a multiple-page version with different HTML pages. <a href="one-page.html">One-page version</a> is available as of 2021 February.</p>
                        <a href="contact.html" class="filled-button">contact us</a>
                    </div>
                    <div class="col text-white">
                        <form action="{{ route('connection') }}" method="POST">
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
                                    <input type="text" name="password" class="form-control" id="inputFirstname" value="{{ old('password') }}" placeholder="Mot de passe">
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
                                        <a href="" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}</a>
                                    </label>
                                </div>
                            </div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn" style="background-color: #a4c639!important; color:white">Se connecter</button>
                            </div>
                            <div class="d-flex justify-content-end">
                                <p>Don't have an Account? <a href="{{route('register.view')}}"> Register Now!</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
<!-- Banner Ends Here -->

@endsection
@section('scripts')

@endsection
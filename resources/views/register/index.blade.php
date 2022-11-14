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
                        <form action="{{ route('register.submit') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="inputName" value="{{ old('name') }}" placeholder="Name">
                                    @error('name')
                                    <div>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-20">
                                <label for="inputFirstname" class="col-sm-2 col-form-label">Firstname</label>
                                <div class="col-sm-10">
                                    <input type="text" name="firstname" class="form-control" id="inputFirstname" value="{{ old('firstname') }}" placeholder="Firstname">
                                    @error('firstname')
                                    <div>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputEmail" value="{{ old('email') }}" placeholder="Email">
                                    @error('email')
                                    <div>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <div class="d-flex">
                                        <select name="country_code" id="select_country" class="form-control" style="width: 80px;">
                                            <option value="">Choose your country</option>
                                            @foreach($countries as $country)
                                            @if (old('country_code') == $country['name'])
                                            <option value="{{$country['name']}}" selected>{{$country['emoji']}} {{$country['name']}}</option>
                                            @else
                                            <option value="{{$country['name']}}">{{$country['emoji']}} {{$country['name']}}</option>
                                            @endif
                                            @endforeach
                                        </select>

                                        <input type="telephone" name="phone" class="form-control" id="inputPhone" value="{{ old('phone') }}" placeholder="Phone">
                                    </div>
                                    @error('phone')
                                    <div>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    @error('country_code')
                                    <div>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputCivility" class="col-sm-2 col-form-label">Civility</label>
                                <div class="col-sm-10">
                                    <select name="civility" id="inputCivility" class="form-control">
                                        <option value="">Choose your civility</option>
                                        @if(old('civility') == "monsieur")
                                        <option value="monsieur" selected>Monsieur</option>
                                        @else
                                        <option value="monsieur">Monsieur</option>
                                        @endif
                                        @if(old('civility') == "madame")
                                        <option value="madame" selected>Madame</option>
                                        @else
                                        <option value="madame">Madame</option>
                                        @endif
                                    </select>
                                    @error('civility')
                                    <div>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                                    @error('password')
                                    <div>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPasswordConfirmation" class="col-sm-2 col-form-label">Confirm your password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password_confirmed" class="form-control" id="inputPasswordConfirmation" placeholder="Password confirmation">
                                    @error('password_confirmed')
                                    <div>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="d-flex justify-content-between mt-5">
                                        <div>
                                            <p><a href="#" style="color: #a4c639!important"> Login Now !</a></p>
                                        </div>
                                        <div class="wthree-text">
                                            <label class="anim">
                                                <input type="checkbox" class="checkbox" required="">
                                                <span>I Agree To The Terms & Conditions</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn" style="background-color: #a4c639!important; color:white">Register</button>
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

@include('register.js')
@endsection
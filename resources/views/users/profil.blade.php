@extends('layouts.app')

@section('content')

<div class="page-heading header-text">
    <div class="container">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            @if ($user->image != null)
            <img src="https://imgs.search.brave.com/wOFEEZVolBmkkL_5HDtNKokpZkCCwOMQWYo-Dlm-DVs/rs:fit:474:225:1/g:ce/aHR0cHM6Ly90c2U0/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5X/LXlITURHT2VDbnVI/aU1WUElPT3p3SGFI/YSZwaWQ9QXBp" class="rounded mx-auto d-block" alt="...">
            @else
            <img src="{{ 'https://ui-avatars.com/api/?background=8EC741&color=ffff/?uppercase=true&name=' . Auth::user()->name. '+' . Auth::user()->firstname}}" class="rounded mx-auto d-block" alt="...">
            @endif
            <span class="font-weight-bold">{{$user->name}} {{$user->firstname}}</span>
            <span class="text-black-50">{{$user->email}}</span>
            <span>{{$user->country}}</span>
        </div>
    </div>
</div>

<div class="container rounded bg-dark mt-5 mb-5 d-flex justify-content-center">
    <div class="col-md-8">
        <div class="p-3 py-5">
            <div class="row mt-2">
                <div class="col-md-6"><input type="text" class="form-control" placeholder="first name" value="John"></div>
                <div class="col-md-6"><input type="text" class="form-control" value="Doe" placeholder="Doe"></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6"><input type="text" class="form-control" placeholder="Email" value="john_doe12@bbb.com"></div>
                <div class="col-md-6"><input type="text" class="form-control" value="+19685969668" placeholder="Phone number"></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6"><input type="text" class="form-control" placeholder="address" value="D-113, right avenue block, CA,USA"></div>
                <div class="col-md-6"><input type="text" class="form-control" value="USA" placeholder="Country"></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6"><input type="text" class="form-control" placeholder="Bank Name" value="Bank of America"></div>
                <div class="col-md-6"><input type="text" class="form-control" value="043958409584095" placeholder="Account Number"></div>
            </div>
            <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
        </div>
    </div>
</div>
</div>

@endsection
@section('scripts')

@endsection
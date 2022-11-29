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
        <form class="col align-self-center" action="{{ route('Investment.submit') }}" method="POST"
            enctype="multipart/form-data">
            <h1 class="text-center mb-5" style="color: #1273eb">Ask for an investment</h1>
            @csrf
            <div class="form-group row mb-2">
                <label for="inputaddress" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" id="inputaddress"
                        value="{{ old('address') }}" placeholder="Address">
                    @error('address')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="inputamount" class="col-sm-2 col-form-label">Amount</label>
                <div class="col-sm-10">
                    <input type="number" name="amount" class="form-control" id="inputamount" value="{{ old('amount') }}"
                        placeholder="Amount">
                    @error('amount')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="inputrefund_deadline" class="col-sm-2 col-form-label">Refund deadline</label>
                <div class="col-sm-10">
                    <input type="number" name="refund_deadline" class="form-control" id="inputrefund_deadline"
                        value="{{ old('refund_deadline') }}" placeholder="Refund deadline">
                    @error('refund_deadline')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="inputincome" class="col-sm-2 col-form-label">Income</label>
                <div class="col-sm-10">
                    <input type="number" name="income" class="form-control" id="inputincome"
                        value="{{ old('income') }}" placeholder="Income">
                    @error('income')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="inputobjectif" class="col-sm-2 col-form-label">Objectif</label>
                <div class="col-sm-10">
                    <textarea name="objectif" value="{{ old('objectif') }}" id="mytextarea"
                        placeholder="Objectif"></textarea>
                    @error('objectif')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="inputbusiness_plan" class="col-sm-2 col-form-label">Business plan</label>
                <div class="col-sm-10">
                    <input type="file" name="business_plan" class="form-control" id="inputbusiness_plan" value="{{ old('business_plan') }}"
                        placeholder="Business plan">
                    @error('business_plan')
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
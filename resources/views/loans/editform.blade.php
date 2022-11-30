@extends('layouts.app')
@section('content')
	<header class="slider-main">
    <div class="col-12 d-flex justify-content-center" style="min-height:auto; background-image: url('images/slider-01.jpg')">
        <div class="card" style="width: auto; margin-top:10%; margin-bottom:10%; opacity:.9; height: 85%">
            <div class="card-body row align-items-center" >
                <form class="col align-self-center" action="{{ route('update.loan', $loan->id) }}" method="POST">
                    <h1 class="text-center mb-5" style="color: #1273eb">Modify loan !</h1>
                    @csrf
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-4 col-form-label">Address</label>
                        <div class="col-sm-8">
                            <input type="text" name="address" class="form-control" id="inputaddress" value="{{ $loan->address }}" placeholder="address" >
                            @error('address')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Montant</label>
                        <div class="col-sm-8">
                            <input type="number" name="amount" class="form-control" id="inputamount" value="{{ $loan->amount }}" placeholder="amount" >
                            @error('amount')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPhone" class="col-sm-4 col-form-label">Objectif</label>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <select name="objectif" id="inputgroup" class="form-control">
                                @if($loan->objectif =="Immobilier")
                                <option value="Immobilier" selected>Immobilier</option>
                                <option value="Etude" >Etude</option>
                                <option value="Secours" >Secours</option>
                                @elif(objectif =="Etude")
                                <option value="Immobilier" >Immobilier</option>
                                <option value="Etude" selected>Etude</option>
                                <option value="Secours" >Secours</option>
                                @elif(objectif =="Secours")
                                <option value="Immobilier" >Immobilier</option>
                                <option value="Etude" >Etude</option>
                                <option value="Secours"selected >Secours</option>
                                @else
                                <option value="">Choose your objectif</option>
                                <option value="Immobilier" >Immobilier</option>
                                <option value="Etude" >Etude</option>
                                <option value="Secours"selected >Secours</option>
                                @endif
                              
                            </select>
        
                                <!-- <input type="telephone" name="phone" class="form-control" id="inputPhone" value="{{ old('phone') }}" placeholder="Phone"> -->
                            </div>
                            @error('objectif')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Période</label>
                        <div class="col-sm-8">
                            <div class="d-flex">
                            <input type="text" value="{{ $period[0] }}" name="period" class="form-control" id="inputperiod"  placeholder="Periode">
                            <select name="period1" id="select_country" class="form-control" style="width: 80px;" required>
                                    @if($period[1] == "year")
                                    <option value="year" selected>year</option>
                                    <option value="month" >month</option>
                                    @else
                                    <option value="year" >year</option>
                                    <option value="month" selected>month</option>
                                    @endif
                                </select>
        
                            </div>
                            
                            @error('period')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputCivility" class="col-sm-4 col-form-label">Groupe</label>
                        <div class="col-sm-8">
                            <select name="group" id="inputgroup" class="form-control">
                                @if($loan->group == "Independant")
                                <option value="">Choose your group</option>
                                <option value="Independant" selected>Independant</option>
                                <option value="Officiel" >Officiel</option>
                                <option value="Worker" >Worker</option>
                                @elif($loan->group == "Officiel")
                                <option value="">Choose your group</option>
                                <option value="Independant" >Independant</option>
                                <option value="Officiel" selected>Officiel</option>
                                <option value="Worker" >Worker</option>
                                @elif($loan->group == "Worker")
                                <option value="">Choose your group</option>
                                <option value="Independant" >Independant</option>
                                <option value="Officiel" >Officiel</option>
                                <option value="Worker" selected>Worker</option>
                                @else
                                <option value="">Choose your group</option>
                                <option value="Independant" >Independant</option>
                                <option value="Officiel" >Officiel</option>
                                <option value="Worker">Worker</option>
                                @endif
                            </select>
                            @error('group')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPasswordConfirmation" class="col-sm-4 col-form-label">Revenu</label>
                        <div class="col-sm-8">
                            <input type="text" name="income" class="form-control" value="{{ $loan->income }}" id="inputPasswordConfirmation" placeholder="Revenu mensuel">
                            @error('income')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
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
                        <button type="submit" class="btn" style="background-color: #1273eb!important; color:white">Soumettre</button>
                    </div>
                </form></div>
            </div>
          </div>
</header>
	<!-- full Title -->
@endsection
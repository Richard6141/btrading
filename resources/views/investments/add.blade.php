@extends('layouts.app')
@section('content')
<header class="slider-main">
    <div class="col-12 d-flex justify-content-center"
        style="min-height:auto; background-image: url('images/slider-01.jpg')">
        <div class="card" style="width: auto; margin-top:10%; margin-bottom:10%; opacity:.9; height: 85%">
            <div class="card-body row align-items-center">
                <form class="col align-self-center" action="{{ route('loan.register') }}" method="POST">
                    <h1 class="text-center mb-5" style="color: #1273eb">Ask for an investment</h1>
                    @csrf
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-4 col-form-label">Address</label>
                        <div class="col-sm-8">
                            <input type="text" name="address" class="form-control" id="inputaddress"
                                value="{{ old('address') }}" placeholder="address">
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
                            <input type="number" name="amount" class="form-control" id="inputamount"
                                value="{{ old('amount') }}" placeholder="amount">
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
                                    <option value="">Choose your objectif</option>
                                    <option value="Immobilier" selected>Immobilier</option>
                                    <option value="Etude" selected>Etude</option>
                                    <option value="Secours" selected>Secours</option>

                                </select>
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
                                <input type="number" name="refund_deadline" class="form-control" id="inputrefund_deadline"
                                    value="{{ old('refund_deadline') }}" placeholder="refund_deadlinee">
                                <select name="refund_deadline1" class="form-control" style="width: 80px;"
                                    required>
                                    <option value="">Choose</option>
                                    <option value="year">year</option>
                                    <option value="month">month</option>
                                </select>
                            </div>
                            @error('refund_deadline')
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
                                <option value="">Choose your group</option>
                                <option value="Independant">Independant</option>
                                <option value="Officiel">Officiel</option>
                                <option value="Worker">Worker</option>
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
                            <input type="text" name="income" class="form-control" value="{{ old('income') }}"
                                id="inputPasswordConfirmation" placeholder="Revenu mensuel">
                            @error('income')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn"
                    style="background-color: #1273eb!important; color:white">Soumettre</button>
            </div>
            </form>
        </div>
    </div>
    </div>
</header>
@endsection
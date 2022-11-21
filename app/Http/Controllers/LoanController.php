<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        return view('loans.index');
    }

    public function loanRegister()
    {
        $request->validate([
            'address' => 'required',
            'objectif' => 'required',
            'amount' => 'required',
            'group' => 'required',
            'period' => 'required',
            'income' => 'required',
        ]);
    }
}

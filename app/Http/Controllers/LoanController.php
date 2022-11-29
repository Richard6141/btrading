<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index()
    {
        $value = 5000;

        return view('loans.index', ['value' => $value]);
    }

    

    public function loanRegister(Request $request)
    {
        
        $request->validate([
            'address' => 'required |string',
            'objectif' => 'required |string',
            'amount' => 'required |numeric |min:5000',
            'group' => 'required |string',
            'period' => 'required |numeric',
            'income' => 'required |numeric',
        ]);

        $period = htmlspecialchars(trim($request->period)). ' ' .htmlspecialchars(trim($request->period1));
        // dd($period);

        try {
            $data = [
                'id'=>Str::uuid(),
                'user_id'=>Auth::user()->id,
                'address'=>strval(htmlspecialchars($request->address)),
                'objectif'=>htmlspecialchars(strval(trim($request->objectif))),
                'amount'=>htmlspecialchars(trim($request->amount)),
                'group'=>htmlspecialchars(trim($request->group)),
                'period'=>$period,
                'income'=>htmlspecialchars(trim($request->income)),
            ];
            Loan::create($data);
                dd('success');
                return redirect()->route('login')->with('success', "Account create successfully");
            } catch (\Throwable $th) {
                dd('error');
                $message = "An error occurs ! Please contact the administrator";
                return redirect()->route('customer.index')->with('error', "$message");
            }
    }
    
    public function updateform(string $id)
    {
        $loan = Loan::find($id)->firstOrFail();
        // dd($loan);
        return view('loans.editform', ['loan' =>$loan]);
    }
}

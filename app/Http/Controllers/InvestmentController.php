<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestmentController extends Controller
{
    public function index()
    {
        return view('investment.index');
    }

    public function investmentForm()
    {
        return view('investments.add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'objectif' => 'required',
            'amount' => 'required',
            'group' => 'required',
            'refund_deadline' => 'required',
            'income' => 'required',
            'business_plan' => 'mimes:pdf'
        ]);

        $file = $request->file('business_plan');
        $filename = now() . $file->getClientOriginalName();
        $file->move(public_path('documents'), $filename);

        try {
            $investment = new Investment();
            $investment->user_id = Auth::user()->id;
            $investment->address = $request->address;
            $investment->objectif = $request->objectif;
            $investment->amount = $request->amount;
            $investment->group = $request->group;
            $investment->refund_deadline = $request->refund_deadline;
            $investment->income = $request->income;
            $investment->business_plan = $filename;
            $investment->save();
            return redirect()->back()->with('success', 'Investment asked successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th);
        }
    }

    public function retrieveInvestment(string $id)
    {
        $investment_id = htmlspecialchars(trim($id));
        $checkForInvestment = Investment::where('id', $investment_id)->exists();
        if (!$checkForInvestment) {
            return back()->with('error', 'An error occurs');
        }

        try {
            $investment = Investment::where('id', $investment_id)->first();
            return view('', [
                'investment' => $investment
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }
    }
}

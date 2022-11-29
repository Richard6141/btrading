<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InvestmentRequest;

class InvestmentController extends Controller
{
    public function index()
    {
        $investments = Investment::all();
        return view('investments.index', [
            'investments' => $investments
        ]);
    }

    public function investmentForm()
    {
        return view('investments.add');
    }

    public function isInvestmentExist(string $id): bool
    {
        return Investment::where('id', $id)->exists();
    }

    public function getInvestment(string $id): object
    {
        return Investment::where('id', $this->checkId($id))->first();
    }

    public function checkId(string $id): string
    {
        return htmlspecialchars(trim($id));
    }

    public function create(Request $request)
    {
        // dd('$filename');

        $request->validate([
            'address' => 'required',
            'objectif' => 'required',
            'amount' => 'required',
            // 'group' => 'required',
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
            dd($filename);
            dd('success');
            return redirect()->back()->with('success', 'Investment asked successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th);
        }
    }

    public function retrieveInvestment(string $id)
    {
        if ($this->isInvestmentExist($id) == false) {
            return back()->with('error', 'An error occurs');
        }
        try {
            $investment = $this->getInvestment($id);
            return view('', [
                'investment' => $investment
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }
    }


    public function update(string $id, InvestmentRequest $request)
    {
        if ($this->isInvestmentExist($id) == false) {
            return back()->with('error', 'Impossible to perform this action');
        } else {
            try {
                $this->getInvestment($id)->update([
                    'address' => $request->address,
                    'objectif' => $request->objectif,
                    'amount' => $request->amount,
                    'group' => $request->group,
                    'refund_deadline' => $request->refund_deadline,
                    'income' => $request->income,
                    'business_plan' => $request->business_plan,
                ]);
                dd('success');
                return redirect()->route('')->with('success', 'Investment updated successfully');
            } catch (\Throwable $th) {
                return redirect()->route('')->with('success', $th);
            }
        }
    }

    public function delete(string $id)
    {
        $investment = $this->getInvestment($id);
        if ($this->isInvestmentExist($id)) {
            if ($investment->user_id == Auth::user()->id && $investment->status == false) {
                $investment->delete();
                dd('success');
                return redirect()->route('')->with('success', 'investment deleted successfully');
            }
            return back()->with('error', 'An error occurred while deleting the investment');
        }
    }
}

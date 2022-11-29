<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Status;
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
        $id = htmlspecialchars(trim($id));
        $loan = Loan::find($id);
        $period = explode(" ", $loan->period);
        return view('loans.editform', [
            'loan' =>$loan,
            'period' =>$period,
            ]);
    }

    public function updateloan(Request $request, string $id)
    {
        
        $request->validate([
            'address' => 'required |string',
            'objectif' => 'required |string',
            'amount' => 'required |numeric |min:5000',
            'group' => 'required |string',
            'period' => 'required |numeric',
            'income' => 'required |numeric',
        ]);
        $id = htmlspecialchars(trim($id));
        // $loan = Loan::where('id', $id)->first();
        $period = htmlspecialchars(trim($request->period)). ' ' .htmlspecialchars(trim($request->period1));
        // dd($period);
        try
        {
            $loanupdated = Loan::where('id', $id)->first();
            if($loanupdated->statut == true){
                return \back()->with('error', 'Impossible to update loan');
            }
            $loanupdated->address = $request->address;
            $loanupdated->objectif = $request->objectif;
            $loanupdated->amount = $request->amount;
            $loanupdated->group = $request->group;
            $loanupdated->period = $period;
            $loanupdated->income = $request->income;
            $loanupdated->save();
            dd('success');
            return back()->with('success', 'Loan updated successfully');

        }catch(\Throwable $th){
            dd('error');
            return back()->with('error', 'An error occurred while updating');
        }
    }

    public function destroy(string $id)
    {
        $id = htmlspecialchars(trim($id));
        $loan = Loan::find($id);
        /** @var Loan */
        if($loan->status == false)
        {
            $loan->delete();
            dd('success');
            return back()->with('success', 'Loan deleted successfully');
        }
        dd('error');
        return back()->with('error', 'An error occurred while deleting');
        
    }

    public function listloan()
    {
        $loans = Loan::all();
        
        return view('loans.listloan', ['loans' => $loans]);
    }

    public function switchLoanStatus(string $id)
    {
        $auth_id = auth()->user()->status_id;
        $authStatus = Status::where('id', $auth_id)->get();
        // dd($authStatus[0]);
        
        if($authStatus[0]['label'] !== 'admin')
        {
            $loan = Loan::where('id',$id)->firstOrFail();
            if($loan instanceof Loan)
            {
                if($loan->statut == true){
                    $loan->statut=false;
                    $loan->save();
                    return back()->with('success','Prêt modifié avec succès !');
                }else{
                    $loan->statut=true;
                    $loan->save();
                    return back()->with('success','Prêt modifié avec succès !');
                }
            }
            abort(422);
        }
        abort(401);
    }

}

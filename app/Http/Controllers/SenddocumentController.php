<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Request;

class SenddocumentController extends Controller
{
    public function index(){
        $users = User::all();
        $customers = [];
        foreach ( $users as $user)
        {
            $status = $user->status_id;
            $customer = Status::where('id', $status)->get();
            if($customer[0]['label'] == 'client')
            {
                array_push($customers, $user);
            }
        }
        return view('documents.senddocumentform', ['customers' => $customers]);
    }

    public function senddocument(Request $request){
        $validatedData = $request->validate([
            'user_id' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|jpeg,png,pdf|max:2048',
 
        ]);
        dd($request);
 
        $name = $request->file('file')->getClientOriginalName();
 
        $path = $request->file('file')->store('public/files');
 
 
        $save = new File;
 
        $save->name = $name;
        $save->path = $path;
    }
}

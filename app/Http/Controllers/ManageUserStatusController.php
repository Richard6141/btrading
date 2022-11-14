<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageUserStatusController extends Controller
{
    public function userlistRender()
    {
        $users = User::all();
        return view('pages.userList', ['users'=>$users]);
    }

    public function switchUserStatus($user)
    {
        $auth_id = auth()->user()->status_id;
        $authStatus = Status::where('id', $auth_id)->get();
        // dd($authStatus[0]);
        
        if($authStatus[0]['label'] == 'admin')
        {
            $user = User::where('id',$user)->firstOrFail();
            if($user instanceof User)
            {
                if($user->account_status == true){
                    $user->update(['account_status'=>false]);
                    return back()->with('success','Compte modifié avec succès !');
                }
                $user->update(['account_status'=>true]);
                return back()->with('success','Compte modifié avec succès !');
            }
            abort(422);
        }
        abort(401);
    }
}

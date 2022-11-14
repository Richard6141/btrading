<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageUserStatus extends Controller
{
    public function switchUserStatus($user)
    {
        $auth_id = auth()->user()->status_id->get();
        $authStatus = DB::table('status')->where('id', $auth_id);
        if($authStatus['label'] == 'admin')
        {
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

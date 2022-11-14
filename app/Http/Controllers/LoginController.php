<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    public function connection(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required | min:8',
        ]);
        $username = \htmlspecialchars(\trim($request->username));
        if (Auth::check()) {
            return redirect()->intended('accueil');
        }
        if( !User::where('email', $request->username)->exists() && !User::where('phone', $request->username)->exists()){
            return back()->with([
            'error' => "Username ou email incorrect !",
        ]);
        
        }
        if(filter_var($request->username, FILTER_VALIDATE_EMAIL)){
            $user =  User::where('email', $request->username)->firstOrFail();
        }else{
            $user = User::where('phone', $request->username)->firstOrFail();
        }

        if($user->account_status == false){
            return back();
        }
        if (Auth::attempt([
            'phone' => $request['username'],
            'password' => $request['password']
            ])
            || Auth::attempt([
            'email' => $request['username'],
            'password' => $request['password']
            ])){
                
            if($request->has('remember')){
                Auth::login($user, $remember = true);
                return redirect()->intended('accueil');
            }else{
                $request->session()->regenerate();
                return redirect()->intended('accueil');
            }
                
                
        }
        return back()->with([
            'error' => "Username ou email incorrect !",
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/accueil');
    }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function login(Request $request)
    {
        $user = validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'phone' => $request['username'],
            'password' => $request['password']
            ],$request->has('remember'))
            || Auth::attempt([
            'email' => $request['username'],
            'password' => $request['password']
            ],$request->has('remember'))){
            if($request->remember == true){
                Auth::login($user, $remember = true);
                return redirect()->intended('modern');
            }else{
                Auth::login($user);
                return redirect()->intended('modern');
            }
            return back()->withErrors([
                'error' => 'Username ou mot de passe incorrect.',
            ]);
        }
        return false;

    }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailnewsletterController extends Controller
{
    public function registerMail()
    {
        $request->validate([
            'email' => 'required|email|unique:mailnewsletters',
        ]);
        try{
            Mailnewsletter::create([
                'email' => $request->email
            ]);
            return back()->with('success', 'Suscribe successfully');

        }catch(\Throwable $th){
            return back()->with('error', 'An error occurred');
        }
    }
}
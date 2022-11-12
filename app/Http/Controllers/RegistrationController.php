<?php

namespace App\Http\Controllers;

use \Rinvex\Country;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function registerRender(): View
    {
        $countries = \Rinvex\Country\CountryLoader::countries();
        // dd($countries);
        return view('register.index', [
            'countries' => $countries
        ]);
    }

    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'firstname' => 'required|string',
            'civility' => 'required|string',
            'country_code' => 'required|string',
            'phone' => 'required|integer',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmed' => 'required_with:password|same:password|min:8',
        ]);
        $password = (string) htmlspecialchars(trim($request->password));
        $password_confirmed = (string) htmlspecialchars(trim($request->password_confirmed));
        $client_status = Status::where('label', 'client')->first();
        $status_id = (string) $client_status->id ?? null;
        if ($password === $password_confirmed) {
            try {
                $user = new User();
                $user->name = strval($request->name);
                $user->firstname = strval($request->firstname);
                $user->civility = strval($request->civility);
                $user->country = strval($request->country_code);
                $user->phone = intval($request->phone);
                $user->status_id = $status_id;
                $user->email = $request->email;
                $user->password = Hash::make(strval($request->password));
                $user->save();
                dd('success');
            } catch (\Throwable $th) {
                //throw $th;
            }
        } else {
            return back()->with('error', "Password and password confirmation don't match anymore");
        }
    }
}

<?php

namespace App\Http\Controllers;

use \Rinvex\Country;
use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
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

    public function registerSubmit(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'firstname' => 'required|string',
            'civility' => 'required|string',
            'country_code' => 'required|string',
            'phone' => 'required|integer',
            'email' => 'required|email|unique:users,email',
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
                $message = "An error occurs ! Please contact the administrator";
                return redirect()->route('customer.index')->with('error', "$message");
            }
        } else {
            return back()->with('error', "Password and password confirmation don't match anymore");
        }
    }

    public function profilRender(string $id): View
    {
        $userId = htmlspecialchars(trim($id));
        $checkUser = User::where('id', $userId)->exists();
        if (!$checkUser) {
            return back()->with('error', 'User not found');
        }

        $userData = User::where('id', $userId)->first();
        // dd($userData);
        return view('users.profil');
    }

    public function uploadAvatar(Request $request)
    {
        if (Auth::check()) {
            /** @var User */
            $user = Auth::user();
            $filename = upload(strval($request->file('image')));
            dd($filename);
            $user['image'] = $filename;
            $user->save();
            return back()->with('success', " Photo de profil mise à jour avec succès ! ");
        }
        return back()->with('error', 'Mise à jour échouée !');
    }

    public function editProfilSubmission(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'firstname' => 'required|string',
            'civility' => 'required|string',
            'country' => 'required|string',
            'phone' => 'required|integer',
            'email' => 'required|email|unique:users,email',
        ]);

        try {
            if (Auth::check()) {
                $user = Auth::user();
                $user->name = $request->name;
                $user->firstname = $request->firstname;
                $user->civility = $request->civility;
                $user->country = $request->country;
                $user->phone = $request->phone;
                $user->email = $request->email;

            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

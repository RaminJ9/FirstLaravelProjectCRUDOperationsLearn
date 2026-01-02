<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // This facade, hashes the password, but it isnt needed since the "User" model that laravel makes, already hashes the password.


class AuthController extends Controller
{
    



    public function register(Request $request){

        // this variable holds the data for the user.
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed'  // "confirmed" is really usefull cuz when laravel sees it, it checks for a second input type password, called "password_confirmation", and then compares the 2 passwords to see if they are the same.
            // for "confirmed" to work, the second password input MUST be called "password_confirmation".
        ]);
        
        // the user / variable that holds the data is saved into the database, and then saved into the "$user" variable
        $users = User::create($validated); 

        // automatically the user is logged into the account when registering.
        Auth::login($users); // since i am logging the user in with "Auth" i need to use the Auth Facade.

        return redirect()->route('goto.homepage');
    }


    public function login(){



    }


    public function logout(Request $request){

        Auth::logout(); // logs out current user / Breaks session between the user and removes user data like the user id from the current session.

        // since its only the user data that is removed when logging out, with this method the session data is also removed.
        $request->session()->invalidate();
        
        // What this does is, that it regenerates the csfr token for the next session. Meaning that when any forms gets submitted with the previous old token from the previous session will be rejected.
        // this is recomended to do these 2 things, below and above, not HAVE to but common practice.
        $request->session()->regenerateToken();

        return redirect()->route('show.login');

    }

}

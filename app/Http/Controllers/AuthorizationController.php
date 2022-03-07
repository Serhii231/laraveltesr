<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\VerifiesEmails;

class AuthorizationController extends Controller
{
    public function index() 
    {   
        return view('authorization');
    }
    
    public function authorization(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => [
                'required',
                'string',
                Password::min(8)->mixedCase()->numbers()
            ]
        ]);
        
       
        if (Auth::attempt($credentials)) {
            $sesion = session();
         
            $request->session()->put('username', $credentials['username']);
            return redirect()->route('main');
        }
 
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records',
        ]);
    }

    public function exit(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('main');
    }
}

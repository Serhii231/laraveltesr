<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class AuthorizationController extends Controller
{
    public function index() 
    {
        // dd(Auth::user());
        
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
            $request->session()->regenerate();
            return redirect()->route('main');
        }
 
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records',
        ]);
    }
}
